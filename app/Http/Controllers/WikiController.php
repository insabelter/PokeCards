<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Sets;
use Illuminate\Http\Request;
use function Sodium\add;

class WikiController extends Controller
{
    public function card_search(){

        // $cards now contains a leftJoin with Sets on Cards
        $cards = Cards::query()->leftJoin('Sets as Sets','Cards.setId','=','Sets.setId')->get();
        return view('pages.wiki.card-search', compact('cards'));
    }

    public function set_explorer(){
        $sets = Sets::all();

        // all seriesNames are collected in an array
        $seriesNames = [];
        foreach ($sets as $set){
            $seriesName = $set->seriesName;
            if(!in_array($seriesName, $seriesNames)){
                array_push($seriesNames, $seriesName);
            }
        }
        // setsPerSeries is an array which includes: seriesKey -> array of sets of this series
        $setsPerSeries = [];
        foreach ($sets as $set){
            $thisSeries = $set->seriesName;
            if(!key_exists($thisSeries, $setsPerSeries)){
                $setsPerSeries[$thisSeries] = [];
            }
            array_push($setsPerSeries[$thisSeries], $set);
        }
        
        return view('pages.wiki.set-explorer', compact('setsPerSeries'));
    }

    public function getSetName($setId){
        return Sets::find($setId)->name;
    }
    public function filter($cards,$filterstring){
        return array_keys($cards,$filterstring);
    }
}
