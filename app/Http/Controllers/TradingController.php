<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Offers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradingController extends Controller
{

    public function marketplace(Request $request){
        $offers = Offers::All()->sortDesc();

        $offerArray = $this->toDisplayOffer($offers);

        return view('pages.trading.marketplace', compact('offerArray'));
    }

    public function watchlist(Request $request){
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }

        $offerArray = [];

        return view('pages.trading.watchlist', compact('offerArray'));
    }

    public function offers($cardId){
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }

        $cardImage = '';
        if($cardId !== 'x'){
            $card = Cards::query()->where('id',$cardId)->get()->first();
            if(isset($card)){
                $cardImage = $card->largeImage;
            }
            else{
                $cardId = 'x';
            }
        }

        $offers = Offers::query()->where('userId',Auth::id())->get()->sortDesc();

        $offerArray = $this->toDisplayOffer($offers);
        return view('pages.trading.offers', compact('offerArray','cardId','cardImage'));
    }

    public function newOffer(Request $request) {
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }

        $offer = new Offers();
        $offer->cardId = $request->cardid;
        $offer->description = $request->description;
        $offer->userId = Auth::id();
        $offer->grade = $request->grade;
        $offer->preis = $request->price;
        $offer->verhandelbar = isset($request->negotiable);
        $offer->save();

        return redirect('offers/x') -> with("msg","New Offer created!");
    }

    public function deleteOffer(Request $request){
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }

        Offers::query()->where('offerId',$request->offerId)->delete();

        return redirect() -> route('offers','x');
    }

    private function toDisplayOffer($offers){
        $offerArray = [];
        foreach($offers as $offer){
            $card = Cards::query()->where('id',$offer->cardId)->get()[0];
            $user = User::query()->where('id',$offer->userId)->get()[0];
            $newOffer = (object)array(
                "id" => $offer->offerId,
                "user" => $user->name,
                "image" => $card->largeImage,
                "name" => $card->name,
                "cardtype" => $card->cardtype,
                "description" => $offer->description,
                "price" => $offer->preis,
                "negotiable" => $offer->verhandelbar ? "negotiable" : "not negotiable",
                "grade" => $offer->grade
            );
            array_push($offerArray,$newOffer);
        }
        return $offerArray;
    }
}
