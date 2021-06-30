<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        // $users now contains a leftJoin with Sets on Cards
        $users = User::all();
        return view('pages.account.admin', compact('users'));
    }

}
