@extends('admin.index')

@section('content')
    <!-- Main content -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$title}}</h3>
            </div>
            <div class="box-body ">
                <!-- route admin.store function or url aurl('admin') this header for store function  -->
                {!! Form::open(['route'=>'users.store']) !!}
                <div class="form-group">
                    {!! Form::label('name',trans('admin.name')) !!}
                    {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email',trans('admin.email')) !!}
                    {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('password',trans('admin.password')) !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('role',trans('admin.role')) !!}
                    {!! Form::select('role',['user'=>'user','admin'=>'admin'],old('role'),['class'=>'form-control','placeholder'=>trans('admin.role')]) !!}
                </div>
                {!! Form::submit(trans('admin.creat_admin'),['class'=>'btn btn-primary form-control']) !!}
                {!! Form::close() !!}
            <!-- route admin.store function or url aurl('admin') this header for store function  -->

            </div>
                    <!-- /.card-body -->
                <!-- /.card -->
        </div>
        <!-- /.row -->
@endsection
