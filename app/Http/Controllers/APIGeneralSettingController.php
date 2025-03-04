<?php

namespace App\Http\Controllers;
use App\Models\GeneralSettings;

use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class APIGeneralSettingController extends Controller
{
    //
    public function change_logo(Request $req)
    {
        requestValidate($req, [
            "id" => "required|exists:general_settings,id",
        ]);

        if ($req->file('appLogo')) {
            $imageName = time() . rand(9 , 999) . '.' . $req->appLogo->extension();
            $req->appLogo->move(public_path('uploads/logos'), $imageName);
            if (isset($req->id) && !empty($req->id)) {
                GeneralSettings::whereId($req->id)->update([
                    'home_logo' => $imageName,
                ]);
                $imageUrl = GeneralSettings::where('id',$req->id)->first(['home_logo']);
                $res = response()->json([ 'status'=>true,'message'=>"App Logo Updated Successfully",'data'=>$imageUrl],200);
            }
            else{
                $res = response()->json(['message'=>"Business ID is rquired", 'status'=>false],200);

            }
        }
        return $res;
    }
}
