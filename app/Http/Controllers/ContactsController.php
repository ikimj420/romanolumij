<?php

namespace App\Http\Controllers;

use App\Mail\ContactsMail;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'subjects' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        //
        Mail::to('LumijRomano@test.com')->send(new ContactsMail($data));
        return back()->withToastSuccess('Message Sent Successfully!');
    }
}
