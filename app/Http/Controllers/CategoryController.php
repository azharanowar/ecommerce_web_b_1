<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return view('backEnd.category.category', [
            'categories'    =>  Category::all()
        ]);
    }

    public function addCategory(Request $request) {
        Category::saveCategory($request);

        return back()->with('message', 'Category successfully created.');
    }

    public function changeStatus($id) {
        Category::changeCategoryStatus($id);

        return back()->with('allCategoriesMessage', 'Category status successfully updated.');
    }

    public function deleteCategory(Request $request) {
        Category::deleteCategory($request);

        return back()->with('allCategoriesMessage', 'Category successfully deleted.');
    }

    public function editCategory($id) {
        return view('backEnd.category.edit-category', [
            'category'  =>  Category::find($id)
        ]);
    }

    public function updateCategory(Request $request) {
        Category::saveCategory($request);

        return view('backEnd.category.category', [
            'categories'    =>  Category::all()
        ])->with('allCategoriesMessage', 'Category successfully updated.');
    }
}
