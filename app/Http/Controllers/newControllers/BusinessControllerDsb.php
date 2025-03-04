<?php

namespace App\Http\Controllers\newControllers;

use App\Http\Controllers\Controller;
use App\Models\Business;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BusinessControllerDsb extends Controller
{
    //
    function index()
    {
        $obj = Business::where('id', '!=', null)->with('user_list')->orderBy('status', 'DESC')->get();
        // dd($obj);
        return view('adminNew.pages.business.index', compact('obj'));
    }
    public function business_detail(Request $req)
    {
        $obj = Business::whereId($req->id)->first();
        echo view('adminNew.pages.business.detail', compact('obj'));
    }
    public function full_details($business_id = null, $id = null)
    {
        $data = Business::whereId($business_id)->first();
        // dd($data);
        echo view('adminNew.pages.business.full_detail', compact('data'));
    }
}
