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

class CourseController extends Controller
{
    public function getManageCourse(){
        $programs = Program::all();
        $shifts = Shift::all();
        $times = Time::all();
        $batches = Batch::all();
        $groups = Group::all();
        $academics = Academic::orderBy('academic_id','DESC')->get();
        return view('dashboard.courses.manageCourse',compact('programs','academics','shifts','times','batches','groups'));
    }
    public function postInsertAcademic(Request $request){
        if($request->ajax()){
            return response(Academic::create($request->all()));
        }
    }
    public function postInsertProgram(Request $request){
        if ($request->ajax()){
            return response(Program::create($request->all()));
        }
    }

    public function postInsertLevel(Request $request){
        if ($request->ajax()){
            return response(Level::create($request->all()));
        }
    }
    public function showLevel(Request $request)
    {
        if ($request->ajax()) {
            return response(Level::where('program_id',$request->program_id)->get());
        }
    }
    public function postInsertshift(Request $request)
    {
        if ($request->ajax()) {
            return response(Shift::create($request->all()));
        }
    }
    public function postInserttime(Request $request)
    {
        if($request->ajax())
        {
            return response(Time::create($request->all()));
        }
    }
    public function postInsertbatch(Request $request)
    {
        if($request->ajax())
        {
            return response(Batch::create($request->all()));
        }
    }
    public function postInsertgroup(Request $request)
    {
        if($request->ajax())
        {
            return response(Group::create($request->all()));
        }
    }
    public function createClass(Request $request)
    {
        if($request->ajax())
        {
            //return $request->all();
           //dump($request);
            return response(MyClass::create($request->all()));
        }
    }

    public function showClassInformation(Request $request){
            //$filter = $request->academic_id=="" && $request->program_id=="";
            //  $filter =  ['programs.program_id'=>$request->program_id];
//dd($filter);
            if ($request->academic_id!="" && $request->program_id=="")
            {
                $filter = ['academics.academic_id'=>$request->academic_id];
            }
//dd($filter);
            if (
                $request->academic_id!="" &&
                $request->program_id!="" &&
                $request->level_id!="" &&
                $request->shift_id!="" &&
                $request->time_id!="" &&
                $request->batch_id!="" &&
                $request->group_id!=""
            )
            {
                $filter = [
                    'academics.academic_id'=>$request->academic_id,
                    'programs.program_id'=>$request->program_id,
                    'shifts.shift_id'=>$request->shift_id,
                    'levels.level_id'=>$request->level_id,
                    'times.time_id'=>$request->time_id,
                    'groups.group_id'=>$request->group_id,
                    'batches.batch_id'=>$request->batch_id

                ];        }

            $classes = $this->classInformation($filter)->get();
            //dd($filter);
            return view('dashboard.classes.classInfo',compact('classes'));

        }

    public function  classInformation($filter)
    {
        return MyClass::join('academics','academics.academic_id','=','classes.academic_id')
            ->join('levels','levels.level_id','=','classes.level_id')
            ->join('programs','programs.program_id','=','levels.program_id')
            ->join('shifts','shifts.shift_id','=','classes.shift_id')
            ->join('times','times.time_id','=','classes.time_id')
            ->join('batches','batches.batch_id','=','classes.batch_id')
            ->join('groups','groups.group_id','=','classes.group_id')
            ->where($filter)
            ->orderBy('classes.class_id','DESC');



    }
    public function deleteClass(Request $request){
        if ($request->ajax()){
            MyClass::destroy($request->class_id);
        }
        return back();
    }
    public function editClass(Request $request){
        if ($request->ajax()){
            return response(MyClass::find($request->class_id));
        }
    }
    public function updateClass(Request $request){

        if ($request->ajax()) {

            return response(MyClass::updateOrCreate(['class_id'=>$request->class_id],$request->all()));
            //return response($request->all());
        }
    }


    public function editCourse(){
        $programs = Program::all();
        $shifts = Shift::all();
        $times = Time::all();
        $batches = Batch::all();
        $groups = Group::all();
        $academics = Academic::all();
        return view('dashboard.courses.editCourse',compact('programs','academics','shifts','times','batches','groups'));
    }

    public function delAcademic($academic_id){
            Academic::destroy($academic_id);
            return back();
    }
}
