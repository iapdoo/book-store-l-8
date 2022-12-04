@extends('website.home')

@section('content')
    <div class="about_us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="list-info">
                        <h3 class="head-border"> {{trans('admin.about_us')}} </h3>
                        <p class="sublist-disc">
                            {{$about->first()->sitDescription}}
                        </p>
                    </div>
                    <div class="social-auth-links">
                        <div class="col-lg-6 col-md-6">
                            <br>
                            <h4> {{trans('admin.ourOffice')}} </h4>
                            <p>{{$about->first()->siteName}}</p>
                            <br>
                            <i class="fa fa-map-marker fa-2x"></i>
                            <br>
                            <p>{{$about->first()->address}}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 ">

                            <i class=" mt-4 fa-2x fa fa-mobile-phone"></i>

                            <p>{{$about->first()->phone}}</p>

                            <i class=" fa fa-envelope mt-4 fa-2x"></i>

                            <p>{{$about->first()->email}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive center-block sub-img"
                         src="{{asset('storage/'.$about->first()->sitImage)}}">
                </div>
            </div>
        </div>
    </div>
@endsection
