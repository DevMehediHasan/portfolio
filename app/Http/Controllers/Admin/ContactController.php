<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }


    public function store(Request $request)
    {
//        $contact = new Contact();
//        $contact->name = $request->name;
//        $contact->email = $request->email;
//        $contact->subject = $request->subject;
//        $contact->phone = $request->phone;
//        $contact->message = $request->message;
//        $contact->save();
////        Toastr::success('Category successfully saved','Success');
//        return redirect()->route('admin.category.index');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
            'subject'=>'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Thanks for contacting us!');
    }

    public function show(Contact $contact)
    {
        //
    }



    public function update(Request $request, Contact $contact)
    {
        //
    }


    public function destroy(Contact $contact)
    {
        //
    }
}
