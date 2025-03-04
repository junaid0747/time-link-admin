<?php

namespace App\Http\Controllers\newControllers;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralSettingsController extends Controller
{
    //
    public function general_settings_form()
    {
        $obj = GeneralSettings::first();
        return view('adminNew.pages.general_settings.general_settings', compact( 'obj'));
    }
    public function submit(Request $req, $id)
    {
        if ($req->file('appLogo')) {
            $imageName = time() . rand(9 , 999) . '.' . $req->appLogo->extension();
            $req->appLogo->move(public_path('uploads/logos'), $imageName);
            if (isset($id) && !empty($id)) {
                GeneralSettings::whereId($id)->update([
                    'home_logo' => $imageName,
                ]);
            }
            else{
                GeneralSettings::create([
                    'home_logo' => $imageName,
                ]);
            }
        }
        if($req->file('dashboardLogo')){
            $imageName = time() . rand(9 , 999) . '.' . $req->dashboardLogo->extension();
            $req->dashboardLogo->move(public_path('uploads/logos'), $imageName);
            if (isset($id) && !empty($id)) {
                GeneralSettings::whereId($id)->update([
                    'dashboard_logo' => $imageName
                ]);
            }
            else{
                GeneralSettings::create([
                    'dashboard_logo' => $imageName
                ]);
            }
        }
        return redirect(route('general.setings'));
    }
}
