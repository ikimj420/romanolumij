<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\If_;
use RealRashid\SweetAlert\Facades\Alert;

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
        $request->validate([
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
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $user = User::findOrFail($id);
        $folder = 'users';
        $image_request = $request->hasFile('avatar');

        if(Request()->hasFile('avatar')){
            if ($user->avatar !== 'default.svg'){
                $image = Request()->file('avatar');
                Storage::delete('public/'. $folder .'/'.$user->avatar);
                $pics = $this->updateImage($image_request, $image, $folder);
                $user->avatar = $pics;
            }
            $user->update();
        }else
        $user->update($request->all());

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
}
