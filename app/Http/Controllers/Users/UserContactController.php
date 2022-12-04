<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\About_Us;
use App\Models\Contact;
use Illuminate\Http\Request;

class UserContactController extends Controller
{
    public function index(){
        $about=About_Us::all();
        return view('website.contact.contact_us',compact('about'));
    }
    public function create(ContactRequest $request){
        $data = $request->all();
        $data['contact_id']=auth()->user()->id;
        Contact::create($data);
        session()->flash('success','Your massage send successful');
        return back();
    }
}
