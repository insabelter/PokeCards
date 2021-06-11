<?php

namespace App\Http\Controllers;

class FooterController extends Controller
{
    public function about(){
        return view('footer.about');
    }

    public function privacy(){
        return view('footer.privacy');
    }
}
