<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'varnanipe' => 'required',
            'desc' => 'required',
            'pics' => 'required|image|mimes:jpeg,png,jpg,|max:1024',
        ]);

        $category = Category::create($request->all());

        //add pics
        $img_request = $request->hasFile('pics');
        $image = $request->file('pics');
        $folder = 'category';
        $pics = $this->imageCreate($img_request, $image, $folder);
        $category->pics = $pics;

        $category->save();

        return redirect(route('category.index'))->withToastSuccess('Category Created Successfully!');
    }

    public function show(Category $category)
    {

        return view('categories.show', compact('category'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'varnanipe' => 'required',
            'desc' => 'required',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $category = Category::findOrFail($id);
        $folder = 'category';
        $image_request = $request->hasFile('pics');

        if(Request()->hasFile('pics')){
            $image = Request()->file('pics');
            Storage::delete('public/'. $folder .'/'.$category->pics);
            $pics = $this->imageUpdate($image_request, $image, $folder);
            $category->pics = $pics;

            $category->update();
        }else
        $category->update($request->all());

        return redirect(route('category.index'))->withToastSuccess('Category Updated Successfully!');
    }

    public function destroy(Category $category)
    {
        //delete history
        $category->delete();

        //
        Storage::delete('public/category/'.$category->pics);

        return redirect(route('category.index'))->withToastSuccess('Category Deleted Successfully!');
    }
}
