<?php

namespace App\Http\Controllers;

use ConsoleTVs\Charts\ChartsServiceProvider;
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
use App\User;
//use Charts;
//use ConsoleTVs\Charts\Classes\Chartjs\Chart;
//use ConsoleTVs\Charts\Charts;
use ConsoleTVs\Charts\Facades\Charts;

//use Charts;

use DB;

class ReportController extends Controller
{
    public function getStudentList()
    {

        $programs = Program::all();
        $academics = Academic::orderBy('academic_id', 'DESC')->get();
        $shifts = Shift::all();
        // $level=Level::orderBy('level_id','DESC')->get();
        $times = Time::all();
        $batches = Batch::all();
        $groups = Group::all();
        return view('dashboard.report.studentList', compact('programs', 'academics', 'shifts', 'groups', 'batches', 'times'));

    }

    public function getStudentInfo(Request $request)
    {
        $classes = $this->info()->select(DB::raw('students.student_id,
   	CONCAT(students.first_name," ",students.last_name)as name,(CASE WHEN students.sex=0 THEN "Male"  ELSE "Female" END)as sex ,students.dob,
   		CONCAT("Program-",programs.program," / ","Level-",levels.level," / ","Shift-",shifts.shift," / ","Time-",times.time,"/Start From-(",classes.start_date,"-to-",classes.end_date,")")as program'))
            ->where('classes.class_id', $request->class_id)
            ->get();
        return view('dashboard.report.studentInfo', compact('classes'));
    }

    public function info()
    {
        return Status::
        join('students', 'students.student_id', '=', 'statuses.student_id')
            ->join('classes', 'classes.class_id', '=', 'statuses.class_id')
            ->join('academics', 'academics.academic_id', '=', 'classes.academic_id')
            ->join('shifts', 'shifts.shift_id', '=', 'classes.shift_id')
            ->join('times', 'times.time_id', '=', 'classes.time_id')
            ->join('levels', 'levels.level_id', '=', 'classes.level_id')
            ->join('groups', 'groups.group_id', '=', 'classes.group_id')
            ->join('batches', 'batches.batch_id', '=', 'classes.batch_id')
            ->join('programs', 'programs.program_id', '=', 'levels.program_id');
    }

    public function getStudentMultiClassList()
    {
        $programs = Program::all();
        $academics = Academic::orderBy('academic_id', 'DESC')->get();
        $shifts = Shift::all();
        // $level=Level::orderBy('level_id','DESC')->get();
        $times = Time::all();
        $batches = Batch::all();
        $groups = Group::all();
        return view('dashboard.report.studentMultiClassList', compact('programs', 'academics', 'shifts', 'groups', 'batches', 'times'));
    }

    public function showStudentMultiClass(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request['chk'])) {

                $classes = $this->info()
                    ->select(DB::raw('students.student_id,
   	         CONCAT(students.first_name," ",students.last_name)as name,(CASE WHEN students.sex=0 THEN "Male"  ELSE "Female" END)as sex ,
   	                students.dob,
   	                programs.program,
   	                levels.level,
   	                shifts.shift,
   	                times.time,
   	                batches.batch,
   	                groups.group
   	                '))->whereIn('classes.class_id', $request['chk'])
                    ->get();
                return view('dashboard.report.studentMultiClassInfo', compact('classes'));
                //response($request->all());
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newStudentRegChart(){

        $student = Student::where(DB::raw("(DATE_FORMAT(dateregistred,'%Y'))"),date('Y'))->select('dateregistred AS created_at')->get();

        $chart = Charts::database($student, 'bar', 'highcharts')

            ->title("Monthly new Register Student")

            ->elementLabel("Total Student")

            ->dimensions(1000, 500)

            ->responsive(false)

            ->groupByMonth(date('Y'), true);
        //dump($student);
        return view('dashboard.report.newStudentRegChart',compact('chart'));
        //return view('dashboard.report.roughChart',compact('student'));

    }
    public function pieChart(){

        //$student = Student::where(DB::raw("(DATE_FORMAT(dateregistred,'%Y'))"),date('Y'))->select('dateregistred AS created_at')->get();
        //$student2= Student::where(DB::raw('dateregistred'));
        /*$chart = Charts::database($student, 'bar', 'highcharts')

            ->title("Monthly new Register Student")

            ->elementLabel("Total Student")

            ->dimensions(1000, 500)

            ->responsive(false)

            ->groupByMonth(date('Y'), true);*/
       // dump($student2);
        //return view('dashboard.report.newStudentRegChart',compact('chart'));
        //return view('dashboard.report.roughChart',compact('student'));
        //return response()->json($student);

    }
}
