<?php

namespace App\Http\Controllers\newControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;

// use App\Models\NewModels\Head_Images;

class ImagesController extends Controller
{
    //
    public function head_img_form(){
        return view('adminNew.pages.imgsModule.headerImgs');
    }
    public function head_img_submit(Request $req,$id){
        // $imageUpdateId = $id;
        // if(isset($id) && !empty($id)){
        //     Head_Images::whereId($id)->update([
        //         'name'=>$req->name,
        //         'email'=>$req->email,
        //         'phone'=>$req->phone,
        //         'address'=>$req->address,
        //     ]);
        // }else{
        //     //Create
        //     $obj = Head_Images::create();
        //     $imageUpdateId = $obj->id;
        // }
        // if($req->file()){
        //     $imageName = time().'.'.$req->image->extension();
        //     $req->image->move(public_path('uploads/user'), $imageName);
        //     Head_Images::whereId($imageUpdateId)->update([
        //         'image'=>$imageName
        //     ]);
        //   }
        // return redirect(route('user.list.new'));
    }
}
