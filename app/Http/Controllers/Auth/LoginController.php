<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
//        $this->middleware(PauseLoginProcess::class)->only('login');
    }


    protected function authenticated(Request $request, $user)
    {

//        if ($user->is_verified === 1) {
//            if ($user->isAdmin()) {
//                return redirect()->route('admindashboard');
//            } elseif ($user->isVendor()) {
//                return redirect()->route('vendordashboard');
//            } else {
//                return redirect()->route('userdashboard');
//            }
//        } else {
//            return redirect()->route('verification');
//        }

    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if($user->is_verified === 1){
                if ($user-> role === 'admin') {
                    return redirect()->route('admindashboard');
                } elseif ($user-> role === 'vendor') {
                    return redirect()->route('vendordashboard');
                } else {
                    return redirect()->route('userdashboard');
                }
            }else {
                session(['User_id' => $user->id]);
                auth()->logout();
                return redirect()->route("verification");
            }

        } else {
            return redirect()->route("adminlogin")->with("email", "Wrong Email Or Password");
        }
    }

    public function login_view(){


        $data =  [

            "title" => "Login | Roadside Rescue",
            "breadcrumb" =>"Login"


        ];

        return view('backend.login' ,$data);

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
