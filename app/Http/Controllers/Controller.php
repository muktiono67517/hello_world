<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Controller{

    public function login_view(){
        return view('login');
    }

    public function login(Request $request) {
   
        $username = $request->input('username');
        $password = $request->input('password');
        
        $sql_login_query = "SELECT username FROM users WHERE username='$username' AND password='$password' ";
        $users = DB::select($sql_login_query);
        if ($users){
            return redirect('dashboard');
        }

        else if(!$users) {
            return view('login');
        }   
    }


    public function register(){
        return view('register');
    }


    public function register_auth(Request $request){
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        
        $sql_register_query = "INSERT INTO users VALUES ('$email', '$username', '$password')";
        $users = DB::insert($sql_register_query);
        return redirect('login');
          
    }
    

    public function dashboard() {
        return view('dashboard');
    }

    public function index(){
        return view('index');
    }



}
