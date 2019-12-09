<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLevelsController extends Controller
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
        $this->setSeo('Users', 'Users Page Latest Users');

        $users = User::latest()->get();
        return view('userLevels.index', compact('users'));
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
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }
        $user = User::findOrFail($id);
        //SEO
        $this->setSeo( $user->username, 'User Personal Info');

        $roles = Role::get();

        return view('userLevels.show', compact('user', 'roles'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);

        //update history
        $user->update($this->validateRequest());

        return redirect(route('userLevel.index'))->withToastSuccess('User Level Updated Successfully!');
    }

    public function destroy()
    {
        return back();
    }

    private function validateRequest()
    {
        return request()->validate([
            'role_id' => 'required',
        ]);
    }
}
