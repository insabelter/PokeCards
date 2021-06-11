<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $user =  auth()->user();

        if(Hash::check($request->confirmdelete, $user->password)){
            $user->delete();

            return redirect('/');
        }

        //sinnvolle Fehlermeldung bzw. andere Seite
        return redirect('/grading');

    }
}
