<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\About_Us;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::select('id',
            'category_name_'.\LaravelLocalization::getCurrentLocale() .' as category_name',
            'category_description_'.\LaravelLocalization::getCurrentLocale() .' as category_description',
            'category_image','added_by','created_at','updated_at'
        )->get();
        $title=trans('admin.categories');
        return view('admin.category.index',compact('category','title'));
    }

    public function create()
    {
        $title=trans('admin.category_add');
        return view('admin.category.create',compact('title'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['added_by']=auth()->user()->id;
        if (\request()->hasFile('category_image')){
            $data['category_image']= (new UploadController)->upload([
                'file'=>'category_image',
                'path'=>'category',
                'delete_file'=>Category::orderBy('id','desc')->first(),

            ]);
        }
        Category::create($data);
        session()->flash('success','category Added successful');
        return redirect(url('category'));

    }


    public function show($id)
    {
        $categoryinfo=Category::find($id);

        return view('admin.category.show' ,compact('categoryinfo'));
    }

    public function show_product($id)
    {
        $about=About_Us::all();
        $categoryinfo=Category::find($id);
        return view('website.home.show' ,compact('categoryinfo','about'));
    }
    public function add_product(ProductRequest $request , $category_id)
    {
        $data=$request->all();
        $data['category_id']=$category_id;

        if (\request()->hasFile('product_image')){
            $data['product_image']= (new UploadController)->upload([
                'file'=>'product_image',
                'path'=>'product',
                'delete_file'=>Product::orderBy('id','desc')->first(),

            ]);
        }
        Product::create($data);
        session()->flash('success','product Added successful');
        return back();
    }

    // function get edit view

    public function edit($id)
    {
        $category=Category::find($id);
        $title='Edit Category';
        return view('admin.category.edit',compact('category','title'));
    }

    /*
         * update category
    */
    /**
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'category_name_ar'          => 'required|string',
            'category_name_en'          => 'required|string',
            'category_image'         => 'image',
            'category_description_ar'   => 'required|string',
            'category_description_en'   => 'required|string',
        ]);
        //  $data=$request->except('_method', '_token');
        $data['added_by']=auth()->user()->id;
        if ($request->hasFile('category_image')){
            $data['category_image']= (new UploadController)->upload([
                'file'=>'category_image',
                'path'=>'category',
                'delete_file'=>Category::find($id)->category_image,

            ]);
        }
        Category::where('id',$id)->update($data);
        session()->flash('success','category Edit successful');
        return redirect(url('category'));

    }

    /*
     * delete product and it's image
     * */
    public function destroy($id)
    {
        $categories= Category::find($id);
        Storage::delete($categories->category_image);
        $categories->delete();
        session()->flash('success','category deleted successful');
        return redirect(url('category'));
    }
}
