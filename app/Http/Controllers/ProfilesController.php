<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return back();
    }

    public function create()
    {
        return back();
    }

    public function store()
    {
        return back();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        //SEO
        $this->setSeo( $user->username, 'User Personal Info');

        return view('profiles.show', compact('user'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        //validate save user
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',

            'birthDate' => 'sometimes',
            'site' => 'sometimes',
            'phones' => 'sometimes',
            'street' => 'sometimes',
            'city' => 'sometimes',
            'state' => 'sometimes',
            'bio' => 'sometimes',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);

        $user->name = htmlspecialchars($request->name);
        $user->username = htmlspecialchars($request->username);
        $user->email = htmlspecialchars($request->email);

        $user->birthDate = htmlspecialchars($request->birthDate);
        $user->site = htmlspecialchars($request->site);
        $user->phones = htmlspecialchars($request->phones);
        $user->street = htmlspecialchars($request->street);
        $user->city = htmlspecialchars($request->city);
        $user->state = htmlspecialchars($request->state);

        $user->bio = $request->bio;

        //add pics
        if($request->hasFile('avatar')){
            if ($user->avatar != 'default.svg')
            {
                Storage::delete('/public/users/'.$user->avatar);
            }
            $folder = 'users';
            $image_request = $request->hasFile('avatar');
            $img = Request()->file('avatar');
            $pics = $this->updateImage($image_request, $img, $folder);
            $user->avatar = $pics;
            $user->update();
        }

        $user->update();

        return back()->withToastSuccess('Profile Updated Successfully!');
    }

    public function destroy($id)
    {
        $profile = User::findOrFail($id);
        //delete user
        $profile->delete();

        //
        if ($profile->avatar != 'default.svg'){
            Storage::delete('/public/users/'.$profile->avatar);
        }

        return redirect(route('welcome'))->withToastSuccess('User Deleted Successfully!');
    }
}