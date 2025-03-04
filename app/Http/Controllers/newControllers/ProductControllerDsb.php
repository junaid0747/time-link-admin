<?php

namespace App\Http\Controllers\newControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductControllerDsb extends Controller
{
    //
    function index(){
        $obj = Product::where('id','!=', null)->with('business_list')->get();
        // dd($obj);
        return view('adminNew.pages.products.index',compact('obj'));
    }
    public function products_detail(Request $req){
        $obj = Product::whereId($req->id)->first();
        echo view('adminNew.pages.products.detail',compact('obj'));
    }
}
