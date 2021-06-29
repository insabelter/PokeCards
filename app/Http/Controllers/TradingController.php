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
        $offers = Offers::All();

        $offerArray = $this->toDisplayOffer($offers);

        return view('pages.trading.marketplace', compact('offerArray'));
    }

    public function watchlist(Request $request){
        $offerArray = [];

        return view('pages.trading.watchlist', compact('offerArray'));
    }

    public function offers(){
        $offers = Offers::query()->where('userId',Auth::id())->get();

        $offerArray = $this->toDisplayOffer($offers);

        return view('pages.trading.offers', compact('offerArray'));
    }

    public function newOffer(Request $request) {

        $offer = new Offers();
        $offer->cardId = $request->cardid;
        $offer->description = $request->description;
        $offer->userId = Auth::id();
        $offer->grade = $request->grade;
        $offer->preis = $request->price;
        $offer->verhandelbar = isset($request->verhandelbar);
        $offer->save();

        return redirect('offers') -> with("msg","New Offer created!");
    }

    private function toDisplayOffer($offers){
        $offerArray = [];
        foreach($offers as $offer){
            $card = Cards::query()->where('id',$offer->cardId)->get()[0];
            $user = User::query()->where('id',$offer->userId)->get()[0];
            $newOffer = (object)array(
                "id" => $offer->offerid,
                "user" => $user->name,
                "image" => $card->largeImage,
                "name" => $card->name,
                "cardtype" => $card->cardtype,
                "description" => $offer->description,
                "price" => $offer->preis,
                "verhandelbar" => $offer->verhandelbar ? "negotiable" : "not negotiable",
                "grade" => $offer->grade
            );
            array_push($offerArray,$newOffer);
        }
        return $offerArray;
    }
}
