<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\About_Us;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::select('id','category_id',
            'product_name_' . \LaravelLocalization::getCurrentLocale() . ' as product_name',
            'product_description_' . \LaravelLocalization::getCurrentLocale() . ' as product_description',
            'product_image', 'product_price', 'product_quantity', 'created_at', 'updated_at'
        )->get();

        $title=trans('admin.products');
        return view('admin.product.index',compact('product','title'));
    }


    public function create()
    {
        $title=trans('admin.product_add');
        $category=Category::all();
        return view('admin.product.create',compact('category','title'));
    }


    public function store(ProductRequest $request)
    {
        if (!empty($request->category_id)&&$request->category_id!='disabled selected hidden') {
            $data=$request->all();
            $data['category_id'] = $request->category_id;
            if ($request->hasFile('product_image')) {
                $data['product_image'] = (new UploadController)->upload([
                    'file' => 'product_image',
                    'path' => 'product',
                    'delete_file' =>Product::orderBy('id', 'desc')->first(),

                ]);
            }
            Product::create($data);
            session()->flash('success', 'product Added successful');
            return redirect(url('product'));
        }
        else return view('admin.product.noProduct');
    }


    public function edit($id)
    {
        $product=Product::find($id);
        $category=Category::all();
        $title='Edit product';
        return view('admin.product.edit',compact('product','category','title'));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(), [
            'product_name_ar'          => 'required|string',
            'product_name_en'          => 'required|string',
            'product_image'         => 'image',
            'product_description_ar'   => 'required|string',
            'product_description_en'   => 'required|string',
            'product_price'         => 'required|integer',
            'product_quantity'      => 'required|integer',
        ]);
        $data['category_id']=$request->category_id;
        if ($request->hasFile('product_image')){
            $data['product_image']= (new UploadController)->upload([
                'file'=>'product_image',
                'path'=>'product',
                'upload_type'=>'single',
                'delete_file'=>Product::find($id)->product_image,

            ]);
        }
        Product::where('id',$id)->update($data);
        session()->flash('success','product Edit successful');
        return redirect(url('product'));

    }


    public function destroy($id)
    {
        $product= Product::find($id);
        Storage::delete($product->product_image);
        $product->delete();
        session()->flash('success','product deleted successful');
        return redirect(url('product'));
    }

    public function show_product_details($id){
        $product=Product::find($id);
        $about=About_Us::all();
        $category =Category::orderBy('id','desc')->paginate(3);
        return view('website..home.show_product_details',compact('product','about','category'));
    }

    public function ShowUserProduct($userId){
        $user=User::find($userId);
        return  $user->products;
        $product;
    }
}
