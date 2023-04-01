<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorys;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = categorys::all();
        // dd($categories);

        return view('admin.category.indexCategory', ['categories' => $categories]);
    }

    public function CreateCategory()
    {
        return view('admin.category.createCategory');
    }

    public function StoreCategory(Request $request)
    {
        // dd($request->all());
        // write logic for save to database
        // insert info
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = new categorys();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.indexCategory');
    }

    public function EditCategory($id)
    {
        // dd("edit", $id);

        $category = categorys::findOrFail($id);
        // dd($category);
        return view('admin.category.editCategory', ['category' => $category]);
    }

    public function SubmitEditCategory(Request $request, $id)
    {
        // dd($request, $id);
        $category = categorys::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.indexCategory');

    }

    public function DeleteCategory(Request $request, $id)
    {
        $category = categorys::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.indexCategory');

    }
}
