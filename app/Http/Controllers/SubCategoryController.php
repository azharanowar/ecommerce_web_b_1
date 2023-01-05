<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.sub-category',[
            'categories'    =>Category::all(),
            'subCategories' => DB::table('sub_categories')
                ->join('categories','sub_categories.category_id','categories.id')
                ->select('sub_categories.*','categories.category_name')
                ->get(),
        ]);
    }

    public function saveSubCategory(Request $request){
        SubCategory::saveSubCategory($request);
        if ($request->cat_id){
            return redirect(route('sub-category'))->with('message','Info Update successfully');
        }else{
            return redirect(route('sub-category'))->with('message','Info save successfully');
        }

    }
    public function status($id){
        SubCategory::status($id);
        return back()->with('message','status Info update successfully');
    }
    public function subCategoryDelete(Request $request){
        SubCategory::categoryDelete($request);
        return back()->with('message','Info Delete successfully');
    }

    public function subCategoryEdit($id)
    {
       return view('admin.category.edit-sub-category', [
           'sub_category'   => SubCategory::find($id),
           'categories'     => Category::all(),
       ]);
    }

    public function subCategoryUpdate(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category')->with('message', 'Subcategory info updated.');
    }
}
