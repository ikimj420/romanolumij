<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        //validate save image
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',

            'user_id' => 'sometimes',
            'album_id' => 'sometimes',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = new Image;

        $image->name = htmlspecialchars($request->name);
        $image->desc = htmlspecialchars($request->desc);
        $image->user_id = Auth::id();
        $image->album_id = $id;

        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'photos';
        $pics = $this->createImage($img_request, $img, $folder);
        $image->pics = $pics;

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
        //validate save image
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',

            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = Image::findOrFail($id);

        $image->name = htmlspecialchars($request->name);
        $image->desc = htmlspecialchars($request->desc);

        //add pics
        if($request->hasFile('pics')){
            if ($image->pics != 'default.svg')
            {
                Storage::delete('/public/photos/'.$image->pics);
            }
            $folder = 'photos';
            $image_request = $request->hasFile('pics');
            $img = Request()->file('pics');
            $pics = $this->updateImage($image_request, $img, $folder);
            $image->pics = $pics;
            $image->update();
        }

        $image->update();

        return back()->withToastSuccess('Image Updated Successfully!');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        //delete image
        $image->delete();

        Storage::delete('/public/photos/'.$image->pics);

        return redirect(route('album.index'))->withToastSuccess('Image Deleted Successfully!');
    }
}
