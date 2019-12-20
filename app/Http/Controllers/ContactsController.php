<?php

namespace App\Http\Controllers;

use App\Mail\ContactsMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function index()
    {
        //SEO
        $this->setSeo(__('app.contact'), 'Contact Page Contact Form About Me');

        $contacts = Contact::where('status', '=', '0')->latest()->get();

        return view('contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {
/*        $data = request()->validate([
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        //
        Mail::to('lumijromano@test.com')->send(new ContactsMail($data));*/
        //validate save mail
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',

            'user_id' => 'sometimes',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact = new Contact();

        $contact->subject = htmlspecialchars($request->subject);
        $contact->message = $request->message;
        $contact->user_id = Auth::id();

        $contact->save();

        return back()->withToastSuccess('Message Sent Successfully!');
    }

    public function show(Contact $contact)
    {
        //SEO
        $this->setSeo( $contact->subject, 'Message From Users');

        return view('contacts.show', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->status = true;

        $contact->save();

        return redirect(route('contact'))->withToastSuccess('Contact Mail Read!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        //delete contact mail
        $contact->delete();

        return redirect(route('contact'))->withToastSuccess('Contact Mail Deleted Successfully!');
    }
}
