<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Sets;

class WikiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Wiki Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for showing all cards.
    | This can be done in the card search for specific cards or in the set explorer.
    |
    */

    /**
     * Show the card search and provide all card data.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function card_search(){
        $sets = Sets::all();

        // $cards now contains a leftJoin with Sets on Cards
        $cards = Cards::query()->leftJoin('Sets as Sets','Cards.setId','=','Sets.setId')->get();
        return view('pages.wiki.card-search', compact('cards','sets'));
    }

    /**
     * Insa
     * Show the set explorer and subdivide in it the categories pokemon, trainer, energy cards.
     *
     * @param $setId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

        return view('pages.wiki.set-explorer', compact('setsPerSeries','currentSetCards', 'currentSet', 'sets'));
    }

    /**
     * Insa
     *
     * @param $setId
     * @return mixed
     */
    public function getSetName($setId){
        return Sets::find($setId)->name;
    }

    /**
     * Insa
     *
     * @param $cards
     * @param $filterstring
     * @return int[]|string[]
     */
    public function filter($cards,$filterstring){
        return array_keys($cards,$filterstring);
    }
}
