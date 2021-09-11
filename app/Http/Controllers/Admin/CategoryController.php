<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories',
        ]);
        $slug = str_slug($request->name);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
        Toastr::success('Category successfully saved','Success');
        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'unique:categories',
        ]);
        $slug = str_slug($request->name);
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
        Toastr::success('Category successfully Updated','Success');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Category deleted','Success');
        return redirect()->back();
    }
}
