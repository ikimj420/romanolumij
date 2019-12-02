<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
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
        //explode tags by ,
        $tags = explode(',', $request->album_tag);
        $album = Album::create($this->validateRequest());
        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'albums';
        $pics = $this->createImage($img_request, $img, $folder);
        $album->pics = $pics;
        $album->user_id = Auth::id();
        //add tags
        $album->tag($tags);
        $album->save();

        return redirect(route('album.index'))->withToastSuccess('Album Created Successfully!');
    }

    public function show(Album $album)
    {
        $categories = Category::get();

        return view('albums.show', compact('album', 'categories'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        //explode tags by ,
        $tags = explode(',', $request->album_tag);

        $album->update($this->validateRequest());

        $folder = 'albums';
        $image_request = $request->hasFile('pics');
        $img = Request()->file('pics');
        if(Request()->hasFile('pics')){

            Storage::delete('public/'. $folder .'/'.$album->pics);

            $pics = $this->updateImage($image_request, $img, $folder);
            $album->pics = $pics;
            $album->update();
        }
        //retag
        $album->retag($tags);


        return redirect(route('album.index'))->withToastSuccess('Album Updated Successfully!');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $images = Image::where('album_id', '=', $id)->get();
        //delete history
        $album->delete();

        //

        Storage::delete('public/albums/'.$album->pics);
        // Delete Images when del albums in app and db
        foreach ($images as $image){
            Storage::delete('public/photos/'.$image->pics);
            $image->delete();
        }

        return redirect(route('album.index'))->withToastSuccess('Album Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'desc' => 'required',

            'user_id' => 'sometimes',
            'category_id' => 'sometimes',
            'tags' => 'sometimes',
            //'pics' => 'sometimes|image|mimes:jpeg,png,jpg,|max:1024',
        ]);
    }
}
