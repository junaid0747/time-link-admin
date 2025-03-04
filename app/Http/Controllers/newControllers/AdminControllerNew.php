<?php

namespace App\Http\Controllers\newControllers;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use App\Models\User;
use App\Models\Users;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class AdminControllerNew extends Controller
{
    //
    function index()
    {
        $obj = Users::where('id', auth()->user()->id)->get();
        $image = GeneralSettings::first();
        // dd($obj);
        return view('adminNew.pages.newDashboard.dashboardNew', compact('obj', 'image'));
    }
    public function user_list()
    {


        $obj = Users::where('id', '!=', auth()->user()->id)->where('role', '!=', 'admin')->get();
        // $obj = Users::get();
        // dd($obj);
        return view('adminNew.pages.user.index', compact('obj'));
    }
    public function user_create($id)
    {
        $obj = array();
        if (isset($id) && !empty($id)) {
            $obj = Users::whereId($id)->first();
        }
        return view('adminNew.pages.user.form', compact('obj'));
    }
    public function user_detail(Request $req)
    {
        $obj = Users::whereId($req->id)->first();
        echo view('adminNew.pages.user.detail', compact('obj'));
    }
    public function user_destroy(Request $req)
    {
        Users::whereId($req->id)->delete();
        echo 1;
    }
    public function user_submit(Request $req, $id)
    {
        $imageUpdateId = $id;
        if (isset($id) && !empty($id)) {
            Users::whereId($id)->update([
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'address' => $req->address,
            ]);
        } else {
            //Create
            $obj = Users::create([
                'name' => $req->name,
                'email' => $req->email,
                'role' => 'user',
                'phone' => $req->phone,
                'address' => $req->address,
                'password' => Hash::make($req->password),
            ]);
            $imageUpdateId = $obj->id;
        }
        if ($req->file()) {
            $imageName = time() . rand(9, 999) . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/user'), $imageName);
            Users::whereId($imageUpdateId)->update([
                'image' => $imageName
            ]);
        }
        return redirect(route('user.list.new'));
    }

    public function user_full_details($user_id = null, $id = null)
    {
        $data = Users::whereId($user_id)->with('orders')->first();
        $countPendingOrders = count($data->orders->where('status', 'pending'));
        $countSuccessOrders = count($data->orders->where('status', 'success'));
        // $userRelation = Users::whereId($user_id)->with('orders')->first();
        // dd($countOrders);
        echo view('adminNew.pages.user.full_detail', get_defined_vars());
    }

    public function edit_image(Request $request)
    {
        // dd($request->image);

        // $id = Auth()->user()->id;
        $id = $request->user_id;
        if ($id) {
            if ($request->file('image')) {
                $imageName = time() . rand(9, 999) . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/user'), $imageName);
                Users::whereId($id)->update([
                    'image' => $imageName,
                ]);
                return response()->json([
                    'status' => 200,
                    'image' => $request->file(),
                ]);
            } else {
                return response()->json([
                    "status" => 404,
                    'message' => 'Image not upload',
                ]);
            }
        }
    }

    //
}
