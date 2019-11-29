<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $stories = Story::latest()->paginate(36);
        $categories = Category::get();

        return view('stories.index', compact('stories', 'categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //explode tags by ,
        $tags = explode(',', $request->story_tag);
        $story = Story::create($this->validateRequest());
        //add pics
        $img_request = $request->hasFile('pics');
        $image = $request->file('pics');
        $folder = 'stories';
        $pics = $this->createImage($img_request, $image, $folder);
        $story->pics = $pics;
        $story->user_id = Auth::id();
        //add tags
        $story->tag($tags);
        $story->save();

        return redirect(route('story.index'))->withToastSuccess('Story Created Successfully!');
    }

    public function show(Story $story)
    {
        $categories = Category::get();

        return view('stories.show', compact('story', 'categories'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);
        //explode tags by ,
        $tags = explode(',', $request->story_tag);

        $story->update($this->validateRequest());

        $folder = 'stories';
        $image_request = $request->hasFile('pics');
        $image = Request()->file('pics');
        if(Request()->hasFile('pics')){

            Storage::delete('public/'. $folder .'/'.$story->pics);

            $pics = $this->updateImage($image_request, $image, $folder);
            $story->pics = $pics;
            $story->update();
        }
        //retag
        $story->retag($tags);


        return redirect(route('story.index'))->withToastSuccess('Story Updated Successfully!');
    }

    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        //delete history
        $story->delete();

        //
        if ($story->pics != 'default.svg'){
            Storage::delete('public/stories/'.$story->pics);
        }

        return redirect(route('story.index'))->withToastSuccess('Story Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'alav' => 'required',
            'autori' => 'required',
            'paramica' => 'required',
            'varnanipe' => 'required',

            'title' => 'sometimes',
            'author' => 'sometimes',
            'story' => 'sometimes',
            'description' => 'sometimes',
            'user_id' => 'sometimes',
            'category_id' => 'sometimes',
            'tags' => 'sometimes',
            //'pics' => 'sometimes|image|mimes:jpeg,png,jpg,|max:1024',
        ]);
    }
}
