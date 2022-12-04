@extends('website.home')

@section('content')
    <!-- start contact us  -->
    <div class="contact-us">
        <div class="container">
            @include('layouts.massage')
            <h2 class="contact-hesd text-center h1 head-border-center uppercase">{{trans('admin.Contact')}} </h2>
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    <ul class="list-unstyled mb-0">
                        <h1>{{trans('admin.ourOffice')}} </h1>
                        <h4>{{$about->first()->siteName}}</h4>

                        <hr>

                        <li><i class="fa fa-map-marker fa-2x"></i>
                            <h4>{{$about->first()->address}}</h4>
                        </li>
                        <hr>
                        <li><i class=" mt-4 fa-2x fa fa-mobile-phone"></i>
                            <h4>{{$about->first()->phone}}</h4>
                        </li>
                        <hr>
                        <li><i class=" fa fa-envelope mt-4 fa-2x"></i>
                            <h4>{{$about->first()->email}}</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 mb-md-0 mb-5">
                    <form action="{{url('/contact')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input class="form-control input-lg" type="text" name="contact_name"
                                   placeholder="{{trans('admin.Enter_Your_Name')}}"
                                   value="{{Auth::user() ? Auth::user()->name : ""}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input class="form-control input-lg" type="text" name="contact_email"
                                   placeholder="{{trans('admin.Enter_Your_E-mail')}}"
                                   value="{{Auth::user() ? Auth::user()->email : ""}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input class="form-control input-lg" type="text" name="contact_subject"
                                   placeholder="{{trans('admin.Enter_Your_Subject')}}">
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 20px;margin-top: 30px;">
                        <div class="md-form">
                            <textarea class="form-control input-lg" type="text" name="contact_massage"
                                      placeholder="{{trans('admin.Massage')}}" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{trans('admin.send')}}" class="contact-btn">
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
