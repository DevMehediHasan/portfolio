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
        $Contacts = Contact::all();
        return view('admin.contact.index',compact('Contacts'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
            'subject'=>'required',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        Toastr::success('Category successfully saved','Success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        Toastr::success('Contact successfully deleted','Success');
        return redirect()->back();
    }
}
