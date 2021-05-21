<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('pages.account.login');
    }

    public function login(){
//        TODO!!!
        $username = request("username");
        $password = request("password");
        if($password == "password"){
            return view('pages.account.login_successful', ['username' => $username]);
        }
        else{
            return redirect('login') -> with("err","Credentials are not correct!");
        }

    }
}
