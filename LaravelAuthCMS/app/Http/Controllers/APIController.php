<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordReset;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //Login
    function login(Request $request)
    {

        requestValidate($request, [
            "email" => "required|email|exists:users,email",
            "password" => "required"
        ]);

        $user = Users::where('email', $request->email)->first();
        if (!$user)
            return response(['status' => false, 'message' => 'Email address does not exist'], 200);

        if (!Hash::check($request->password, $user->password))
            return response(['status' => false, 'message' => 'Invalid email or password. Please try again'], 200);


        return ['code' => 200, 'status' => true, 'message' => 'Login Successfully', 'data' => $user, 'access_token' => $user->createToken($request->email)->plainTextToken];
    }



  //Register
    function register(Request $request)
    {

        requestValidate($request, [
            "email" => "required|email|unique:users,email",
            "name" => "required",
            "password" => "required",
            "role" => "in:company,user,business",
            "country" => "required",
            "city" => "required",
            "state" => "required"

        ]);

        $user = new Users;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = '';
        $user->role = $request->role;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->address = $request->address ?? '';
        // $user->image = $request->name;

        if ($request->file()) {
            $imageName = rand(9, 99999) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/user'), $imageName);
            $user->image = $imageName;
        }
        $token = rand(0, 9999);
        PasswordReset::insert([
            'email' => $user->email,
            'token' => $token
        ]);
        Mail::send('mails.forgot-password', ['user' => $user, 'token' => $token], function ($m) use ($user, $token) {
            $m->from('verify@app.com', 'My CRM');
            $m->to($user->email, $user->name)->subject('OTP Verification Email');
        });
        $user->save();
        return ['status' => true, 'message' => 'OTP has been sent on your Email please check your inbox, also check spam list'];
    }


  // Forgot Password
    function forgot_password(Request $request)
    {

        requestValidate($request, [
            "email" => "required|email|exists:users"

        ]);

        $user = Users::where('email', $request->email)->first();
        if ($user) {
            $token = rand(0, 9999);
            PasswordReset::insert([
                'email' => $user->email,
                'token' => $token
            ]);
            Mail::send('mails.forgot-password', ['user' => $user, 'token' => $token], function ($m) use ($user, $token) {
                $m->from('forgot@app.com', 'My CRM');

                $m->to($user->email, $user->name)->subject('Forgot Password Token');
            });


            return ['status' => true, 'message' => 'OTP has been sent on your Email please check your inbox, also check spam list'];
        } else {

            return ['status' => false, 'message' => "The Email you provided doesn't belong to any account"];
        }

        return ['status' => true, 'message' => 'OTP has been sent on your Email please check your inbox, also check spam list'];
    }

  //OTP Verify
    function otp_verify(Request $request)
    {

        requestValidate($request, [
            "token" => "required",
            "email" => "required"

        ]);

        $token = PasswordReset::where('token', $request->token)->first();
        if ($token) {
            Users::where('email', $token->email)->update([
                'is_verified' => 1
            ]);
            PasswordReset::where('token', $request->token)->delete();

            $user = Users::where('email', $request->email)->first();
            return ['code' => 200, 'status' => true, 'message' => 'Registered Successfully', 'data' => $user, 'access_token' => $user->createToken($request->email)->plainTextToken];
        } else {

            return ['status' => false, 'message' => 'Invalid OTP'];
        }

        // return ['status' => true, 'message' => 'User Registered Successfully'];
    }

  //Reset Password
    function reset_password(Request $request)
    {

        requestValidate($request, [
            "token" => "required",
            "password" => "required"

        ]);

        $token = PasswordReset::where('token', $request->token)->first();
        if ($token) {
            Users::where('email', $token->email)->update([
                'password' => Hash::make($request->password)
            ]);
            PasswordReset::where('token', $request->token)->delete();
            $user = Users::where('email', $token->email)->first();

            return ['status' => true, 'message' => 'Password Reset Successfully', 'data' => $user, 'access_token' => $user->createToken($token->email)->plainTextToken];
        } else {

            return ['status' => true, 'message' => 'Invalid OTP'];
        }

        // return ['status' => true, 'message' => 'Password Reset Successfully'];
    }

  //Get Profile
    function profile(Request $request)
    {
        $user =  auth()->user();
        $user['access_token'] = $user->createToken($user->email)->plainTextToken;

        return ['code' => 200, 'status' => true, 'message' => 'User Profile Information', 'data' => $user];
    }

  //Update Profile
    function profile_update(Request $request)
    {

        requestValidate($request, [
            "phone" => "required",
            "name" => "required",
            "address" => "required",
            "country" => "required",
            "city" => "required",
            "state" => "required"

        ]);

        $user = Users::find(auth()->user()->id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->state = $request->state;
        // $user->image = $request->name;

        if ($request->file()) {
            $imageName = rand(9, 99999) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/user'), $imageName);
            $user->image = $imageName;
        }
        $user->save();

        return ['status' => true, 'message' => 'Profile Updated Successfully'];
    }
}
