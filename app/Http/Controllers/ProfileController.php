<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = auth()->user();
        $verified = $user->hasVerifiedEmail();
        $verified_text = "Not verified";
        if($verified){
            $verified_text = "Verified";
        }
        return view('pages.account.profile', compact('verified','verified_text'));
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

    public function sendVarificationMail(){
        auth()->user()->sendEmailVerificationNotification();
        return redirect('/profile');
    }
}
