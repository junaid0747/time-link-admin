<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\Users;
use App\Models\Business;
use App\Models\Rating;
use App\Models\Product;

class BusinessController extends Controller
{
    public function busniess_update(Request $request,StripeController $stripe)
    {
        $message = "Bad Request";
        requestValidate($request, [
            "business_name" => "required",
            "business_slogen" => "required",
            "business_phone" => "required",
            "business_category" => "required",
            "business_description" => "required",
            // "business_price" => "required",
            // "business_price_ranage" => "required",
            // "business_price_description" => "required",
            // "business_location" => "required",
            // "social_media_links" => "required",
            // "website_url" => "required",
            // "business_logo" => "required",
            // "business_cover" => "required",
            // "payment_plan" => "required",

        ]);
        $user = auth()->user();
        $business_id = $request->business_id ?? 0;
        $business = Business::where('id',$business_id)->first();

        if($business){
            $message = "Business Updated Successfully";
            Business::where('id',$business_id)->update([
                'business_name'=>$request->business_name,
                'business_slogen'=>$request->business_slogen,
                'business_phone'=>$request->business_phone,
                'business_category'=>$request->business_category,
                'business_description'=>$request->business_description,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'business_price_description'=>$request->business_price_description,
                'business_location'=>$request->business_location,
                'social_media_links'=>$request->social_media_links,
                'website_url'=>$request->website_url,
                'payment_plan'=>$request->payment_plan
            ]);
            return ['status'=>true,'message' => $message];
        }
        else{
            $message = "Business Added Successfully";
            $businessDetails = Business::insertGetId([
                'business_name'=>$request->business_name,
                'business_slogen'=>$request->business_slogen,
                'business_phone'=>$request->business_phone,
                'business_category'=>$request->business_category,
                'business_description'=>$request->business_description,
                'business_price'=>$request->business_price,
                'business_price_ranage'=>$request->business_price_ranage,
                'business_location'=>$request->business_location,
                'business_price_description'=>$request->business_price_description,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'social_media_links'=>json_encode($request->social_media_links),
                'business_location'=>json_encode($request->business_location),
                'website_url'=>$request->website_url,
                'payment_plan'=>$request->payment_plan,
                'date'=>date('Y-m-d'),
                'user_id'=>$user->id,
            ]);
                $business = Business::where('id',$businessDetails)->first();

            //  dd($response);
            \Stripe\Stripe::setApiKey('sk_test_51LcbQHLce33uAcrH8cq8OVykZkf8lydutRLawXDyhSC16wjUeX0rDDNxuN9ZVnOcHLYwnNlLk7aARj8sDbHFRJ5400lOt3pewq');
            $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "Payment"
                    ],
                    'unit_amount' => $request->amount*100,
                    ],
                    'quantity' => 1,
                    ]
                ],
            'mode' => 'payment',
            'success_url' => route('stripe.success',$businessDetails),
            'cancel_url' => route('stripe.cancel'),
            ]);
        }

        return ['status'=>true,'message' => $message,'checkout'=>'https://dwive758.com/api/paypal/checkout?business_id='.$businessDetails.'','business_id'=>$businessDetails];
    }

    public function delete_business(Request $request, $id){
        // dd($request);
        $user = Business::where('id', $id)->delete();
        return ['status' => true, 'message' => 'Business Deleted Successfully', 'data'=> $user];
    }

    public function business_payment_plan(Request $request){
        if ($request->isMethod('get')){
            $data = Business::where('id',$request->business_id)->first(['id','payment_plan','date as payment_date']);

            return ['status' => true, 'message' => 'Business Plan','data'=>$data];
        }


        \Stripe\Stripe::setApiKey('sk_test_51LcbQHLce33uAcrH8cq8OVykZkf8lydutRLawXDyhSC16wjUeX0rDDNxuN9ZVnOcHLYwnNlLk7aARj8sDbHFRJ5400lOt3pewq');
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "Payment"
                    ],
                    'unit_amount' => $request->amount*100,
                    ],
                    'quantity' => 1,
                    ]
                ],
            'mode' => 'payment',
            'success_url' => 'https://mcomp/stripe/plan/success?business_id='.$request->business_id.'?payment_plan='.$request->payment_plan.'',
            'cancel_url' => route('stripe.cancel'),
              ]);

            return ['status'=>true,'message' => 'Please complete your payment to renew your subscription','checkout'=>$session['url'] ?? '','business_id'=>$request->business_id];

    }

    public function business_location(Request $request){
        $business = Business::find($request->business_id);
        if($business){
             $business->business_location = $request->business_location;

        $business->save();
        return ['status' => true, 'message' => 'Location Updated Successfully'];

        }
                return ['status' => false, 'message' => 'Business does not exist'];
    }


    public function user_device_token(Request $request){
        requestValidate($request, [
            "device_token" => "required"

        ]);

        $user = Users::find(auth()->user()->id);

        $user->device_token = $request->device_token;
                $user->device_id = $request->device_id;

        $user->save();

        return ['status' => true, 'message' => 'Token Updated Successfully'];
    }

    public function rate_business(Request $request){
        requestValidate($request, [
            "business_id" => "required",
              "stars" => "required"

        ]);
       $check =  Rating::where(['user_id'=>auth()->user()->id,'business_id'=>$request->business_id])->first();
       if($check){
                   return ['status' => false, 'message' => 'User Already rated this business'];

       }
        Rating::insert([
            'user_id'=>auth()->user()->id,
            'business_id'=>$request->business_id,
            'message'=>$request->message,
            'stars'=>$request->stars
            ]);
        return ['status' => true, 'message' => 'Business Rated Successfully'];
    }

    public function upload_multiple_files(Request $request){
        if($request->file('business_cover')){
            $imageName = rand(9,999).time().'.'.$request->business_cover->extension();
            $request->business_cover->move(public_path('uploads/business'), $imageName);
            Business::where('id',$request->business_id)->update([
                'business_cover' =>$imageName
            ]);

        }
          if($request->file('business_logo')){
            $imageName = rand(9,999).time().'.'.$request->business_logo->extension();
            $request->business_logo->move(public_path('uploads/business'), $imageName);
            Business::where('id',$request->business_id)->update([
                'business_logo' =>$imageName
            ]);

        }


         if($request->file('business_identity_front')){
            $imageName = rand(9,999).time().'.'.$request->business_identity_front->extension();
            $request->business_identity_front->move(public_path('uploads/business'), $imageName);
            Business::where('id',$request->business_id)->update([
                'business_identity_front' =>$imageName
            ]);

        }
         if($request->file('business_identity_back')){
            $imageName = rand(9,999).time().'.'.$request->business_identity_back->extension();
            $request->business_identity_back->move(public_path('uploads/business'), $imageName);
            Business::where('id',$request->business_id)->update([
                'business_identity_back' =>$imageName
            ]);

        }
    $allowedfileExtension=['pdf','jpg','png'];

//     if($request->file('files')){
//     $files = $request->file('files');
//     $errors = [];
//     if(count($files) > 0):
//     foreach ($files as $mediaFiles) {

//                 $name = rand(9,99999).'.'.$mediaFiles->extension();
//                  $mediaFiles->move(public_path('uploads/business'), $name);

//                 //store image file into directory and db
//                 $save = new Image();
//                 $save->image = $name;
//                 $save->business_id = $request->business_id;
//                 $save->save();
//     }
//                    return ['status'=>true,'message'=>'File Uploaded Successfully'];

//      else:
//                      return ['status'=>false,'message'=>'files must be in array'];
// endif;
// }
                   return ['status'=>true,'message'=>'File Uploaded Successfully'];
    }

    // public function multiple_images(Request $request){
    //     return ['status'=>true,'message'=>'Multiple Images List','data'=>Image::where('business_id',$request->business_id)->get()];
    // }

    public function busniess_list(Request $request){
        $user = auth()->user();
        return ['status'=>true,'message'=>'Business List Against User','data'=>Business::with('category')->with('images')->where(['user_id'=>$user->id,'status'=>1])->paginate(10)];
    }

    // Products Section Start

    public function addproduct(Request $request){
        requestValidate($request, [
            "name" => "required",
            "image" => "required",
            "price" => "required",
            "description" => "required",
            "business_id" => "required"
        ]);
        $business = Business::where('id',$request->business_id)->first();
        if($request->file('image')){
            $imageName = rand(9,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/business/products'), $imageName);
        }
        $product = $business->products()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        $product->save();
        return ['status' => true, 'message' => 'Product added Successfully', 'data'=> $product];
    }

    public function editproduct(Request $request){

        $product = Product::find($request->product_id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if($request->file('image')){
            $imageName = rand(9,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/business/products'), $imageName);
            $product->image = $imageName;
        };
        $product->save();
        return ['status' => true, 'message' => 'Product updated Successfully', 'data'=> $product];
    }

    public function delete_product(Request $request, $id){
        // dd($request);
        $product = Product::where('id', $id)->delete();
        return ['status' => true, 'message' => 'Product Deleted Successfully', 'data'=> $product];
    }

    public function productdetail(Request $request, $id){
        // dd($request);
        $product = Product::find($id);
        return ['status' => true, 'message' => 'success', 'data'=> $product];
    }

    public function businessAllProduct($id){
        $product = Product::where('business_id', $id)->first();
        return ['status' => true, 'message' => 'list of produts', 'data'=> $product];
    }
}
