<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index(){
//        TODO: Get DB Data
//        Example Data:
        $cardArray = [];
        $card_arr1=array("id"=>"1","set"=>"Base", "name"=>"Alakazam", "type"=>"Pokémon", "release"=>"1999/01/09", "image"=>"https://images.pokemontcg.io/base1/1_hires.png");
        $card1=(object)$card_arr1;
        $cardArray[] = $card1;
        $card_arr2=array("id"=>"2","set"=>"Jungle", "name"=>"Bellsprout", "type"=>"Pokémon", "release"=>"1999/06/16", "image"=>"https://images.pokemontcg.io/base2/49_hires.png");
        $card2=(object)$card_arr2;
        $cardArray[] = $card2;
        $card_arr3=array("id"=>"3","set"=>"Fossil", "name"=>"Hypno", "type"=>"Pokémon", "release"=>"1999/10/10", "image"=>"https://images.pokemontcg.io/base3/23_hires.png");
        $card3=(object)$card_arr3;
        $cardArray[] = $card3;
        $card_arr4=array("id"=>"4","set"=>"Fossil", "name"=>"Mr. Fuji", "type"=>"Trainer", "release"=>"1999/10/10", "image"=>"https://images.pokemontcg.io/base3/58_hires.png");
        $card4=(object)$card_arr4;
        $cardArray[] = $card4;
        $card_arr5=array("id"=>"5","set"=>"Black & White", "name"=>"Sawk", "type"=>"Pokémon", "release"=>"2011/04/25", "image"=>"https://images.pokemontcg.io/bw1/62_hires.png");
        $card5=(object)$card_arr5;
        $cardArray[] = $card5;

        return view('pages.wiki', compact('cardArray'));
    }
}
