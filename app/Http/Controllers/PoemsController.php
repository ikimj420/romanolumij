<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Poem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PoemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'showByCategory');
    }

    public function index()
    {
        //SEO
        $this->setSeo( __('app.poem'), 'Poems Page Latest Poems From Rom Author Language Rom Serbian English');

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
        //validate save poem
        $validator = Validator::make($request->all(), [
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
            'tag' => 'sometimes',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $poem = new Poem();

        $poem->alav = htmlspecialchars($request->alav);
        $poem->title = htmlspecialchars($request->title);
        $poem->autori = htmlspecialchars($request->autori);
        $poem->author = htmlspecialchars($request->author);

        $poem->djili = $request->djili;
        $poem->poem = $request->poem;
        $poem->varnanipe = $request->varnanipe;
        $poem->description = $request->description;

        $poem->user_id = Auth::id();
        $poem->category_id = $request->category_id;

        $tagD = htmlspecialchars($request->poem_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'poems';
        $pics = $this->createImage($img_request, $img, $folder);
        $poem->pics = $pics;

        $poem->save();

        //add tags
        $poem->tag($tags);

        $poem->update();

        return redirect(route('poem.index'))->withToastSuccess('Poem Created Successfully!');
    }

    public function show(Poem $poem)
    {
        //SEO
        $this->setSeo( $poem->title, $poem->description);

        $categories = Category::get();

        return view('poems.show', compact('poem', 'categories'));
    }

    public function showByCategory($poem)
    {
        //SEO
        $this->setSeo(__('app.poem'), 'Poems Page Latest Poems From Rom Author Show By Category');

        $poems = Poem::with('category')->where('category_id', '=', $poem)->paginate(12);

        return view('poems.showByCategory', compact('poems'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        //validate save poem
        $validator = Validator::make($request->all(), [
            'alav' => 'required',
            'autori' => 'required',
            'djili' => 'required',
            'varnanipe' => 'required',

            'title' => 'sometimes',
            'author' => 'sometimes',
            'poem' => 'sometimes',
            'description' => 'sometimes',
            'category_id' => 'sometimes',
            'tag' => 'sometimes',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $poem = Poem::findOrFail($id);

        $poem->alav = htmlspecialchars($request->alav);
        $poem->title = htmlspecialchars($request->title);
        $poem->autori = htmlspecialchars($request->autori);
        $poem->author = htmlspecialchars($request->author);

        $poem->djili = $request->djili;
        $poem->poem = $request->poem;
        $poem->varnanipe = $request->varnanipe;
        $poem->description = $request->description;

        $poem->category_id = $request->category_id;

        $tagD = htmlspecialchars($request->poem_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        if($request->hasFile('pics')){
            if ($poem->pics != 'default.svg')
            {
                Storage::delete('/public/poems/'.$poem->pics);
            }
            $folder = 'poems';
            $image_request = $request->hasFile('pics');
            $img = Request()->file('pics');
            $pics = $this->updateImage($image_request, $img, $folder);
            $poem->pics = $pics;
            $poem->update();
        }

        //retag
        $poem->retag($tags);

        $poem->update();

        return redirect(route('poem.index'))->withToastSuccess('Poem Updated Successfully!');
    }

    public function destroy($id)
    {
        $poem = Poem::findOrFail($id);
        //delete poem
        $poem->delete();

        //
        if ($poem->pics != 'default.svg'){
            Storage::delete('/public/poems/'.$poem->pics);
        }

        return redirect(route('poem.index'))->withToastSuccess('Poem Deleted Successfully!');
    }
}
