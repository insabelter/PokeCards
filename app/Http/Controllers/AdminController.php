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

    public function makeAdmin(Request $request){
        User::query()->where('id',$request->id)->update([
            'is_admin' => 1,
        ]);

        return redirect() -> route('admin');
    }

    public function revokeAdmin(Request $request){
        User::query()->where('id',$request->id)->update([
            'is_admin' => 0
        ]);

        return redirect() -> route('admin');
    }

    public function deleteUser(Request $request){
        User::query()->where('id',$request->id)->delete();

        return redirect() -> route('admin');
    }

}
