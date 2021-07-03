<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index() {
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }

        $user = auth()->user();
        $verified = $user->hasVerifiedEmail();
        $verified_text = "Not verified";
        if($verified){
            $verified_text = "Verified";
        }
        return view('pages.account.profile', compact('user','verified','verified_text'));
    }

    public function edit(Request $request) {
        $user = auth()->user();

        $user->update([
            'email' => $request->email,
        ]);

        return redirect()->back()->with("successEdit","Your information has been updated.");
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("errorChange","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("errorChange","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("successChange","Password changed successfully!");

    }

    public function deleteAccount(Request $request) {

        $request->validate([
            'confirmdelete' => 'required'
        ]);

        $user =  auth()->user();

        if(Hash::check($request->confirmdelete, $user->password)){
            //Delete Offers which are connected to the user
            Offers::query()->where('userId',$user->id)->delete();
            Watchlist::query()->where('userId',$user->id)->delete();

            $user->delete();

            return redirect('/');
        }

        return redirect()->back()->with("errorDelete","Password wrong, your account couldn't be deleted.");
    }

    public function sendVarificationMail(){
        auth()->user()->sendEmailVerificationNotification();
        return Redirect::back();
    }

    public function easterEgg() {
        $user = auth()->user();

        $user->update([
            'easteregg' => 1,
        ]);

        return redirect()->back();
    }
}
