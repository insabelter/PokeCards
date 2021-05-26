<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('pages.account.profile');
    }

    public function edit() {
//        TODO
        echo("Profile edited!");
    }

    public function deleteAccount(Request $request, $id) {
        $user =  auth()->user();
        $user->delete();

        return redirect('/');
    }
}
