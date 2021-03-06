<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Notifications\ContactFormNotification;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for editing users. Admins are able
    | to delete users and edit their admin status.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('pages.account.home', compact('user'));
    }

    /**
     * Send an email to pokecards.site@gmail.com with the information from the contact form
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function send_mail(Request $request)
    {
        $this->validate($request, [
            'fullname' => ['required', 'string', 'max:255' ],
            'email' => ['required', 'string', 'email', 'max:255' ],
            'favourite_pokemon' => ['string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255']
        ]);

        $contact = [
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'favourite_pokemon' => $request['favourite_pokemon'],
            'subject' => $request['subject'],
            'message' => $request['message'],
        ];


        Mail::to('pokecards.site@gmail.com')->send(new ContactFormNotification($contact));

        return redirect()->route('contact')->with('status', ' Your Mail has been received');
    }

}
