<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserLevelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
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
        $user = User::findOrFail($id);
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
