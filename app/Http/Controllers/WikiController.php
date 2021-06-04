<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Sets;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function card_search(){

        // $cards now contains a leftJoin with Sets on Cards
        $cards = Cards::query()->leftJoin('Sets as Sets','Cards.setId','=','Sets.setId')->get();
        return view('pages.wiki.card-search', compact('cards'));
    }

    public function set_explorer(){
        return view('pages.wiki.set-explorer');
    }

    public function getSetName($setId){
        return Sets::find($setId)->name;
    }
    public function filter($cards,$filterstring){
        return array_keys($cards,$filterstring);
    }
}
