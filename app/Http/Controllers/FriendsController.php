<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }
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
        //validate save friend
        $validator = Validator::make($request->all(), [
            'alav' => 'required',
            'title' => 'required',
            'url' => 'required',
            'pics' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $friend = new Friend();

        $friend->alav = htmlspecialchars($request->alav);
        $friend->title = htmlspecialchars($request->title);
        $friend->url = htmlspecialchars($request->url);

        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'friends';
        $pics = $this->createImage($img_request, $img, $folder);
        $friend->pics = $pics;

        $friend->save();

        return redirect(route('friend.index'))->withToastSuccess('Friend Created Successfully!');
    }

    public function show(Friend $friend)
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }
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
        //validate save friend
        $validator = Validator::make($request->all(), [
            'alav' => 'required',
            'title' => 'required',
            'url' => 'required',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $friend = Friend::findOrFail($id);

        $friend->alav = htmlspecialchars($request->alav);
        $friend->title = htmlspecialchars($request->title);
        $friend->url = htmlspecialchars($request->url);

        //add pics
        if($request->hasFile('pics')){
            if ($friend->pics != 'default.svg')
            {
                Storage::delete('/public/friends/'.$friend->pics);
            }
            $folder = 'friends';
            $image_request = $request->hasFile('pics');
            $img = Request()->file('pics');
            $pics = $this->updateImage($image_request, $img, $folder);
            $friend->pics = $pics;
            $friend->update();
        }

        $friend->update();

        return redirect(route('friend.index'))->withToastSuccess('Friend Updated Successfully!');
    }

    public function destroy(Friend $friend)
    {
        //delete friend
        $friend->delete();

        //
        Storage::delete('/public/friends/'.$friend->pics);

        return redirect(route('friend.index'))->withToastSuccess('Friend Deleted Successfully!');
    }
}
