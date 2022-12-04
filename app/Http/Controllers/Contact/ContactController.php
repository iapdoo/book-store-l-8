<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\About_Us;
use App\Models\Contact;

class ContactController extends Controller
{


    public function ShowIndex(){
        $contact=Contact::all();
        return view('admin.contact.index',compact('contact'));
    }
    public function destroy($id){
        $contact=Contact::find($id);
        $contact->delete();
        session()->flash('success','massage Deleted successful');
        return back();
    }
}
