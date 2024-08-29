<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Redirector;
use DB;
use Hash;
use Carbon\Carbon;
use Session;



class SuadminController extends Controller
{

    public function index()
    {
        if (Session::has('su_sess_id')) {
            $user = DB::table('su_user')->count();
            $customer = DB::table('customer')->count();
            $item = DB::table('item')->count();
            return view('suadmin::index', compact('user', 'customer', 'item'));
        } else {
            return view('suadmin::login');
        }
    }

    public function login()
    {
        $data = DB::table('suadmin_basic')->select('*')->get();

        if (count($data) > 0) {
            // return redirect(url('suadmin/index'))->with("success", "Successfully, Loggin.");
            // return view('suadmin::login')->with("success", "Successfully, Loggin.");
            return view('suadmin::login');
        } else {
            return view('suadmin::signup');
        }
    }

    public function signup()
    {
        return view('suadmin::signup');
    }
    public function signup_verify()
    {
        return view('suadmin::signupverify');
    }
    public function signup_verify_post(Request $request)
    {
        $request->validate([
            'su_email' => 'required|email',
            'su_otp' => 'required|numeric'
        ]);

        $signup_check = DB::table('suadmin_basic')
            ->where('su_email', $request->su_email)
            ->where('su_otp_status', 0)
            ->first();

        if ($signup_check) {
            $otpValidityMinutes = 10;
            $otp_record = DB::table('su_otp')
                ->where('su_email', $signup_check->su_email)
                ->where('su_otp', $request->su_otp)
                ->first();
            $otpCreatedAt = Carbon::parse($otp_record->su_created_at);
            $otpExpiresAt = $otpCreatedAt->addMinutes($otpValidityMinutes);
            if (Carbon::now()->lessThanOrEqualTo($otpExpiresAt)) {
                DB::table('suadmin_basic')
                    ->where('su_email', $signup_check->su_email)
                    ->update(['su_otp_status' => 1]);
                // DB::table('su_otp')->where('su_id', $otp_record->su_id)->delete();
                return redirect(url('suadmin/login'))->with(['success' => 'OTP verified successfully']);
            } else {
                return redirect()->back()->with(['fail' => 'Invalid or expired OTP']);
            }
        }
        return redirect()->back()->with(['fail' => 'Invalid email or OTP already verified']);
    }

    function signup_post(Request $request)
    {

        $request->validate([
            'su_name' => 'required',
            'su_email' => 'required',
            'su_mobile' => 'required',
            'su_pwd' => 'required'
        ]);
        $name = $request->su_name;
        $email = $request->su_email;
        $mobile = $request->su_mobile;
        $pwd = Hash::make($request->su_pwd);
        $user = DB::table('suadmin_basic')->insert([
            'su_name' => $name,
            'su_email' => $email,
            'su_pwd' => $pwd,
            'su_mobile' => $mobile,
            'su_created_on' => Carbon::now(),
            'su_updated_on' => Carbon::now(),
            'su_status' => 1,
            'su_otp_status' => 0,
        ]);

        if (!$user) {
            return redirect(url('suadmin/signup'))->with("error", "Registration Failed,try again");
        }
        $otp = rand(100000, 999999);
        DB::table('su_otp')->insert([
            'su_name' => $name,
            'su_email' => $email,
            'su_otp' => $otp,
            'su_created_at' => Carbon::now(),
            'su_expired_at' => Carbon::now()->addMinutes(10),
        ]);

        Mail::send('suadmin::otp.registration', ['otp' => $otp], function ($message) use ($name, $email) {
            $message->to($email);
            // $message->subject("Report for " .$name. " account");
            $message->subject($name . " here your OTP to Register as SUPER ADMIN to your account on Point Of Sale.");
        });
        // return redirect(url('suadmin/signupverify'))->with("success", "Registration success, Login to access the app");
        return redirect(url('suadmin/signupverify'))->with("success", "OTP is sent to your registred mail...");

    }

    public function login_post(Request $request)
    {
        $request->validate([
            'su_email' => 'required',
            'su_pwd' => 'required'
        ]);

        $login_check = DB::table('suadmin_basic')
            ->where('su_email', '=', $request->su_email)
            ->where('su_otp_status', '=', 1)
            ->first();
        if ($login_check) {
            if (Hash::check($request->su_pwd, $login_check->su_pwd)) {
                $sess_array = [
                    'su_sess_id' => $login_check->su_id,
                    'su_sess_name' => $login_check->su_name,
                    'su_sess_email' => $login_check->su_email,
                    'su_log' => 'su_logged_in'
                ];
                $request->session()->put($sess_array);
                return redirect('suadmin/index');
            } else {
                return back()->with('fail', 'Password not match!');
            }
        } else {
            return back()->with('fail', 'This email is not register/verified.');
        }
    }

    function logout()
    {
        if (Session::has('su_sess_id')) {
            Session::pull('su_sess_id');
            Session::flush();
            return redirect('suadmin/login');
        }
        return redirect('suadmin/login');
    }

}
