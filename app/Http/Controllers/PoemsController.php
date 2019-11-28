<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Poem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $poems = Poem::latest()->paginate(36);
        $categories = Category::get();

        return view('poems.index', compact('poems', 'categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //explode tags by ,
        $tags = explode(',', $request->poem_tag);
        $poem = Poem::create($this->validateRequest());
        //add pics
        $img_request = $request->hasFile('pics');
        $image = $request->file('pics');
        $folder = 'poems';
        $pics = $this->createImage($img_request, $image, $folder);
        $poem->pics = $pics;
        $poem->user_id = Auth::id();
        //add tags
        $poem->tag($tags);
        $poem->save();

        return redirect(route('poem.index'))->withToastSuccess('Poem Created Successfully!');
    }

    public function show(Poem $poem)
    {
        $categories = Category::get();

        return view('poems.show', compact('poem', 'categories'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $poem = Poem::findOrFail($id);
        //explode tags by ,
        $tags = explode(',', $request->poem_tag);

        $poem->update($this->validateRequest());

        $folder = 'poems';
        $image_request = $request->hasFile('pics');
        $image = Request()->file('pics');
        if(Request()->hasFile('pics')){

            Storage::delete('public/'. $folder .'/'.$poem->pics);

            $pics = $this->updateImage($image_request, $image, $folder);
            $poem->pics = $pics;
            $poem->update();
        }
        //retag
        $poem->retag($tags);


        return redirect(route('poem.index'))->withToastSuccess('Poem Updated Successfully!');
    }

    public function destroy($id)
    {
        $poem = Poem::findOrFail($id);
        //delete history
        $poem->delete();

        //
        if ($poem->pics != 'default.svg'){
            Storage::delete('public/poems/'.$poem->pics);
        }

        return redirect(route('poem.index'))->withToastSuccess('Poem Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'alav' => 'required',
            'autori' => 'required',
            'djili' => 'required',
            'varnanipe' => 'required',

            'title' => 'sometimes',
            'author' => 'sometimes',
            'poem' => 'sometimes',
            'description' => 'sometimes',
            'user_id' => 'sometimes',
            'category_id' => 'sometimes',
            'poem_tag' => 'sometimes',
            //'pics' => 'sometimes|image|mimes:jpeg,png,jpg,|max:1024',
        ]);
    }
}
