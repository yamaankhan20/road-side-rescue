<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        // dd($googleUser);
        $user = User::where('email', $googleUser->email)->first();
        if(!$user)
        {
          $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'provider_id' => $googleUser->id , 'password' => \Hash::make(rand(100000,999999)), 'is_verified' => "1"]);
        }
        Auth::login($user);
        return redirect()->intended("admin-dashboard");
    }

    public function redirectToGoogleLogin()
    {
        // return Socialite::driver('google')->redirect();
        return Socialite::driver('google')->with(['redirect_uri' => config('services.google.additional_redirect')])->redirect();
    }

    public function handleGoogleLoginCallback()
    {
        // $googleUser = Socialite::driver('google')->stateless()->user();
        $googleUser = Socialite::driver('google')->stateless()->with(['redirect_uri' => config('services.google.additional_redirect')])->user();
        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {

            return redirect()->route('register')->with('error', 'User not registered.');
        } else {
            Auth::login($user);
            return redirect()->intended("admin-dashboard");
        }
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $this->findOrCreateUser($user, 'facebook');
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect()->route('login');
        }
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        $user = User::where('provider_id', $socialUser->id)->first();

        if ($user) {
            Auth::login($user);
        } else {
            $user = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'provider' => $provider,
                'provider_id' => $socialUser->id,
                'password' => bcrypt('123456dummy'), // You can use any default password, or handle password separately
            ]);

            Auth::login($user);
        }
    }
}
