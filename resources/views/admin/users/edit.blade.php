@extends('admin.index')

@section('content')
    <!-- Main content -->

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body ">
            <!-- 'route'=>['admin.update',$admin->id] function or url aurl('admin/'.$admin->id) this header for store function  -->
            {!! Form::open(['url'=>url('users/'.$user->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('password',trans('admin.password')) !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('role',trans('admin.role')) !!}
                {!! Form::select('role',['user'=>trans('admin.user'),'admin'=>trans('admin.admins')],$user->Level,['class'=>'form-control','placeholder'=>trans('admin.role')]) !!}
            </div>
        {!! Form::submit(trans('admin.edit_admin'),['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        <!-- route admin.store function or url aurl('admin') this header for store function  -->

        </div>
        <!-- /.card-body -->
        <!-- /.card -->
    </div>
    <!-- /.row -->
@endsection
