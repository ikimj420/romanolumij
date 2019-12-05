<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //SEO
        $this->setSeo(__('app.friend'), 'Friends Page Latest Friends With Images Site Sponsors');

        $friends = Friend::latest()->get();
        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $friend = Friend::create($this->validateRequest());

        $img_request = $request->hasFile('pics');
        $image = $request->file('pics');
        $folder = 'friends';
        //add pics
        $pics = $this->createImage($img_request, $image, $folder);
        $friend->pics = $pics;

        $friend->save();

        return redirect(route('friend.index'))->withToastSuccess('Friend Created Successfully!');
    }

    public function show(Friend $friend)
    {
        //SEO
        $this->setSeo( $friend->title, $friend->url);

        return view('friends.show', compact('friend'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $friend = Friend::findOrFail($id);
        $folder = 'friends';
        $image_request = $request->hasFile('pics');
        $friend->update($this->validateRequest());

        if(Request()->hasFile('pics')){
            $image = Request()->file('pics');
            Storage::delete('public/'. $folder .'/'.$friend->pics);
            $pics = $this->updateImage($image_request, $image, $folder);
            $friend->pics = $pics;

            $friend->update();
        }

        return redirect(route('friend.index'))->withToastSuccess('Friend Updated Successfully!');
    }

    public function destroy(Friend $friend)
    {
        //delete history
        $friend->delete();

        //
        Storage::delete('public/friends/'.$friend->pics);

        return redirect(route('friend.index'))->withToastSuccess('Friend Deleted Successfully!');
    }


    private function validateRequest()
    {
        return request()->validate([
            'alav' => 'required',
            'title' => 'required',
            'url' => 'required',
            //'pics' => 'required|image|mimes:jpeg,png,jpg,|max:512',
        ]);
    }
}
