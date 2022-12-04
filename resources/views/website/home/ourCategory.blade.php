<div class="price-option text-center">
    <div class="container">
        <h2 class=" price-head h1 uppercase head-border-center text-center">{{trans('admin.our_categories')}} </h2>
        <p class="price-disc">
            {{$about->first()->sitDescription}}
        </p>
        <div class="row">
            @foreach($category as $categoryDesc)
                <div class="col-md-4">
                    <div class="price-box">
                        <h2 class="plan-head ">{{app()->getLocale() == "ar" ?$categoryDesc->category_name_ar:$categoryDesc->category_name_en}}</h2>
                        <div class="option-price">
                  <span class="price">
                      <img src="{{asset('storage/'.$categoryDesc->category_image)}}">
                  </span>
                        </div>
                        <ul class="list-unstyled confgration ">
                            <li>
                                <p>{{app()->getLocale() == "ar" ?$categoryDesc->category_description_ar:$categoryDesc->category_description_en}}</p>
                            </li>
                        </ul>
                        <h4><a class=" uppercase btn yellow-color-green-gradient-btn "
                               href="show_product/{{$categoryDesc->id}}">
                                {{app()->getLocale() == "ar" ?$categoryDesc->category_name_ar:$categoryDesc->category_name_en}}
                            </a></h4>
                    </div>
                </div>
            @endforeach
            <div class="clearfix"></div>
            <div class="align-content-center" style="text-align: center">

            </div>

        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="align-content-center text-center">
                    {{$category->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
