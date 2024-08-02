<?php

namespace App\Http\Controllers\Backend\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class CardController extends Controller
{

    public function index()
    {
        $data =  [

            "title" => "All Cards | Roadside Rescue",
            "breadcrumb" => "All Cards"

        ];
        $user_ID = Auth::user()->id;
        $cards = Card::where("user_id", $user_ID)->get();
        foreach ($cards as $card) {
            // Create a bcrypt hash of the card number
            $card->hashed_card_number = Hash::make($card->card_number);
        }
        return view('backend.User.cards.card-list',$data, compact('cards'));
    }

    public function create()
    {
        $data =  [

            "title" => "Add Cards | Roadside Rescue",
            "breadcrumb" =>"Add Card"

        ];

        return view('backend.User.cards.card-add', $data);
    }

    public function store(Request $request)
    {
        $user_ID = Auth::user()->id;

        $request->validate([
            'card_number' => 'required|string|max:16|min:16|unique:cards',
            'card_holder_name' => 'required|string|max:255',
            'expiry_date' => 'required|date',
            'cvv' => 'required|string|max:3',
        ]);

        $firstNElements = substr($request->card_number, -4);


        $card = Card::create([
            'user_id' => $user_ID,
            'card_number' => $request -> card_number ,
            'card_holder_name' => $request->card_holder_name,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,
        ]);

        $token = JWTAuth::fromUser($card);
        $card->card_number = "xxxxxxxxxxxx" . $firstNElements;
        $card->Card_token = $token;
        $card->save();

        return redirect()->route('cards')->with('success', 'Card created successfully.');
    }

    public function edit(Card $card)
    {
        $user_ID = Auth::user()->id;
        $data =  [

            "title" => "Edit Cards | Roadside Rescue",
            "breadcrumb" =>"Edit Card"

        ];

        if($user_ID != $card->user_id){
            return redirect()->route('cards')->with('error', 'Not Found');
        }

        $token = $card->Card_token;
        $payload = JWTAuth::setToken($token)->getPayload();
        $card_number = $payload['card_number'];

        return view('backend.User.cards.card-edit',$data, compact('card','card_number'));
    }

    public function update(Request $request, Card $card)
    {
        $request->validate([
            'card_number' => 'required|string|max:16|min:16',
            'card_holder_name' => 'required|string|max:255',
            'expiry_date' => 'required|date',
            'cvv' => 'required|string|max:3',
        ]);

        $card_details = [
          'card_number' => $request->card_number,
        ];

        $firstNElements = substr($request->card_number, -4);
        $cardNumberHidden = "xxxxxxxxxxxx" . $firstNElements;

        $card->update([
            'card_number' => $request->card_number,
            'card_holder_name' => $request->card_holder_name,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,
        ]);

        $token = JWTAuth::fromUser($card);


        $card->card_number = $cardNumberHidden;
        $card->Card_token = $token;
        $card->save();

        return redirect()->route('cards')->with('success', 'Card updated successfully.');
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('cards')->with('success', 'Card deleted successfully.');
    }
}
