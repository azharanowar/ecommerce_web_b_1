<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index',[
            'brands'=>Brand::all(),

        ]);
    }
    public function create(Request $request)
    {
        Brand::newBrand($request);
        return redirect('brand')->with('message','Brand Info successfully..');
    }
}
