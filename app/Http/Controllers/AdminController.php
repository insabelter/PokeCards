<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $user = auth()->user();
        if(!$user->isadmin){
            return redirect('');
        }

        $users = User::all();
        return view('pages.account.admin', compact('users'));
    }

    public function makeAdmin(){

    }

    public function deleteUser(){

    }

}
