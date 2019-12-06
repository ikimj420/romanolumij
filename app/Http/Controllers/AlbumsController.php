<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AlbumsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'showByCategory');
    }

    public function index()
    {
        //SEO
        $this->setSeo(__('app.album'), 'Albums Page Latest Albums With Images From Rom Author');

        $albums = Album::latest()->paginate(36);
        $categories = Category::get();

        return view('albums.index', compact('albums', 'categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save album
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',

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

        $album = new Album;

        $album->name = htmlspecialchars($request->name);
        $album->desc = $request->desc;
        $album->user_id = Auth::id();
        $album->category_id = $request->category_id;

        $tagD = htmlspecialchars($request->album_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'albums';
        $pics = $this->createImage($img_request, $img, $folder);
        $album->pics = $pics;

        $album->save();

        //add tags
        $album->tag($tags);

        $album->update();

        return redirect(route('album.index'))->withToastSuccess('Album Created Successfully!');
    }

    public function show(Album $album)
    {
        //SEO
        $this->setSeo( $album->name, $album->desc);

        $categories = Category::get();

        return view('albums.show', compact('album', 'categories'));
    }

    public function showByCategory($album)
    {
        //SEO
        $this->setSeo(__('app.album'), 'Albums Page Latest Albums With Images From Rom Author Show By Category');

        $albums = Album::with('category')->where('category_id', '=', $album)->paginate(12);

        return view('albums.showByCategory', compact('albums'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        //validate save album
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',

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

        $album = Album::findOrFail($id);

        $album->name = htmlspecialchars($request->name);
        $album->desc = $request->desc;
        $album->category_id = $request->category_id;

        $tagD = htmlspecialchars($request->album_tag);
        //explode tags by ,
        $tags = explode(',', $tagD);

        //add pics
        if($request->hasFile('pics')){
            if ($album->pics != 'default.svg')
            {
                Storage::delete('/public/albums/'.$album->pics);
            }
            $folder = 'albums';
            $image_request = $request->hasFile('pics');
            $img = Request()->file('pics');
            $pics = $this->updateImage($image_request, $img, $folder);
            $album->pics = $pics;
            $album->update();
        }

        //retag
        $album->retag($tags);

        $album->update();

        return redirect(route('album.index'))->withToastSuccess('Album Updated Successfully!');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $images = Image::where('album_id', '=', $id)->get();
        //delete history
        $album->delete();

        //
        Storage::delete('/public/albums/'.$album->pics);
        // Delete Images when del albums in app and db
        foreach ($images as $image){
            Storage::delete('/public/photos/'.$image->pics);
            $image->delete();
        }

        return redirect(route('album.index'))->withToastSuccess('Album Deleted Successfully!');
    }
}
