<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookChapter;
use App\Models\Category;
use App\Models\Content;
use App\Models\Language;
use App\Models\PushNotification;
use App\Models\Slider;
use App\Models\Users;
use App\Models\Business;
use App\Models\Vacancy;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    // function index(){
    //     return view('admin.pages.dashboard.dashboard');
    // }
    // function ecommerce_dashboard(){
    //     return view('admin.pages.dashboard.ecommerce_dashboard');
    // }
    public function user_list()
    {

        $obj = Users::where('id', '!=', auth()->user()->id)->where('role', '!=', 'user')->get();
        return view('admin.pages.user.index', compact('obj'));
    }
    public function user_create($id)
    {

        $obj = array();
        if (isset($id) && !empty($id)) {
            $obj = Users::whereId($id)->first();
        }
        if (isset($id) && !empty($id)) {
            $obj = Business::whereId($id)->first();
        }


        return view('admin.pages.user.form', compact('obj'));
    }
    public function user_detail(Request $req)
    {
        $obj = Users::whereId($req->id)->first();
        echo view('admin.pages.user.detail', compact('obj'));
    }
    public function user_destroy(Request $req)
    {
        Users::whereId($req->id)->delete();
        echo 1;
    }

    public function user_change_status($user_id = null, $status = null)
    {
        $changeStatus = Users::find($user_id);
        $changeStatus->status = $status;
        $changeStatus->save();

        return back();
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
                'role' => 'admin',
                'phone' => $req->phone,
                'address' => $req->address,
                'password' => Hash::make($req->password),

            ]);
            $imageUpdateId = $obj->id;
        }
        if ($req->file()) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/user'), $imageName);
            Users::whereId($imageUpdateId)->update([
                'image' => $imageName
            ]);
        }
        return redirect(route('user.list'));
    }
    public function category_list()
    {
        $obj = Category::all();
        return view('admin.pages.category.index', compact('obj'));
    }
    public function category_create($id)
    {
        $obj = array();
        if (isset($id) && !empty($id)) {
            $obj = Category::whereId($id)->first();
        }
        return view('admin.pages.category.form', compact('obj'));
    }
    public function category_detail(Request $req)
    {
        $obj = Category::whereId($req->id)->first();
        echo view('admin.pages.category.detail', compact('obj'));
    }
    public function category_destroy(Request $req)
    {
        Category::whereId($req->id)->delete();
        echo 1;
    }
    public function category_submit(Request $req, $id)
    {
        $imageUpdateId = $id;
        if (isset($id) && !empty($id)) {
            Category::whereId($id)->update([
                'name' => $req->name
            ]);
        } else {
            //Create
            $obj = Category::create([
                'name' => $req->name,
            ]);
            $imageUpdateId = $obj->id;
        }
        if ($req->file()) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/categories'), $imageName);
            Category::whereId($imageUpdateId)->update([
                'image' => $imageName
            ]);
        }
        return redirect(route('category.list'));
    }


    //slider
    public function slider_list()
    {
        $obj = Slider::all();
        return view('admin.pages.slider.index', compact('obj'));
    }
    public function slider_create($id)
    {
        $obj = array();
        if (isset($id) && !empty($id)) {
            $obj = Slider::whereId($id)->first();
        }
        return view('admin.pages.slider.form', compact('obj'));
    }
    public function slider_detail(Request $req)
    {
        $obj = Slider::whereId($req->id)->first();
        echo view('admin.pages.slider.detail', compact('obj'));
    }
    public function slider_destroy(Request $req)
    {
        Slider::whereId($req->id)->delete();
        echo 1;
    }
    public function slider_submit(Request $req, $id)
    {
        $imageUpdateId = $id;
        if (isset($id) && !empty($id)) {
            Slider::whereId($id)->update([

                'url' => $req->url,
            ]);
        } else {
            //Create
            $obj = Slider::create([

                'url' => $req->url,
            ]);
            $imageUpdateId = $obj->id;
        }
        if ($req->file()) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/slider'), $imageName);
            Slider::whereId($imageUpdateId)->update([
                'image' => $imageName
            ]);
        }
        return redirect(route('slider.list'));
    }


    //Language
    public function language_list()
    {
        $obj = Language::all();
        return view('admin.pages.language.index', compact('obj'));
    }
    public function language_create($id)
    {
        $obj = array();
        if (isset($id) && !empty($id)) {
            $obj = Language::whereId($id)->first();
        }
        return view('admin.pages.language.form', compact('obj'));
    }
    public function language_detail(Request $req)
    {
        $obj = Language::whereId($req->id)->first();
        return view('admin.pages.language.detail', compact('obj'));
    }
    public function language_destroy(Request $req)
    {
        Language::whereId($req->id)->delete();
        echo 1;
    }
    public function language_submit(Request $req, $id)
    {
        $imageUpdateId = $id;
        if (isset($id) && !empty($id)) {
            Language::whereId($id)->update([
                'name' => $req->name
            ]);
        } else {
            //Create
            $obj = Language::create([
                'name' => $req->name,
            ]);
            $imageUpdateId = $obj->id;
        }

        if ($req->file()) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/language'), $imageName);
            Language::whereId($imageUpdateId)->update([
                'image' => $imageName
            ]);
        }
        return redirect(route('language.list'));
    }


    public function job_list()
    {

        $obj = Vacancy::all();

        return view('admin.pages.job_vacancy.job_list', compact('obj'));
    }
    public function job_detail(Request $req)
    {
        $obj = Vacancy::whereId($req->id)->first();
        echo view('admin.pages.job_vacancy.detail', compact('obj'));
    }

    public function business_list()
    {

        $obj = Business::all();

        return view('admin.pages.business.index', compact('obj'));
    }
    public function business_detail(Request $req)
    {
        $obj = Business::whereId($req->id)->first();
        echo view('admin.pages.business.detail', compact('obj'));
    }
}
