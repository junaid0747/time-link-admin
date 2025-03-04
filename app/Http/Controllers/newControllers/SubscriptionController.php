<?php

namespace App\Http\Controllers\newControllers;

use App\Http\Controllers\Controller;
use App\Models\Subscriptions;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    function index(){
        $obj = Subscriptions::where('id','!=', null)->get();
        // dd($obj);
        return view('adminNew.pages.subscriptions.index',compact('obj'));
    }

    public function subscription_create($id){
        $obj = array();
        if(isset($id) && !empty($id)){
            $obj = Subscriptions::whereId($id)->first();
        }
        return view('adminNew.pages.subscriptions.form',compact('obj'));
    }

    public function subscription_detail(Request $req){
        $obj = Subscriptions::whereId($req->id)->first();
        echo view('adminNew.pages.subscriptions.detail',compact('obj'));
    }

    public function subscription_destroy(Request $req){
        Subscriptions::whereId($req->id)->delete();
        echo 1;
    }
    public function subscription_submit(Request $req,$id){
        if(isset($id) && !empty($id)){
            Subscriptions::whereId($id)->update([
                'subscription_type'=>$req->subscription_type,
                'price'=>$req->price,
                'start_date'=>$req->start_date,
                'end_date'=>$req->end_date,
            ]);
        }else{
            //Create
            Subscriptions::create([
                'subscription_type'=>$req->subscription_type,
                'price'=>$req->price,
                'start_date'=>$req->start_date,
                'end_date'=>$req->end_date,
            ]);
        }
        return redirect(route('subscription.listing'));

    }
}
