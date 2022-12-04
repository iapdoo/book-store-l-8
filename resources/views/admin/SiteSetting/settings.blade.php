@extends('admin.index')

@section('content')
    <!-- Main content -->

    <div class="box">
        <div class="box-header">
        </div>

        <div class="box-body ">
            <!-- route admin.store function or url aurl('admin') this header for store function  -->
            {!! Form::open(['url'=>url('settings'),'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('siteName',trans('admin.siteName')) !!}
                {!! Form::text('siteName',$about->first()->siteName,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sitDescription',trans('admin.sitDescription')) !!}
                {!! Form::textarea('sitDescription',$about->first()->sitDescription,['class'=>'form-control']) !!}
            </div>
            <div class="form-group ">
                @if(!empty($about->first()->sitImage))
                    <img src="{{asset('storage/'.$about->first()->sitImage)}}" style="width: 50px;height: 50px">
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::label('sitImage',trans('admin.sitImage')) !!}
                    </div>
                    <div class="col-lg-12">
                        {!! Form::file('sitImage',['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('facebook',trans('admin.facebook')) !!}
                {!! Form::text('facebook',$about->first()->facebook,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tweeter',trans('admin.tweeter')) !!}
                {!! Form::text('tweeter',$about->first()->tweeter,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('linkin',trans('admin.linkin')) !!}
                {!! Form::text('linkin',$about->first()->linkin,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone',trans('admin.phone')) !!}
                {!! Form::text('phone',$about->first()->phone,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$about->first()->email,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address',trans('admin.address')) !!}
                {!! Form::text('address',$about->first()->address,['class'=>'form-control']) !!}
            </div>
            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.card-body -->
        <!-- /.card -->
    </div>
    <!-- /.row -->
@endsection
