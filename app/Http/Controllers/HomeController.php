<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->count('id');
        $students = DB::table('students')
            ->count('student_id');
        $programs = DB::table('programs')
            ->count('program_id');
        $shifts = DB::table('shifts')
            ->count('shift_id');
        $batches = DB::table('batches')
            ->count('batch_id');
        //dump($user);
        return view('dashboard.home.homeContent',compact('users','students','programs','shifts','batches'));
        //return view('home');
    }
}
