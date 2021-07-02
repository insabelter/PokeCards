<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect('');
        }

        $users = User::all();
        return view('pages.account.admin', compact('users'));
    }

    public function makeAdmin(){

    }

    public function deleteUser(Request $request){
        User::query()->where('id',$request->id)->delete();

        return redirect() -> route('admin');

    }

}
