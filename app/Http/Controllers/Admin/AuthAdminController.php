<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;

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
        $remember= \request('remember')==1?true :false;
        if (Auth::guard('admin')->attempt(['email'=>\request('email'),'password'=>\request('password')],$remember)){
            return redirect(url('/adminpanel'));
        }else{
            session()->flash('error',trans('admin.incorrect_information_login'));
            return redirect(url('admin/login'));
        }

    }
    public function logout(){
        admin()->logout();
        return redirect(route('admin.login'));
    }

}
