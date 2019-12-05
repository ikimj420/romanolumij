<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //SEO
        $this->setSeo(__('app.category'), 'Categories Page Latest Categories With Images And Description');

        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $category = Category::create($this->validateRequest());

        $img_request = $request->hasFile('pics');
        $image = $request->file('pics');
        $folder = 'categories';
        //add pics
        $pics = $this->createImage($img_request, $image, $folder);
        $category->pics = $pics;

        $category->save();

        return redirect(route('category.index'))->withToastSuccess('Category Created Successfully!');
    }

    public function show(Category $category)
    {
        //SEO
        $this->setSeo( $category->name, $category->desc);

        return view('categories.show', compact('category'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        //update
        $category->update($this->validateRequest());

        //save picture
        $folder = 'categories';
        $img_request = $request->hasFile('pics');
        $img = Request()->file('pics');
        //check for picture
        if($img_request){
            // Delete Images
            Storage::delete('public/'. $folder .'/'.$category->pics);
            $picture = $this->updateImage($img_request, $img, $folder);
            $category->pics = $picture;
            $category->update();
        }

        return redirect(route('category.index'))->withToastSuccess('Category Updated Successfully!');
    }

    public function destroy(Category $category)
    {
        //delete history
        $category->delete();
        //
        Storage::delete('public/categories/'.$category->pics);

        return redirect(route('category.index'))->withToastSuccess('Category Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'varnanipe' => 'required',
            'desc' => 'required',
            //'pics' => 'sometimes|image|mimes:jpeg,png,jpg,|max:1024',
        ]);
    }
}
