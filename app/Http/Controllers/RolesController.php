<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::latest()->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        Role::create($this->validateRequest());

        return redirect(route('role.index'))->withToastSuccess('User Level Created Successfully!');
    }

    public function show(Role $role)
    {

        return view('roles.show', compact('role'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, Role $role)
    {
        //update history
        $role->update($this->validateRequest());

        return redirect(route('role.index'))->withToastSuccess('User Level Updated Successfully!');
    }

    public function destroy(Role $role)
    {
        //delete history
        $role->delete();

        return redirect(route('role.index'))->withToastSuccess('User Level Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'userLevel' => 'required',
        ]);
    }
}
