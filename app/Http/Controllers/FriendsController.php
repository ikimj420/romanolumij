<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $friends = Friend::latest()->get();
        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'alav' => 'required',
            'title' => 'required',
            'url' => 'required',
            'pics' => 'required|image|mimes:jpeg,png,jpg,|max:512',
        ]);

        $friend = Friend::create($request->all());

        //add pics
        $img_request = $request->hasFile('pics');
        $image = $request->file('pics');
        $folder = 'friends';
        $pics = $this->imageCreate($img_request, $image, $folder);
        $friend->pics = $pics;

        $friend->save();

        return redirect(route('friend.index'))->withToastSuccess('Friend Created Successfully!');
    }

    public function show(Friend $friend)
    {

        return view('friends.show', compact('friend'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alav' => 'required',
            'title' => 'required',
            'url' => 'required',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $friend = Friend::findOrFail($id);
        $folder = 'friends';
        $image_request = $request->hasFile('pics');

        if(Request()->hasFile('pics')){
            $image = Request()->file('pics');
            Storage::delete('public/'. $folder .'/'.$friend->pics);
            $pics = $this->imageUpdate($image_request, $image, $folder);
            $friend->pics = $pics;

            $friend->update();
        }else
        $friend->update($request->all());

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
}
