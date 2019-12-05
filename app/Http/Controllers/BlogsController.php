<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        //explode tags by ,
        $tags = explode(',', $request->blog_tag);
        $blog = Blog::create($this->validateRequest());
        //add pics
        $img_request = $request->hasFile('pics');
        $image = $request->file('pics');
        $folder = 'blogs';
        $pics = $this->createImage($img_request, $image, $folder);
        $blog->pics = $pics;
        $blog->user_id = Auth::id();
        //add tags
        $blog->tag($tags);
        $blog->save();

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
        $blog = Blog::findOrFail($id);
        //explode tags by ,
        $tags = explode(',', $request->blog_tag);

        $blog->update($this->validateRequest());

        $folder = 'blogs';
        $image_request = $request->hasFile('pics');
        $image = Request()->file('pics');
        if(Request()->hasFile('pics')){

            Storage::delete('public/'. $folder .'/'.$blog->pics);

            $pics = $this->updateImage($image_request, $image, $folder);
            $blog->pics = $pics;
            $blog->update();
        }
        //retag
        $blog->retag($tags);


        return redirect(route('blog.index'))->withToastSuccess('Blog Updated Successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        //delete history
        $blog->delete();

        //
        if ($blog->pics != 'default.svg'){
            Storage::delete('public/blogs/'.$blog->pics);
        }

        return redirect(route('blog.index'))->withToastSuccess('Blog Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required',

            'user_id' => 'sometimes',
            'tags' => 'sometimes',
            //'pics' => 'sometimes|image|mimes:jpeg,png,jpg,|max:1024',
        ]);
    }
}
