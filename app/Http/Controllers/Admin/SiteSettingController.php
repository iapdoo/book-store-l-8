<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\About_Us;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting(){
        $about=About_Us::all();
        return view('admin.SiteSetting.settings',compact('about'));

    }
    public function setting_save(AboutUsRequest $request){

        $data=$request->except( '_token');
        if (\request()->hasFile('sitImage')){
            $data['sitImage']= (new UploadController)->upload([
                'file'=>'sitImage',
                'path'=>'Image',
                'delete_file'=>About_Us::orderBy('id','desc')->first(),
            ]);
        }

       // About_Us::create($data);
       About_Us::orderBy('id','desc')->update($data);
        session()->flash('success','Setting Updated successful');
        return redirect(url('settings'));
    }
}
