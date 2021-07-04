<?php

namespace App\Http\Controllers;

use App\Notifications\ContactUser;
use App\Models\Cards;
use App\Models\Offers;
use App\Models\Sets;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class TradingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Trading Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for any aspect of trading the cards.
    | That implies the marketplace, offers, watchlist and contacting other users.
    |
    */

    /**
     * Insa
     * All offers are dispalyes with the newest ones at first.
     *
     * @param $cardName
     * @param $cardSet
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function marketplace($cardName,$cardSet){
        $cardName = $cardName === 'x' ? '' : $cardName;
        $cardSet = $cardSet === 'x' ? '' : $cardSet;

        $offers = Offers::All()->sortDesc();

        $offerArray = $this->toDisplayOffer($offers);

        return view('pages.trading.marketplace', compact('offerArray','cardName','cardSet'));
    }

    /**
     * Insa
     * The user can see all offers that are added to his watchlist.
     *
     * @param Request $request
     * @return Redirector
     */
    public function watchlist(Request $request){
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }

        $offers = [];
        $watches = Watchlist::query()->where('userId',Auth::id())->get()->sortByDesc('watchedOfferId');
        foreach ($watches as $watch){
            $offer = Offers::query()->where('offerId',$watch->watchedOfferId)->get()->first();
            array_push($offers,$offer);
        }

        $offerArray = $this->toDisplayOffer($offers);

        return view('pages.trading.watchlist', compact('offerArray'));
    }

    /**
     * Insa
     * The user can see all his offers.
     *
     * @param $cardId
     * @return Redirector
     */
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

    /**
     * Insa
     * The user can create a new offer.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function newOffer(Request $request) {
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }
        
        if($request->price >= 0){
            $offer = new Offers();
            $offer->cardId = $request->cardid;
            $offer->description = $request->description;
            $offer->userId = Auth::id();
            $offer->grade = $request->grade;
            $offer->preis = $request->price;
            $offer->verhandelbar = isset($request->negotiable);
            $offer->save();
        }

        return redirect('offers/x') -> with("msg","New Offer created!");
    }

    /**
     * Insa
     * The user can delete an offer.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteOffer(Request $request){
        // Check if not logged in
        if(Auth::id() === null){
            return redirect('');
        }

        Offers::query()->where('offerId',$request->offerId)->delete();

        return redirect() -> route('offers','x');
    }

    /**
     * Insa
     * The user can add an offer to his watchlist or remove it.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToWatchlist(Request $request){

        $offer = Offers::query()->where('offerId',$request->offerId)->get()->first();
        $userId = Auth::id();

        if(isset($offer) && isset($userId)){
            $watch = Watchlist::query()->where('userId',$userId)->where('watchedOfferId',$offer->offerId)->get()->first();

            // Check if offer is already in watchlist of that user
            // If yes --> Delete
            if(isset($watch)){
                Watchlist::query()->where('userId',$userId)->where('watchedOfferId',$offer->offerId)->delete();
            }
            // If not already in Watchlist, add to Watchlist
            else{
                $newWatch = new Watchlist();
                $newWatch->userId = $userId;
                $newWatch->watchedOfferId = $offer->offerId;
                $newWatch->save();
            }

        }

        return Redirect::back();

    }

    /**
     * Insa
     * The user can contact the seller from an offer via email.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactUser(Request $request){

        $offerId = $request->offerId;
        $offer = Offers::query()->where('offerId',$offerId)->get()->first();
        $card = Cards::query()->where('id',$offer->cardId)->get()->first();
        $creator = User::query()->where('id',$offer->userId)->get()->first();
        if(isset($offer) && isset($card) && isset($creator)){
            $data = (object)array(
                "offer_card" => $card->name,
                "username" => auth()->user()->name,
                "usermail" => auth()->user()->email,
                "message" => $request->message
            );

            Mail::to($creator->email)->send(new ContactUser($data));
        }

        return Redirect::back();
    }

    /**
     * Insa
     *
     * @param $offers
     * @return array
     */
    private function toDisplayOffer($offers){
        $offerArray = [];
        foreach($offers as $offer){
            $card = Cards::query()->where('id',$offer->cardId)->get()->first();
            $set = Sets::query()->where('setId',$card->setId)->get()->first();
            $user = User::query()->where('id',$offer->userId)->get()->first();
            $watch = Watchlist::query()->where('userId',Auth::id())->where('watchedOfferId',$offer->offerId)->get()->first();
            $watched = isset($watch);

            $newOffer = (object)array(
                "id" => $offer->offerId,
                "user" => $user->name,
                "userId" => $user->id,
                "image" => $card->largeImage,
                "name" => $card->name,
                "set" => $set->setName,
                "cardtype" => $card->cardtype,
                "description" => $offer->description,
                "price" => $offer->preis,
                "negotiable" => $offer->verhandelbar ? "negotiable" : "not negotiable",
                "grade" => $offer->grade,
                "watched" => $watched
            );
            array_push($offerArray,$newOffer);
        }
        return $offerArray;
    }
}
