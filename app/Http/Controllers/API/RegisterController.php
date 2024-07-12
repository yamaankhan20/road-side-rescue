<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use Illuminate\Http\Request;

use App\Models\User;
use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\Mailing;


class RegisterController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:vendor,user'

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }


        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ];
        // Create a new user record
        $user = User::create($data);

        return response()->json(['success' => true, 'message' => 'User Registered Successfully.', 'data'=> $user], 200);
    }

    public function sendOtp($user)
    {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'otp' => $otp,
                'created_at' => $time
            ]
        );

        $mailData =
            [
                "title" => 'Mail Verification',
                'body' => 'Your OTP is:- '.$otp,
            ];
        Mail::to($user->email)->send(new Mailing($mailData));

    }
    public function verify_otp(Request $request){

        $user = User::where('id',$request->id)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Not Allowed To Access This Page.'], 401);
        }

        if (Auth::check() && $user->is_verified == 1) {

            if ($user->role == 'admin') {
                return response()->json(['success' => true, 'message' => 'Admin Logged In', 'data'=>$user], 200);
            } elseif ($user->role == 'vendor') {
                return response()->json(['success' => true, 'message' => 'vendor Logged In', 'data'=>$user], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'user Logged In', 'data'=>$user], 200);
            }

        }

        $email = $user->email;
        $this->sendOtp($user);
        return response()->json(['success' => true, 'message' => 'Otp Send To your Account', 'data'=>$user], 200);

    }
    public function verifiedOtp(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();

        if(!$otpData){
            return response()->json(['success' => false, 'message' => 'Invalid OTP.'], 401);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);

                if ($user->role == 'admin') {
                    return response()->json(['success' => true, 'message' => 'Admin Logged In', 'data'=>$user], 200);
                } elseif ($user->role == 'vendor') {
                    return response()->json(['success' => true, 'message' => 'vendor Logged In', 'data'=>$user], 200);
                } else {
                    return response()->json(['success' => true, 'message' => 'user Logged In', 'data'=>$user], 200);
                }
            }
            else{
                return response()->json(['success' => false, 'message' => 'Your OTP has been Expired'], 401);
            }

        }
    }
    public function resendOtp(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $otpData = EmailVerification::where('email',$user->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (30)){
            return response()->json(['success' => false, 'message' => 'Please try after some time'], 401);
        }
        else{
            $this->sendOtp($user);
            return response()->json(['success' => true, 'message' => 'OTP Send To your Account'], 200);
        }

    }
}
