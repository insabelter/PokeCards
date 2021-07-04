<?php

namespace App\Http\Controllers;

class FooterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Footer Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for navigating to the pages in the footer.
    |
    */

    /**
     * Show the about page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function about(){
        return view('footer.about');
    }

    /**
     * Show the privacy page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function privacy(){
        return view('footer.privacy');
    }

    /**
     * Show the contact page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contact(){
        return view('footer.contact');
    }
}
