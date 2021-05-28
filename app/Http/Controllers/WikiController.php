<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Sets;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index(){

        // $cards now contains a leftJoin with Sets on Cards
        $cards = Cards::query()->leftJoin('Sets as Sets','Cards.setId','=','Sets.setId')->get();
        return view('pages.wiki', compact('cards'));
    }

    public function getSetName($setId){
        return Sets::find($setId)->name;
    }
    public function filter($cards,$filterstring){
        return array_keys($cards,$filterstring);
    }
}
