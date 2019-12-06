<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        //SEO
        $this->setSeo(__('app.blog'), 'Blog Page Latest Blog With Comment');

        $blogs = Blog::latest()->paginate(36);

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save blog
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',

            'user_id' => 'sometimes',
            'tag' => 'sometimes',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = new Blog;

        $blog->title = htmlspecialchars($request->title);
        $blog->body = $request->body;
        $blog->user_id = Auth::id();

        $tagD = htmlspecialchars($request->blog_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'blogs';
        $pics = $this->createImage($img_request, $img, $folder);
        $blog->pics = $pics;

        $blog->save();

        //add tags
        $blog->tag($tags);

        $blog->update();

        return redirect(route('blog.index'))->withToastSuccess('Blog Created Successfully!');
    }

    public function show(Blog $blog)
    {
        //SEO
        $this->setSeo( $blog->title, $blog->body);

        return view('blogs.show', compact('blog'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        //validate save blog
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',

            'tag' => 'sometimes',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = Blog::findOrFail($id);

        $blog->title = htmlspecialchars($request->title);
        $blog->body = $request->body;

        $tagD = htmlspecialchars($request->blog_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        if($request->hasFile('pics')){
            if ($blog->pics != 'default.svg')
            {
                Storage::delete('/public/blogs/'.$blog->pics);
            }
            $folder = 'blogs';
            $image_request = $request->hasFile('pics');
            $img = Request()->file('pics');
            $pics = $this->updateImage($image_request, $img, $folder);
            $blog->pics = $pics;
            $blog->update();
        }

        //retag
        $blog->retag($tags);

        $blog->update();

        return redirect(route('blog.index'))->withToastSuccess('Blog Updated Successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        //delete blog
        $blog->delete();

        //
        if ($blog->pics != 'default.svg'){
            Storage::delete('/public/blogs/'.$blog->pics);
        }

        return redirect(route('blog.index'))->withToastSuccess('Blog Deleted Successfully!');
    }
}
