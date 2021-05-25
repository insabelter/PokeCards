<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Sets;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index(){
//        TODO: Get DB Data
//        Example Data:
        $cards = Cards::all();
        return view('pages.wiki', compact('cards'));
    }

    public function getSetName($setId){
        return Sets::find($setId)->name;
    }
}
