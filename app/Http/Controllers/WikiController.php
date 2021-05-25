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
        $allcards = Cards::all();
        $cards = Cards::query()->leftJoin('Sets as Sets','Cards.setId','=','Sets.setId')->get();
        return view('pages.wiki', compact('cards'));
    }

    public function getSetName($setId){
        return Sets::find($setId)->name;
    }
}
