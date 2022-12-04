<?php

namespace App\Http\Controllers;

use App\Models\About_Us;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $about=About_Us::all();
        $category=Category::orderBy('id','desc')->paginate(3);
        $product=Product::orderBy('id','desc')->paginate(6);
        return view('website.index',compact('about','category','product'));
    }
    public function about_us(){
        $about=About_Us::all();
        return view('website.About_Us.about_us',compact('about'));
    }
}
