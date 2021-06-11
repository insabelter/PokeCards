<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Sets;

class WikiController extends Controller
{
    public function card_search(){

        // $cards now contains a leftJoin with Sets on Cards
        $cards = Cards::query()->leftJoin('Sets as Sets','Cards.setId','=','Sets.setId')->get();
        return view('pages.wiki.card-search', compact('cards'));
    }

    public function set_explorer($setId){
        $sets = Sets::all();

        // all seriesNames are collected in an array
        $seriesNames = [];
        $currentSet = null;
        foreach ($sets as $set){
            if($set->setId === $setId){
                $currentSet = $set;
            }
            $seriesName = $set->seriesName;
            if(!in_array($seriesName, $seriesNames)){
                array_push($seriesNames, $seriesName);
            }
        }
        // setsPerSeries is an array which includes: seriesName -> array of sets of this series
        $setsPerSeries = [];
        foreach ($sets as $set){
            $thisSeries = $set->seriesName;
            if(!key_exists($thisSeries, $setsPerSeries)){
                $setsPerSeries[$thisSeries] = [];
            }
            $setsPerSeries[$thisSeries][$set->setName] = $set;
        }

        // Sort Series Names alphabetically
        ksort($setsPerSeries);
        // Sort Set Names for each Series alphabetically
        foreach ($seriesNames as $seriesName){
            ksort($setsPerSeries[$seriesName]);
        }

        $currentSetCards = [];
        $currentSetCards["Pokémon"] = Cards::query()->where('cardType','Pokémon')->where('setId',$setId)->orderBy('name')->get();
        $currentSetCards["Trainer"] = Cards::query()->where('cardType','Trainer')->where('setId',$setId)->orderBy('name')->get();
        $currentSetCards["Energy"] = Cards::query()->where('cardType','Energy')->where('setId',$setId)->orderBy('name')->get();

        return view('pages.wiki.set-explorer', compact('setsPerSeries','currentSetCards', 'currentSet'));
    }



    public function getSetName($setId){
        return Sets::find($setId)->name;
    }
    public function filter($cards,$filterstring){
        return array_keys($cards,$filterstring);
    }
}
