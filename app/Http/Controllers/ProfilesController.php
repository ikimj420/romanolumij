<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('profiles.show', compact('user'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        //update
        $user->update($this->validateRequest());

        //save picture
        $folder = 'users';
        $img_request = $request->hasFile('avatar');
        $img = Request()->file('avatar');
        //check for picture
        if($img_request){
            // Delete Images
            if($user->avatar != 'default.svg'){
                Storage::delete('public/'. $folder .'/'.$user->avatar);
            }
            $picture = $this->updateImage($img_request, $img, $folder);
            $user->avatar = $picture;
            $user->update();
        }

        return back()->withToastSuccess('Profile Updated Successfully!');
    }

    public function destroy($id)
    {
        $profile = User::findOrFail($id);
        //delete history
        $profile->delete();

        //
        if ($profile->avatar != 'default.svg'){
            Storage::delete('public/users/'.$profile->avatar);
        }

        return redirect(route('welcome'))->withToastSuccess('User Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',

            'role_id' => 'sometimes',
            'birthDate' => 'sometimes',
            'phones' => 'sometimes',
            'street' => 'sometimes',
            'city' => 'sometimes',
            'state' => 'sometimes',
            'bio' => 'sometimes',
            //'avatar' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
    }
}