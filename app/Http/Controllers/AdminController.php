<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for editing users. Admins are able
    | to delete users and edit their admin status.
    |
    */

    /**
     * Indexing the page to edit users that is only available to admins
     *
     * @return view
     */
    public function index(){
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect('');
        }

        $users = User::all();
        return view('pages.account.admin', compact('users'));
    }

    /**
     * Give the admin status to an user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeAdmin(Request $request){
        User::query()->where('id',$request->id)->update([
            'is_admin' => 1,
        ]);

        return redirect() -> route('admin');
    }

    /**
     *  Revoke the admin status from an user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revokeAdmin(Request $request){
        User::query()->where('id',$request->id)->update([
            'is_admin' => 0
        ]);

        return redirect() -> route('admin');
    }

    /**
     * Delete the account of an user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(Request $request){
        User::query()->where('id',$request->id)->delete();

        return redirect() -> route('admin');
    }

}
