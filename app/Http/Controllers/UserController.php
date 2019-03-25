<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getUser(){
        return view('dashboard.users.addUser');
    }
    public function addUser(Request $request){
        $users = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'remember_token' => $request['remember_token'],
            'password' => Hash::make($request['password']),
        ]);
        //dump($users);
        $users->save();
         return back();
    }
    public function manageUser(){
        $userLists = User::all();
        return view('dashboard.users.manageUser',compact('userLists'));
    }

    public function delUser($id){
        User::destroy($id);
        return back();
    }
}
