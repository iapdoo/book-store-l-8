<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user=User::orderBy('id','desc')->paginate(2);
        $category=Category::orderBy('id','desc')->paginate(2);
        return view('admin.index',compact('user','category'));
    }

    public function getUser()
    {
        $user = User::orderBy('id', 'desc')->paginate(3);
        return view('admin.users.index', compact('user'));
    }

    public function edit($id)
    {
        $title = 'Edit User ';
        $user = User::find($id);
        return view('admin.users.edit', compact('title', 'user'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(), [
            'name' => 'required',
            'role' => 'required|in:user,admin',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|min:6',
        ], [], []);

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        User::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect(url('users'));
    }
    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        session()->flash('success','User deleted successful');
        return redirect(url('users'));


    }

    public function create()
    {
        $title='Add New User';
        return view('admin.users.create',compact('title'));
    }


    public function store()
    {
        $data=$this->validate(\request(),[
            'name'=>'required',
            'role' => 'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ],[],[
            'name'=>trans('admin.name'),
            'Level'=>trans('admin.role'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        $data['role']=request('role');
        $data['password']=bcrypt(\request('password'));


        User::create($data);
        session()->flash('success','User Added successful');
        return redirect(url('users'));






    }
}
