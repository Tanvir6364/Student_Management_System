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
use App\FileUpload;

use File;
use Storage;
use DB;

class StudentController extends Controller
{
    public function getStudentRegister(){
        $programs = Program::all();
        $shifts = Shift::all();
        $times = Time::all();
        $batches = Batch::all();
        $groups = Group::all();
        $academics = Academic::orderBy('academic_id','DESC')->get();
        $student_id = Student::max('student_id');
        return view('dashboard.students.studentRegister',compact('programs','academics','shifts','times','batches','groups','student_id'));
    }
    public function postStudentRegister(Request $request){
        $st =new Student;
        $st->first_name=$request->first_name;
        $st->last_name=$request->last_name;
        $st->sex=$request->sex;
        $st->dob=$request->dob;
        $st->rac=$request->rec;
        $st->email=$request->email;
        $st->rac=$request->rac;
        $st->status=$request->status;
        $st->nationality=$request->nationality;
        $st->national_card=$request->national_card;
        $st->passport=$request->passport;
        $st->phone=$request->phone;
        $st->village=$request->village;
        $st->commune=$request->commune;
        $st->district=$request->district;
        $st->province=$request->province;
        $st->current_address=$request->current_address;
        $st->dateregistred=$request->dateregistred;
        //$st->photo=$request->photo;
        $st->photo=FileUpload::photo($request,'photo');
        $st->user_id=$request->user_id;
        if ($st->save()) {
            $student_id = $st->student_id;
            Status::insert(['student_id'=>$student_id,'class_id'=>$request->class_id]);
            //return view('dashboard.fee.payment',compact($student_id));
            //return redirect()->route('goPayment',['student_id'=>$student_id]);
            $url=url('/student/goPayment',$student_id);
            return redirect($url);
        }
    }

    public function studentInfo(Request $request)
    {
        if ($request->has('search')) {

            $students = Student::where('student_id',$request->search)
                ->Orwhere('first_name',"LIKE","%".$request->search."%")
                ->Orwhere('last_name',"LIKE","%".$request->search."%")
                ->select(DB::raw('student_id,
				first_name,
				last_name,
				CONCAT(
				first_name," ",last_name) AS full_name,
				(CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex ,dob'))
                ->paginate(10);

        }
        else{
            $students = Student::select(DB::raw('student_id,
			first_name,
			last_name,
			CONCAT(
				first_name," ",last_name) AS full_name,
				(CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex ,dob'))
                ->paginate(10)->appends('search',$request->search);

        }
        $allStudent = Student::all();
        return view('dashboard.students.studentList',compact('students','allStudent'));
    }





    //==============================================================
    public function delStudentInfo(Request $request){
        if ($request->ajax()){
            Student::destroy($request->student_id);
        }
        return back();
    }
    public function editStudentInfo(Request $request){
        if ($request->ajax()){
            $st = Student::find($request->student_id);
            dump($st);
           // return response(Student::find($request->student_id));
        }
    }
}
