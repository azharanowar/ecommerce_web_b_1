<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
private $prodcut;
    public function index()
    {
        return view('admin.product.index',[
            'categories' => Category::where('status', 1)->get(),
            'sub_categories' => SubCategory::where('status', 1)->get(),
            'brands' => Brand::where('status', 1)->get(),
        ]);
    }
    public function create(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request, $this->product->id);
        return back()->with('message', 'Product info saved successfully..');
    }
    public function manage()
    {
        return view('admin.product.manage');
    }
    public function detail($id)
    {
        return view('admin.product.details');
    }
    public function edit($id)
    {
        return view('admin.product.edit');
    }
    public function update(Request $request, $id)
    {
        return $request->all();
    }
    public function delete($id)
    {
        return $id;
    }

}
