<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if($user->is_verified === 1){
                return response()->json(['success' => true, 'message' => 'User Authenticated Successfully.', "data", $user], 200);
            }
            return response()->json(['success' => false, 'message' => 'User Not Verified.'], 401);

        } else {
            return response()->json(['success' => false, 'error' => 'Invalid Password.'], 401);
        }
    }

}
