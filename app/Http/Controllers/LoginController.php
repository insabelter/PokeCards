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
        return view('pages.account.login_successful');
    }
}
