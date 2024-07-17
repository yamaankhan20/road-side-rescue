<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserDetails;
use App\Models\UserProfilepic;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\EmailVerification;
use Mail;
use App\Mail\Mailing;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except("verification");
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        session(['User_id' => $user->id]);
        return redirect()->route("verification");

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,vendor,user'],
        ]);
    }

    protected function create(array $data)
    {
        $user_data = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        $user_details = new UserDetails();
        $user_details->user_id = $user_data->id;
        $user_details->save();

        $user_pic = new UserProfilepic();
        $user_pic->user_id = $user_data->id;
        $user_pic->save();

        return $user_data;
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


        // Mail::send('opt-mail',['data'=>$data],function($message) use ($data){
        //     $message->to($data['email'])->subject($data['title']);
        // });
    }
    public function verification()
    {
        $id = Session::get('User_id');
        $user = User::where('id',$id)->first();
        if (!$user) {
            // Handle the case where the user is not found
            return redirect()->route("adminlogin")->with('verify', 'Not Allowed To Access This Page.');
        }

        if (Auth::check() && $user->is_verified == 1) {

            if ($user->role == 'admin') {
                return redirect()->route('admindashboard');
            } elseif ($user->role == 'vendor') {
                return redirect()->route('vendordashboard');
            } else {
                return redirect()->route('userdashboard');
            }

        }
//        elseif (!Auth::check() && $user->is_verified == 1){
//            return redirect()->route('adminlogin')->with('verify', 'Please login To proceed You are Already Verified.');
//        }

        $email = $user->email;

        if (!session()->has('otp_sent')) {
            $this->sendOtp($user);
            session(['otp_sent' => true]);
        }

        return view('auth.email-verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        if(!$otpData){
            return redirect()->route("verification")->with("wrong_opt", 'You entered wrong OTP');
            // return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                auth()->login($user);
                if ($user->role == 'admin') {
                    return redirect()->route('admindashboard');
                } elseif ($user->role == 'vendor') {
                    return redirect()->route('vendordashboard');
                } else {
                    return redirect()->route('userdashboard');
                }
                $request->session()->forget('User_id');
            }
            else{
                return redirect()->route("verification")->with("expired", 'Your OTP has been Expired');
                // return response()->json(['success' => false,'msg'=> ]);
            }

        }
    }
    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (30)){
            return redirect()->route("verification")->with("no_time", 'Please try after some time');
            // return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{
            session(['otp_sent' => false]);
            $this->sendOtp($user);//OTP SEND
            return redirect()->route("verification")->with("Send_otp", 'OTP has been sent');
            // return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }

}
