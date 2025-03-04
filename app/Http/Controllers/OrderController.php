<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    //
    function index()
    {
        $obj = Orders::where('id', '!=', null)->with('users_list')->get();
        // dd($obj);
        return view('adminNew.pages.orders.index', compact('obj'));
    }
    public function orders_detail(Request $req)
    {
        $obj = Orders::whereId($req->id)->first();
        echo view('adminNew.pages.orders.detail', compact('obj'));
    }

    public function orders_create($id)
    {
        // dd($id);
        $obj = array();
        if (isset($id) && !empty($id)) {
            $obj = Orders::whereId($id)->first();
        }
        // if (isset($id) && !empty($id)) {
        //     $obj = Business::whereId($id)->first();
        // }


        return view('adminNew.pages.orders.form', compact('obj'));
    }

    public function orders_submit(Request $req, $id)
    {
        $imageUpdateId = $id;
        if (isset($id) && !empty($id)) {
            Orders::whereId($id)->update([
                'user_id' => $req->user_id,
                'reference_id' => $req->reference_id,
                'status' => $req->status,
                'created_at' => $req->created_at,
                'delivered_date' => $req->delivered_date,
                'order_description' => $req->order_description,
            ]);
        } else {
            //Create
            $obj = Orders::create([
                'user_id' => $req->user_id,
                'reference_id' => $req->reference_id,
                'status' => $req->status,
                'created_at' => $req->created_at,
                'delivered_date' => $req->delivered_date,
                'order_description' => $req->order_description,

            ]);
            $imageUpdateId = $obj->id;
        }
        if ($req->file()) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/user'), $imageName);
            Orders::whereId($imageUpdateId)->update([
                'image' => $imageName
            ]);
        }
        return back();
    }
}
