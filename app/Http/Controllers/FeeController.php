<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\MyClass;
use App\Student;
use App\Status;
use App\Fee;
use App\Receipt;
use App\StudentFee;
use App\Transaction;
use App\ReceiptDetail;
use App\FeeType;
use DB;

class FeeController extends Controller
{
    public function getPayment()
    {
        return view('dashboard.fee.searchPayment');
    }

    public function studentStatus($studentId)
    {
        return
            Status::latest('statuses.status_id')
                ->join('students', 'students.student_id', '=', 'statuses.student_id')
                ->join('classes', 'classes.class_id', '=', 'statuses.class_id')
                ->join('academics', 'academics.academic_id', '=', 'classes.academic_id')
                ->join('shifts', 'shifts.shift_id', '=', 'classes.shift_id')
                ->join('times', 'times.time_id', '=', 'classes.time_id')
                ->join('levels', 'levels.level_id', '=', 'classes.level_id')
                ->join('groups', 'groups.group_id', '=', 'classes.group_id')
                ->join('batches', 'batches.batch_id', '=', 'classes.batch_id')
                ->join('programs', 'programs.program_id', '=', 'levels.program_id')
                ->where('students.student_id', $studentId);

    }

    public function showSchoolFee($level_id)
    {
        return Fee::join('academics', 'academics.academic_id', '=', 'fees.academic_id')
            ->join('levels', 'levels.level_id', '=', 'fees.level_id')
            ->join('programs', 'programs.program_id', '=', 'levels.program_id')
            ->join('feetypes', 'feetypes.fee_type_id', '=', 'fees.fee_type_id')
            ->where('levels.level_id', $level_id)
            ->orderBy('fees.amount', 'DESC');
    }

    public function readStudentFee($student_id)
    {
        return StudentFee::join('fees', 'fees.fee_id', '=', 'studentfees.fee_id')
            ->join('students', 'students.student_id', '=', 'studentfees.student_id')
            ->join('levels', 'levels.level_id', '=', 'studentfees.level_id')
            ->join('programs', 'programs.program_id', '=', 'levels.program_id')
            ->select('levels.level_id',
                'levels.level',
                'programs.program',
                'fees.amount as school_fee',
                'students.student_id',
                'studentfees.s_fee_id',
                'studentfees.amount as student_amount',
                'studentfees.discount')
            ->where('students.student_id', $student_id)
            ->orderBy('studentfees.s_fee_id', 'ASC');

    }

    public function readStudentTransaction($studentId)
    {
        return ReceiptDetail::join('receipts', 'receipts.receipt_id', '=', 'receiptdetails.receipt_id')
            ->join('transactions', 'transactions.transact_id', '=', 'receiptdetails.transact_id')
            ->join('students', 'students.student_id', '=', 'receiptdetails.student_id')
            ->join('fees', 'fees.fee_id', '=', 'transactions.fee_id')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->where('students.student_id', $studentId);

    }

    public function payment($viewName, $studentId)
    {
        $feetype = FeeType::all();
        $status = $this->studentStatus($studentId)->first();

        $program = Program::where('program_id', $status->program_id)->get();
        //dd($program);
        $level = Level::where('program_id', $status->program_id)->get();
        $studentfee = $this->showSchoolFee($status->level_id)->first();
        $receipt_id = ReceiptDetail::where('student_id', $studentId)->max('receipt_id');
        $readStudentFee = $this->readStudentFee($studentId)->get();
        $readStudentTrans = $this->readStudentTransaction($studentId)->get();
//dd($receipt_id);

        return view($viewName, compact('status', 'program', 'level', 'studentfee', 'receipt_id',
            'readStudentFee', 'readStudentTrans', 'feetype'))->with('student_id', $studentId);
    }

    public function showStudentPayment(Request $request)
    {
        //dump($request->all());
        $student_id = $request->student_id;
        // 	dd($this->payment('dashboard.fee.payment',$student_id));
        return $this->payment('dashboard.fee.payment', $student_id);

    }

    public function goPayment($student_id)
    {
        return $this->payment('dashboard.fee.payment', $student_id);

    }

    public function savePayment(Request $request)
    {
        $studentfee = StudentFee::create($request->all());

        $transact = Transaction::create([
            'transact_date' => $request->transact_date,
            'fee_id' => $request->fee_id,
            'user_id' => $request->user_id,
            'remark' => $request->remark,
            'description' => $request->description,
            's_fee_id' => $studentfee->s_fee_id,
            'paid' => $request->paid,
            'student_id' => $request->student_id,
        ]);
        $receipt_id = Receipt::autoNumber();

        ReceiptDetail::create([
            'receipt_id' => $receipt_id,
            'student_id' => $request->student_id,
            'transact_id' => $transact->transact_id

        ]);
        return back();

    }

    public function createFee(Request $request)
    {

        if ($request->ajax()) {

            return response(Fee::create($request->all()));
        }
    }

    public function pay(Request $request)
    {

        if ($request->ajax()) {

            $studentPay = StudentFee::join('levels', 'levels.level_id', '=', 'studentfees.level_id')
                ->join('students', 'students.student_id', '=', 'studentfees.student_id')
                ->join('fees', 'fees.fee_id', '=', 'studentfees.fee_id')
                ->join('programs', 'programs.program_id', '=', 'levels.program_id')
                ->select('levels.level_id',
                    'levels.level',
                    'fees.fee_id',
                    'programs.program_id',
                    'programs.program',
                    'students.student_id',
                    'studentfees.s_fee_id',
                    'fees.amount as school_fee',
                    'studentfees.amount as student_amount',
                    'studentfees.discount')
                ->where('studentfees.s_fee_id', $request->s_fee_id)->first();
        }
        return response($studentPay);
    }

    public function extraPay(Request $request)
    {
        $transact = Transaction::create($request->all());
        if (count($transact) != 0) {
            $transact_id = $transact->transact_id;
            $student_id = $transact->student_id;
            $receipt_id = Receipt::autoNumber();

            ReceiptDetail::create([
                'receipt_id' => $receipt_id,
                'student_id' => $student_id,
                'transact_id' => $transact_id

            ]);
        }
        return back();

    }

    public function printInvoice($receipt_id)
    {

        $Invoice = ReceiptDetail::join('receipts', 'receipts.receipt_id', '=', 'receiptdetails.receipt_id')
            ->join('transactions', 'transactions.transact_id', '=', 'receiptdetails.transact_id')
            ->join('students', 'students.student_id', '=', 'receiptdetails.student_id')
            ->join('fees', 'fees.fee_id', '=', 'transactions.fee_id')
            ->join('levels', 'levels.level_id', '=', 'fees.level_id')
            ->join('programs', 'programs.program_id', '=', 'levels.program_id')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            // ->join('statuses','statuses.student_id','=','students.student_id')

            ->select(
                'students.student_id',
                'students.first_name',
                'students.last_name',
                'students.sex',
                'fees.amount as school_fee',
                'fees.fee_id',
                'transactions.transact_date',
                'transactions.paid',
                'users.name',
                'receipts.receipt_id',
                'levels.level_id',
                'transactions.s_fee_id')->where('receipts.receipt_id', $receipt_id)->first();


        ////

        $status = MyClass::join('levels', 'levels.level_id', '=', 'classes.level_id')
            ->join('programs', 'programs.program_id', '=', 'levels.program_id')
            ->join('academics', 'academics.academic_id', '=', 'classes.academic_id')
            ->join('shifts', 'shifts.shift_id', '=', 'classes.shift_id')
            ->join('times', 'times.time_id', '=', 'classes.time_id')
            ->join('statuses', 'statuses.class_id', '=', 'classes.class_id')
            ->join('groups', 'groups.group_id', '=', 'classes.group_id')
            ->join('batches', 'batches.batch_id', '=', 'classes.batch_id')
            ->where('levels.level_id', $Invoice->level_id)
            ->where('statuses.student_id', $Invoice->student_id)
            ->select(DB::raw('CONCAT(programs.program,
    " / Level-",levels.level,
    " / Shift-",shifts.shift,
    " / Time-",times.time,
    " / Group-",groups.group,
    " / Batch-",batches.batch,
    " / Academic-",academics.academic,
    " / Start Date-",classes.start_date,
    " / End Date-",classes.end_date
   ) As detail'))->first();


        $studentFee = StudentFee::where('s_fee_id', $Invoice->s_fee_id)->first();
        $totalPaid = Transaction::where('s_fee_id', $Invoice->s_fee_id)->sum('paid');
        return view('dashboard.invoice.invoice', compact('Invoice', 'status', 'totalPaid', 'studentFee'));
    }

    public function showLevelStudent(Request $request)
    {

        $status = MyClass::join('levels', 'levels.level_id', '=', 'classes.level_id')
            ->join('programs', 'programs.program_id', '=', 'levels.program_id')
            ->join('academics', 'academics.academic_id', '=', 'classes.academic_id')
            ->join('shifts', 'shifts.shift_id', '=', 'classes.shift_id')
            ->join('times', 'times.time_id', '=', 'classes.time_id')
            ->join('statuses', 'statuses.class_id', '=', 'classes.class_id')
            ->join('groups', 'groups.group_id', '=', 'classes.group_id')
            ->join('batches', 'batches.batch_id', '=', 'classes.batch_id')
            ->where('levels.level_id', $request->level_id)
            ->where('statuses.student_id', $request->student_id)
            ->select(DB::raw('CONCAT(programs.program,
    " / Level-",levels.level,
    " / Shift-",shifts.shift,
    " / Time-",times.time,
    " / Group-",groups.group,
    " / Batch-",batches.batch
   ) As detail'))->first();
        return response($status);
    }

    public function deleteTransaction($transact_id)
    {

        Transaction::destroy($transact_id);
        return back();
    }

    public function getFeeReport()
    {
        $fees=false;
        return view('dashboard.fee.feeReport',compact('fees'));
    }

    public function showFeeReport(Request $request)
    {
        $fees = $this->feeInfo()->select(
            'students.student_id',
            'students.first_name',
            'students.last_name',
            'fees.amount as school_fee',
            'transactions.paid',
            'transactions.transact_date',
            'studentfees.discount',
            'studentfees.s_fee_id'

        )
            ->whereDate('transactions.transact_date', '>=', $request->fromm)
            ->whereDate('transactions.transact_date', '<=', $request->to)
            ->orderBy('students.student_id')
            ->get();
//dump($fees);
        //return view('dashboard.fee.feeList', compact('fees'));
        return view('dashboard.fee.feeReport', compact('fees'));
    }

    public function feeInfo(){
        return  Transaction::join('fees','fees.fee_id','=','transactions.fee_id')
            ->join('students','students.student_id','=','transactions.student_id')
            ->join('users','users.id','=','transactions.user_id')
            ->join('studentfees','studentfees.s_fee_id','=','transactions.s_fee_id');

    }

}
