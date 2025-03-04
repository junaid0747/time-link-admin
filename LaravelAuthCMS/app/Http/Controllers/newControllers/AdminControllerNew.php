<?php

namespace App\Http\Controllers\newControllers;

use App\Http\Controllers\Controller;
use App\Models\Users;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminControllerNew extends Controller
{
    //
    function index(){
        return view('adminNew.pages.newDashboard.dashboardNew');
    }
    public function user_list(){


        $obj = Users::where('id','!=',auth()->user()->id)->where('role','!=','admin')->get();
        // $obj = Users::get();
        // dd($obj);
        return view('adminNew.pages.user.index',compact('obj'));
    }
    public function user_create($id){
        $obj = array();
        if(isset($id) && !empty($id)){
            $obj = Users::whereId($id)->first();
        }
        return view('adminNew.pages.user.form',compact('obj'));
    }
    public function user_detail(Request $req){
        $obj = Users::whereId($req->id)->first();
        echo view('adminNew.pages.user.detail',compact('obj'));
    }
    public function user_destroy(Request $req){
        Users::whereId($req->id)->delete();
        echo 1;
    }
    public function user_submit(Request $req,$id){
        $imageUpdateId = $id;
        if(isset($id) && !empty($id)){
            Users::whereId($id)->update([
                'name'=>$req->name,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'address'=>$req->address,
            ]);
        }else{
            //Create
            $obj = Users::create([
                'name'=>$req->name,
                'email'=>$req->email,
                'role'=>'user',
                'phone'=>$req->phone,
                'address'=>$req->address,
                'password'=> Hash::make($req->password),
            ]);
            $imageUpdateId = $obj->id;
        }
        if($req->file()){
            $imageName = time().rand(9-999).'.'.$req->image->extension();
            $req->image->move(public_path('uploads/user'), $imageName);
            Users::whereId($imageUpdateId)->update([
                'image'=>$imageName
            ]);
          }
        return redirect(route('user.list.new'));

    }
}
