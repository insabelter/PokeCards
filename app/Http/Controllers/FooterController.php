<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function about(){
        return view('footer.about');
    }

    public function privacy(){
        return view('footer.privacy');
    }
}
