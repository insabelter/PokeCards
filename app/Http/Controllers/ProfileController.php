<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('pages.account.profile');
    }

    public function edit(Request $request) {

        //$user =  User::findOrFail($id); //Alternative:

        $user = auth()->user();

        $user->update([
            'email' => $request->email,
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        /*
        if($user->email != $data['email']){
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }
        //andere Daten mit elseif

        //return redirect('/grading')->with('success', "Profile edited!");
        */
    }

    public function deleteAccount(Request $request) {

        $request->validate([
            'confirmdelete' => 'required'
        ]);

        if($request->confirmdelete == "DELETE"){
            $user =  auth()->user();
            $user->delete();

            return redirect('/');
        }

        return redirect('/grading');

    }
}
