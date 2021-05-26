<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradingController extends Controller
{
    public function marketplace(){
//        TODO
//        Example Data:
        $offerArray = [];
        $offer_arr1=array("id"=>"1","set"=>"Base", "name"=>"Alakazam", "price"=>"50", "user"=>"UserXYZ", "image"=>"https://images.pokemontcg.io/base1/1_hires.png");
        $offer1=(object)$offer_arr1;
        $offerArray[] = $offer1;
        $offer_arr2=array("id"=>"2","set"=>"Jungle", "name"=>"Bellsprout", "price"=>"100.000", "user"=>"CoolGuy", "image"=>"https://images.pokemontcg.io/base2/49_hires.png");
        $offer2=(object)$offer_arr2;
        $offerArray[] = $offer2;
        $offer_arr3=array("id"=>"3","set"=>"Fossil", "name"=>"Hypno", "price"=>"2", "user"=>"PenguinBuyer", "image"=>"https://images.pokemontcg.io/base3/23_hires.png");
        $offer3=(object)$offer_arr3;
        $offerArray[] = $offer3;
        $offer_arr4=array("id"=>"4","set"=>"Fossil", "name"=>"Mr. Fuji", "price"=>"65.47", "user"=>"HelloThere", "image"=>"https://images.pokemontcg.io/base3/58_hires.png");
        $offer4=(object)$offer_arr4;
        $offerArray[] = $offer4;
        $offer_arr5=array("id"=>"5","set"=>"Black & White", "name"=>"Sawk", "price"=>"5", "user"=>"TheUser", "image"=>"https://images.pokemontcg.io/bw1/62_hires.png");
        $offer5=(object)$offer_arr5;
        $offerArray[] = $offer5;

        return view('pages.trading.marketplace', compact('offerArray'));
    }
}
