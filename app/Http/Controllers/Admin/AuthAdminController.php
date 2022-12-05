<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthAdminController extends Controller
{
    public function login(){
        return view('admin.admins.login');
    }
    public  function dologin(Request $request){

            $this->validate(\request(),[
               'email'=>'required',
               'password'=>'required',
            ]);

        if (Auth::guard('admin')->attempt(['email'=>\request('email'),'password'=>\request('password')])){
            return redirect(url('/adminpanel'));
        }else{
            session()->flash('error',trans('admin.incorrect_information_login'));
            return redirect(url('admin/login'));
        }

    }

}
