<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Fish;
use App\Models\Bid;
use App\Models\Status;
use App\Models\Category;
use App\Models\User;
use App\Models\Customer;
use App\Models\Subcategory;
use App\Models\Message;
use Carbon\Carbon;

class AccountController extends Controller


{

    public $userId;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /*
    * PROFILE 
    */
    public function showUser () {
        $user = Customer::where('user_id', auth()->user()->id)->with('user')->get();
        return response()->json($user);
    }

    public function editUser (Request $request) {
        $id = $request->Input('id');

        Customer::where('id', '=', $id)->update(array(
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'image' => $request->input('image'),
            'street' => $request->input('street'),
            'nr' => $request->input('nr'),
            'postal_code' => $request->input('postal_code'),
            'province' => $request->input('province'),
        ));

        $response = array('response' => 'Your profile has been updated.', 'succes' => true);
        return $response;
    }



    /* 
    * FISHES
    */
    public function storeFish(Request $request) {

        $fish = Fish::create([
            'name' => $request->input('name'),
            'size' => $request->input('size'),
            'detail' => $request->input('detail'),
            'birthdate' => Carbon::parse($request->input('birthdate')),
            'image' => $request->input('image'),
            'sex' => $request->input('sex'),
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'user_id' => auth()->user()->id,
        ]);
 
        $response = array('response' => 'Your fish has been stored!', 'succes' => true);
        return $response;
    }

    public function showFishes () {
        $categories = Category::orderBy('name', 'desc')->get();
        $subcategories = Subcategory::orderBy('name', 'desc')->get();
        $fishes = Fish::orderBy('id', 'desc')->with('subcategory', 'subcategory.categories' )->where('user_id', auth()->user()->id)->get();
        return response()->json([$fishes, $categories, $subcategories]);
    }

    public function showFish ($id) {
        $fish = Fish::where('id', $id)->get();
        return response()->json($fish);
    }

    public function editFish (Request $request) {

            $id = $request->input('id');
    
            // Log the value of 'image'
            \Log::info('Image input value:', ['image' => $request->input('image')]);
    
            Fish::where('id', '=', $id)->update([
                'name' => $request->input('name'),
                'size' => $request->input('size'),
                'detail' => $request->input('detail'),
                'image' => $request->input('image'),
                'birthdate' => $request->input('birthdate'),
                'sex' => $request->input('sex'),
                'subcategory_id' => $request->input('subcategory_id'),
                'category_id' => $request->input('category_id'),
            ]);
    
            $response = ['response' => 'Your fish has been updated!', 'success' => true];
            return response()->json($response);
    }

    public function deleteFish ($id) {
        Fish::where('id', $id)->delete();
        $response = array('response' => "Your fish has been removed from the pond!", 'success' => true);
        return $response;
    }

    /* 
    *   BIDS
    */

    public function daysToHours ($daysOrHours, $amount) {

        if( $daysOrHours == 'days') {
            $daysToHoursConvert = $amount * 24; 
            return $daysToHoursConvert;
        } else if ( $daysOrHours == 'hours' ) {
            $daysToHoursConvert =  $amount; 
            return $daysToHoursConvert;
        }
    }

    public function storeBid(Request $request) {

        $user = auth()->user()->id;
       

        $bid = Bid::create([
            'fish_id' => $request->input('fish_id'), 
            'bid' => $request->input('bid'),
            'seller_id' => $user,
            'status_id' => Status::where('id', 2)->value('id'),   
            'started_at' => Carbon::parse($request->input('started_at')),
            'ended_at' => Carbon::parse($request->input('started_at'))->addHours($this->daysToHours($request->input('days_or_hours'), $request->input('ended_at'))),
            //'bidder_id' => [''],        
        ]);
 
        $response = array('response' => 'Your bid has been made! Feel free to Publish it whenever you desire.', 'succes' => true);
        return $response;
    }  

    public function showBids () {
        $bids = Bid::orderBy('ended_at', 'desc')->with('fish', 'statuses', 'bidder', 'seller')->where('seller_id', auth()->user()->id)->get(); 
        $fishes = Fish::orderBy('name', 'desc')->where('user_id', auth()->id())->get();
        /*$user = auth()->user()->id;
        $status = Status::where('id', 1)->value('id');*/
        return response()->json([$bids, $fishes]);
    }

    // show user offers
    public function showOffers() {
        $userId = auth()->user()->id;
    
        // Retrieve bids with related data
        $bids = Bid::orderBy('ended_at', 'desc')
            ->with('fish', 'statuses', 'bidder', 'seller')
            ->where('seller_id', $userId)
            ->whereJsonContains('bidders_id', $userId)
            ->get();
    
        return response()->json([$bids]);
    }
    

    public function showBid ($id) {
        $bid = Bid::where('id', $id)->get();
        return response()->json($bid);
    }

    public function publishBid (Request $request) {

        $id = $request->Input('id');

        Bid::where('id', '=', $id)->update(array(
            'bid' => $request->input('bid'),
            'started_at' => $request->input('started_at'),
            'ended_at' => $request->input('ended_at'),
            'status_id' => Status::where('id', 2)->value('id'), 
            'fish_id' => $request->input('fish_id'),
        ));

        $response = array('response' => 'Your bid has been published! If you wish to unpublish it, be sure to do it before 12 hours of ending.', 'succes' => true);
        return $response;
    }

    public function deleteBid ($id) {
        Bid::where('id', $id)->delete();
        $response = array('response' => "Your bid has been removed!", 'success' => true);
        return $response;
    }

    // ONGOING AUCTIONS
    public function showOngoingBids () {
        $bids = Bid::where('status_id', 2)->with('fish', 'fish.subcategory', 'fish.subcategory.categories', 'statuses')->get(); 
        return response()->json([$bids]);
    }

    public function showOngoingBid ($id) {
        $bid = Bid::where('id', $id)->with('fish', 'fish.user.customer', 'fish.subcategory', 'fish.subcategory.categories', 'statuses')->get(); 
        return response()->json($bid);
    }

    public function raiseBid (Request $request) {

        $id = $request->Input('id');

        $bid = Bid::where('id', $id)->pluck('bidders_id');

        // save every user that puts a bid inside the bidders_id json columns
        $user = auth()->user()->id;
        $array = array_map('intval', str_split($user));
        $amount = $bid;
        $tempArray = json_decode($amount);
        array_push($tempArray, $array);
        $jsonData = json_encode($tempArray);

        Bid::where('id', '=', $id)->update(array(
            'bid' => $request->input('bid'),
            'highest_bidder' => auth()->user()->id,
            'bidders_id' => $jsonData,
        ));

        $response = array('response' => 'The auction has been updated with your bid.', 'succes' => true);
        return $response;
    }
    

    // messages
    public function showMessages() {
        $loggedUser = auth()->user()->id;
    
        $messages = Message::with('sender', 'receiver')  // Assuming you have relationships named 'sender' and 'receiver' in your Message model
            ->where(function ($query) use ($loggedUser) {
                $query->where('sender_id', $loggedUser)
                    ->orWhere('receiver_id', $loggedUser);
            })
            ->get();
    
        return response()->json([$messages]);
    }

    public function deleteMessage ($id) {
        Message::where('id', $id)->delete();
        $response = array('response' => "Your message has been removed from the pond!", 'success' => true);
        return $response;
    }

    
    public function storeMessage(Request $request) {

        $message = Message::create([
            'message' => $request->input('message'),
            'receiver_id' => $request->input('receiver_id'),
            'sender_id' => auth()->user()->id,
        ]);
 
        $response = array('response' => 'Your message has been sent to the pond!', 'succes' => true);
        return $response;
    }


    public function showUsers () {
        $users = Customer::with('user')->get();
        return response()->json([$users]);
    }
}
