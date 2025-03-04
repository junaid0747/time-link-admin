<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Orders;
use App\Models\User;
use App\Models\Users;
use App\Models\VerifyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Stripe\Charge;
use Stripe\Order;
use Stripe\Stripe;

class ApiNewController extends Controller
{
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }
        VerifyToken::where('phone', $request->phone)->delete();
        $user = Users::where('phone', $request->phone)->first();
        $token = 112233;
        if ($user) {
            VerifyToken::insert([
                'phone' => $request->phone,
                'token' => $token
            ]);
            $user->password = Hash::make($token);
            $user->update();



            $credential = ['phone' => $user->phone, 'password' => $token];

            if (Auth::attempt($credential)) {


                return response(['status' => true, 'message' => 'Login Sussessfully', 'access_token' => $user->createToken($user->phone)->plainTextToken, 'data' => $user], 200);
            }


            // return response()->json([
            //     'status' => true,
            //     'message' => 'OTP sent successfully',
            // ], 200);
        }
        VerifyToken::insert([
            'phone' => $request->phone,
            'token' => $token
        ]);
        $user = new Users();
        $user->phone = $request->phone;
        $user->password = Hash::make($token);
        $user->save();


        Users::where('phone', $request->phone)->update([
            'is_verified' => 1
        ]);

        $credential = ['phone' => $user->phone, 'password' => $token];

        if (Auth::attempt($credential)) {


            return response(['status' => true, 'message' => 'Login Sussessfully', 'access_token' => $user->createToken($user->phone)->plainTextToken, 'data' => $user], 200);
        }

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'OTP sent successfully',
        // ]);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $token = VerifyToken::where('token', $request->otp)->first();
        // dd($token);
        if (!$token) {
            return response()->json([
                'status' => false,
                'message' => 'invalid otp',
            ], 400);
        }
        $user = Users::where('phone', $token->phone)->first();
        // dd($user);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'user not found against this otp',
            ], 400);
        }

        Users::where('phone', $token->phone)->update([
            'is_verified' => 1
        ]);
        $credential = ['phone' => $user->phone, 'password' => $request->otp];
        // dd($credential);
        if (Auth::attempt($credential)) {
            VerifyToken::where('token', $request->token)->delete();
            return response(['status' => true, 'message' => 'Login Sussessfully', 'access_token' => $user->createToken($user->phone)->plainTextToken, 'data' => $user], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'invalid credentials'
        ], 401);
    }

    public function registerAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|unique:users,email",
            "first_name" => "required|unique:users,user_name",
            "last_name" => "required",
            "date_of_birth" => "required",
            "gender" => "required",
            "phone" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $register = Users::create([
            'email' => $request->email,
            'name' => $request->first_name . " " . $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            "phone" => "$request->phone",

        ]);

        if ($register) {
            return response()->json([
                'status' => 'success',
                'message' => 'Account registered successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Account not registered',
            ]);
        }
    }

    function signIn(Request $request)
    {
        requestValidate($request, [
            // "email" => "required|email|exists:users,email",
            "phone" => "required|exists:users,phone",
        ]);
        // $user = VerifyToken::where('phone', $request->phone)->where('is_activated', 1)->first();
        $user = User::where('phone', $request->phone)->first();
        // dd($user);
        if (!$user) {
            return response(['status' => false, 'message' => 'phone number does not exist'], 200);
        } else {

            $token = 112233;
            VerifyToken::where('phone', $user->phone)->update([

                'token' => $token
            ]);


            return ['code' => 200, 'status' => true, 'message' => 'Otp sent to your phone number',];
        }
    }

    // public function signInOtp(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'otp' => 'required|numeric|digits:6',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => $validator->errors()->first(),
    //         ], 422);
    //     }

    //     $token = VerifyToken::where('token', $request->otp)->where('is_activated', 1)->first();
    //     // dd($token);
    //     if (isset($token) && !empty($token)) {
    //         $user = User::where('phone', $token->phone)->first();
    //         return ['code' => 200, 'status' => true, 'message' => 'Login Successfully', 'data' => $user, 'access_token' => $user->createToken($user->phone)->plainTextToken];
    //     } else {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Otp not matched',
    //         ]);
    //     }
    // }

    public function signInOtp(Request $request)
    {
        requestValidate($request, [
            'token' => "required"
        ]);
        $tockenCheck = VerifyToken::where('token', $request->token)->first();
        // DD($tockenCheck);

        if (!$tockenCheck) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid verification token'
            ], 400);
        }

        $user = Users::where('phone', $tockenCheck->email)->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'No user found with the provided token number'
            ], 404);
        }

        $user->phone_verify = 1;
        $user->update();

        $credential = ['phone' => $user->phone, 'password' => $request->token];
        if (Auth::attempt($credential)) {
            VerifyToken::where('token', $request->token)->delete();
            return response(['status' => true, 'message' => 'Login Sussessfully', 'access_token' => $user->createToken($user->phone)->plainTextToken, 'data' => $user], 200);
        }

        return response(['status' => false, 'message' => 'The given Credential are Invalid'], 200);
    }


    // BUSINESS PLAN
    public function businessPlan(Request $request, StripeController $stripe)
    {



        $message = "Bad Request";
        // requestValidate($request, [
        //     "business_name" => "required",
        //     "business_slogen" => "required",
        //     "business_phone" => "required",
        //     "business_category" => "required",
        //     "business_description" => "required",

        // ]);
        $user = auth()->user();
        // dd($user);
        $business_id = $request->business_id ?? 0;
        $business = Business::where('id', $business_id)->first();

        if ($business) {
            $message = "Business Updated Successfully";
            Business::where('id', $business_id)->update([
                'business_name' => $request->business_name,
                'business_slogen' => $request->business_slogen,
                'business_phone' => $request->business_phone,
                'business_category' => $request->business_category,
                'business_description' => $request->business_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'business_price_description' => $request->business_price_description,
                'business_location' => $request->business_location,
                'social_media_links' => $request->social_media_links,
                'website_url' => $request->website_url,
                'payment_plan' => $request->payment_plan
            ]);

            $stripe = new \Stripe\StripeClient(
                'sk_test_51LDUI4JHbj47Pk0aU1DX0e1mXvnW0f8La2lB43KL92f39qTAW2gpN7LLwluneY2TXn2StND5s0b98JoU92kflzIW00GhtjQhMY'
            );

            Stripe::setApiKey('sk_test_51LDUI4JHbj47Pk0aU1DX0e1mXvnW0f8La2lB43KL92f39qTAW2gpN7LLwluneY2TXn2StND5s0b98JoU92kflzIW00GhtjQhMY');
            $res = $stripe->tokens->create([
                "card" => [
                    "number" => $request->card_no,
                    "exp_month" => $request->exp_month,
                    "exp_year" => $request->exp_year,
                    "cvc" => $request->cvc,
                ]
            ]);
            $customer = \Stripe\Customer::create(array(
                "address" => [
                    "postal_code" => $request->postal_code,
                    "city" => $request->city,
                    "state" => $request->state,
                    "country" => $request->country,
                ],
                // "email" => $user->email,
                "name" => $user->user_name,
                'phone' => $user->phone,
                "source" => $res
            ));
            // dd($customer->phone);

            $amount = $request->input('amount');
            $currency = $request->input('currency');
            $description = $request->input('description');
            try {
                $charge = Charge::create([
                    'amount' => $amount * 100,
                    'currency' => "usd",
                    'description' => $description,
                    'customer' => $customer->id,
                ]);


                if ($charge) {

                    $alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $random_alphabets = '';
                    $max = strlen($alphabets) - 1;
                    for ($i = 0; $i < 4; $i++) {
                        $random_alphabets .= $alphabets[random_int(0, $max)];
                    }

                    $random_numbers = '';
                    for ($i = 0; $i < 4; $i++) {
                        $random_numbers .= random_int(0, 15);
                    }
                    $business_key = ($random_alphabets . $random_numbers);

                    $business->business_key = $business_key;
                    $business->update();
                }

                // Add your own logic to handle the payment result
                return ['status' => true, 'message' => $message, 'checkout' => 'https://dwive758.com/api/paypal/checkout?business_id=' . $business . '', 'payment' => $charge, 'business_key' => $business_key];
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }

            // return ['status' => true, 'message' => $message];
        } else {
            $message = "Business Added Successfully";
            $businessDetails = Business::insertGetId([
                'business_name' => $request->business_name,
                'business_slogen' => $request->business_slogen,
                'business_phone' => $request->business_phone,
                'business_category' => $request->business_category,
                'business_description' => $request->business_description,
                'business_price' => $request->business_price,
                'business_price_ranage' => $request->business_price_ranage,
                'business_location' => $request->business_location,
                'business_price_description' => $request->business_price_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'social_media_links' => json_encode($request->social_media_links),
                'business_location' => json_encode($request->business_location),
                'website_url' => $request->website_url,
                'payment_plan' => $request->payment_plan,
                'date' => date('Y-m-d'),
                'user_id' => $user->id,
            ]);
            $business = Business::where('id', $businessDetails)->first();

            //  dd($response);

            $stripe = new \Stripe\StripeClient(
                'sk_test_51LDUI4JHbj47Pk0aU1DX0e1mXvnW0f8La2lB43KL92f39qTAW2gpN7LLwluneY2TXn2StND5s0b98JoU92kflzIW00GhtjQhMY'
            );

            Stripe::setApiKey('sk_test_51LDUI4JHbj47Pk0aU1DX0e1mXvnW0f8La2lB43KL92f39qTAW2gpN7LLwluneY2TXn2StND5s0b98JoU92kflzIW00GhtjQhMY');
            $res = $stripe->tokens->create([
                "card" => [
                    "number" => $request->card_no,
                    "exp_month" => $request->exp_month,
                    "exp_year" => $request->exp_year,
                    "cvc" => $request->cvc,
                ]
            ]);
            $customer = \Stripe\Customer::create(array(
                "address" => [
                    "postal_code" => $request->postal_code,
                    "city" => $request->city,
                    "state" => $request->state,
                    "country" => $request->country,
                ],
                // "email" => $user->email,
                "name" => $user->user_name,
                'phone' => $user->phone,
                "source" => $res
            ));
            // dd($customer->phone);

            $amount = $request->input('amount');
            $currency = $request->input('currency');
            $description = $request->input('description');
            try {
                $charge = Charge::create([
                    'amount' => $amount * 100,
                    'currency' => "usd",
                    'description' => $description,
                    'customer' => $customer->id,
                ]);


                if ($charge) {

                    $alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $random_alphabets = '';
                    $max = strlen($alphabets) - 1;
                    for ($i = 0; $i < 4; $i++) {
                        $random_alphabets .= $alphabets[random_int(0, $max)];
                    }

                    $random_numbers = '';
                    for ($i = 0; $i < 4; $i++) {
                        $random_numbers .= random_int(0, 15);
                    }
                    $business_key = ($random_alphabets . $random_numbers);

                    $business->business_key = $business_key;
                    $business->update();
                }

                // Add your own logic to handle the payment result
                return ['status' => true, 'message' => $message, 'checkout' => 'https://dwive758.com/api/paypal/checkout?business_id=' . $business . '', 'payment' => $charge, 'business_key' => $business_key];
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }


    // ORDERS
    public function createOrder(Request $request)
    {

        requestValidate($request, [
            "business_id" => "required|integer",
            "business_key" => "required",

        ]);

        $business = Business::where('id', $request->business_id)->first();

        if ($business->business_key == $request->business_key) {
            $message = 'Order creataed successfully';

            $createOrder = Orders::create([
                'business_id' => $request->business_id,
                'business_key' => $request->business_key,
                'item_title' => $request->item_title,
                'start_time' => $request->start_time,
                'total_time' => $request->total_time,
                'status' => $request->status,
            ]);
            $imageUpdateId = $createOrder->id;

            if ($request->file('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/order'), $imageName);
                Orders::whereId($imageUpdateId)->update([
                    'image' => $imageName
                ]);
            }

            return ['status' => true, 'message' => $message, 'data' => $createOrder];
        }
        $message = 'Business key not matched with your business';
        return ['status' => false, 'message' => $message];
    }

    public function orderList()
    {
        $allOrders = Orders::with('business_list')->get();

        return ['status' => true, 'message' => 'All orders', 'data' => $allOrders];
    }


    public function orderBy_BusinessId_OrderId($businessKey, $orderId)
    {
        $ordersBy = Orders::where('business_key', $businessKey)->where('id', $orderId)->with('business_list')->first();

        if ($ordersBy) {
            return ['status' => true, 'message' => 'All orders by BusinessKey and Order id', 'data' => $ordersBy];
        } else {
            return ['status' => false, 'message' => 'There is no matched record'];
        }
    }


    public function getLatestOrder(Request $request)
    {
        $localUrl = 'https://timelink-user-app.vercel.app';
        $latestOrder = Orders::where('business_key', $request->business_key)->with('business_list')->latest('id')->first();



        if ($latestOrder != null) {
            if ($latestOrder->business_key && $request->order_id == 0) {
                return ['status' => true, 'orderId' => $latestOrder->id, 'message' => 'latest order is',  'url' => $localUrl . '?bk=' . $latestOrder->business_key . '&oi=' . $latestOrder->id, 'businessList' => $latestOrder->business_list,];
            }

            if ($latestOrder->business_id && $latestOrder->id > $request->order_id) {
                // return ['status' => true, 'message' => 'Latest order against your business key', 'data' => $latestOrder, 'url' => URL::to($localUrl) . '?order_id=' . $request->order_id . '&business_key=' . $latestOrder->business_key];

                return ['status' => true, 'orderId' => $latestOrder->id, 'message' => 'Latest order against your business key', 'url' => $localUrl . '?bk=' . $latestOrder->business_key . '&oi=' . $latestOrder->id, 'businessList' => $latestOrder->business_list,];
            } elseif ($latestOrder->business_id && $latestOrder->id <= $request->order_id) {
                return ['status' => true, 'orderId' => $latestOrder->id, 'message' => 'There is no New order yet',  'url' => $localUrl . '?bk=' . $latestOrder->business_key . '&oi=' . $latestOrder->id, 'businessList' => $latestOrder->business_list,];
            } else {
                return ['status' => false, 'message' => 'There is no record'];
            }
        } else {
            return ['status' => false, 'message' => 'There is no record'];
        }
    }
}
