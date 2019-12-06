<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'showByCategory');
    }

    public function index()
    {
        //SEO
        $this->setSeo(__('app.story'), 'Stories Page Latest Stories From Rom Author');

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
        //validate save story
        $validator = Validator::make($request->all(), [
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
            'tag' => 'sometimes',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $story = new Story();

        $story->alav = htmlspecialchars($request->alav);
        $story->title = htmlspecialchars($request->title);
        $story->autori = htmlspecialchars($request->autori);
        $story->author = htmlspecialchars($request->author);

        $story->paramica = $request->paramica;
        $story->story = $request->story;
        $story->varnanipe = $request->varnanipe;
        $story->description = $request->description;

        $story->user_id = Auth::id();
        $story->category_id = $request->category_id;

        $tagD = htmlspecialchars($request->story_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'stories';
        $pics = $this->createImage($img_request, $img, $folder);
        $story->pics = $pics;

        $story->save();

        //add tags
        $story->tag($tags);

        $story->update();


        return redirect(route('story.index'))->withToastSuccess('Story Created Successfully!');
    }

    public function show(Story $story)
    {
        //SEO
        $this->setSeo( $story->title, $story->description);

        $categories = Category::get();

        return view('stories.show', compact('story', 'categories'));
    }

    public function showByCategory($story)
    {
        //SEO
        $this->setSeo(__('app.story'), 'Stories Page Latest Stories From Rom Author Show By Category');

        $stories = Story::with('category')->where('category_id', '=', $story)->paginate(12);

        return view('stories.showByCategory', compact('stories'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        //validate save story
        $validator = Validator::make($request->all(), [
            'alav' => 'required',
            'autori' => 'required',
            'paramica' => 'required',
            'varnanipe' => 'required',

            'title' => 'sometimes',
            'author' => 'sometimes',
            'story' => 'sometimes',
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

        $story = Story::findOrFail($id);

        $story->alav = htmlspecialchars($request->alav);
        $story->title = htmlspecialchars($request->title);
        $story->autori = htmlspecialchars($request->autori);
        $story->author = htmlspecialchars($request->author);

        $story->paramica = $request->paramica;
        $story->story = $request->story;
        $story->varnanipe = $request->varnanipe;
        $story->description = $request->description;

        $story->category_id = $request->category_id;

        $tagD = htmlspecialchars($request->story_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        if($request->hasFile('pics')){
            if ($story->pics != 'default.svg')
            {
                Storage::delete('/public/stories/'.$story->pics);
            }
            $folder = 'stories';
            $image_request = $request->hasFile('pics');
            $img = Request()->file('pics');
            $pics = $this->updateImage($image_request, $img, $folder);
            $story->pics = $pics;
            $story->update();
        }

        //retag
        $story->retag($tags);

        $story->update();

        return redirect(route('story.index'))->withToastSuccess('Story Updated Successfully!');
    }

    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        //delete story
        $story->delete();

        //
        if ($story->pics != 'default.svg'){
            Storage::delete('/public/stories/'.$story->pics);
        }

        return redirect(route('story.index'))->withToastSuccess('Story Deleted Successfully!');
    }
}
