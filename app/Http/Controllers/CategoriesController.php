<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }
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
        //validate save category
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'varnanipe' => 'required',
            'desc' => 'required',
            'pics' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();

        $category->name = htmlspecialchars($request->name);
        $category->varnanipe = htmlspecialchars($request->varnanipe);
        $category->desc = htmlspecialchars($request->desc);

        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'categories';
        $pics = $this->createImage($img_request, $img, $folder);
        $category->pics = $pics;

        $category->save();


        return redirect(route('category.index'))->withToastSuccess('Category Created Successfully!');
    }

    public function show(Category $category)
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }
        //SEO
        $this->setSeo( $category->name, $category->desc);

        return view('categories.show', compact('category'));
    }

    public function edit()
    {
        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //validate update category
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'varnanipe' => 'required',
            'desc' => 'required',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = Category::findOrFail($id);

        $category->name = htmlspecialchars($request->name);
        $category->varnanipe = htmlspecialchars($request->varnanipe);
        $category->desc = htmlspecialchars($request->desc);

        //add pics
        if($request->hasFile('pics')){
            if ($category->pics != 'default.svg')
            {
                Storage::delete('/public/categories/'.$category->pics);
            }
            $folder = 'categories';
            $image_request = $request->hasFile('pics');
            $img = Request()->file('pics');
            $pics = $this->updateImage($image_request, $img, $folder);
            $category->pics = $pics;
            $category->update();
        }

        $category->update();


        return redirect(route('category.index'))->withToastSuccess('Category Updated Successfully!');
    }

    public function destroy(Category $category)
    {
        //delete category
        $category->delete();
        //
        Storage::delete('/public/categories/'.$category->pics);

        return redirect(route('category.index'))->withToastSuccess('Category Deleted Successfully!');
    }
}
