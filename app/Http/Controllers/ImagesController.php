<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except( 'show');
    }

    public function index()
    {
        return back();
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request, $id)
    {

        $image = Image::create($this->validateRequest());
        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'photos';
        $pics = $this->createImage($img_request, $img, $folder);
        $image->pics = $pics;
        $image->album_id = $id;
        $image->user_id = Auth::id();

        $image->save();

        return back()->withToastSuccess('Image Created Successfully!');
    }

    public function show(Image $image)
    {
        //SEO
        $this->setSeo( $image->name, $image->desc);

        return view('images.show', compact('image'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $image->update($this->validateRequest());

        $folder = 'photos';
        $image_request = $request->hasFile('pics');
        $img = Request()->file('pics');
        if(Request()->hasFile('pics')){

            Storage::delete('public/'. $folder .'/'.$image->pics);

            $pics = $this->updateImage($image_request, $img, $folder);
            $image->pics = $pics;
            $image->update();
        }


        return back()->withToastSuccess('Image Updated Successfully!');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        //delete history
        $image->delete();

        Storage::delete('public/photos/'.$image->pics);

        return redirect(route('album.index'))->withToastSuccess('Image Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'desc' => 'required',

            'user_id' => 'sometimes',
            'category_id' => 'sometimes',
            //'pics' => 'sometimes|image|mimes:jpeg,png,jpg,|max:1024',
        ]);
    }
}
