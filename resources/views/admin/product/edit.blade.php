@extends('admin.index')

@section('content')
    <!-- Main content -->

    <div class="box">
        <div class="box-header">
            <h3 class="box-title" style="text-align: center">{{$title}}</h3>
        </div>
        <div class="box-body ">
            <!-- 'route'=>['admin.update',$admin->id] function or url aurl('admin/'.$admin->id) this header for store function  -->
            {!! Form::open(['url'=>url('product/'.$product->id),'method'=>'put','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('product_name_ar')!!}
                {!! Form::text('product_name_ar',$product->product_name_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('product_name_en')!!}
                {!! Form::text('product_name_en',$product->product_name_en,['class'=>'form-control']) !!}
            </div>
            <div class="form-group ">
                @if(!empty($product->product_image))
                    <img src="{{asset('storage/'.$product->product_image)}}" style="width: 50px;height: 50px;">
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::label('product_image') !!}
                    </div>
                    <div class="col-lg-12">
                        {!! Form::file('product_image',['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('product_description_ar') !!}
                {!! Form::text('product_description_ar',$product->product_description_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('product_description_en') !!}
                {!! Form::text('product_description_en',$product->product_description_en,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('product_price') !!}
                {!! Form::text('product_price',$product->product_price,['class'=>'form-control']) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('product_quantity') !!}
                {!! Form::text('product_quantity',$product->product_quantity,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category name')!!}
                <select class="selectpicker form-control" name="category_id" id="number" data-live-search="true">
                    <option value="{{$product->products->id}}">{{app()->getLocale() == "ar" ?$product->products->category_name_ar:$product->products->category_name_en}}</option>
                    @foreach($category as $categoryinfo)
                        <option value="{{$categoryinfo->id}}">{{app()->getLocale() == "ar" ?$categoryinfo->category_name_ar:$categoryinfo->category_name_en}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {!! Form::submit('Edit',['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        <!-- /.card-body -->
        <!-- /.card -->
    </div>
    <!-- /.row -->
@endsection
