@extends('admin.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xm-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                        </div>
                            <table id="example2" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th> {{trans('admin.delete')}} </th>
                                <th> {{trans('admin.edit')}} </th>
                                <th> {{trans('admin.category_name')}} </th>
                                <th>{{trans('admin.category_image')}}</th>
                                <th>{{trans('admin.category_description')}}</th>
                                <th>{{trans('admin.price')}} </th>
                                <th>{{trans('admin.quantity')}} </th>
                                <th>{{app()->getLocale() == "ar" ?trans('admin.category_name_of_product_ar'):trans('admin.category_name_of_product_en')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $productinfo)
                                <tr>
                                    <td>
                                        {!! Form::open(['id'=>'form_delete','url'=>url('product/'.$productinfo->id),'method'=>'delete']) !!}
                                        {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger fa fa-trash' ,'layouts'=>'inline']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url ('product/'.$productinfo->id .'/edit') }} "> <i class="fa fa-edit"></i> </a>
                                    </td>
                                    <td>{{$productinfo->product_name}}</td>
                                    <td>
                                    @if(!empty($productinfo->product_image))
                                        <img src="{{asset('storage/'.$productinfo->product_image)}}" style="width: 100px;height: 100px;">
                                    @endif
                                    </td>
                                    <td>{{$productinfo->product_description}}</td>
                                    <td>{{$productinfo->product_price}}</td>
                                    <td>{{$productinfo->product_quantity}}</td>
                                    <td>{{app()->getLocale() == "ar" ?$productinfo->products->category_name_ar:$productinfo->products->category_name_en}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th> {{trans('admin.delete')}} </th>
                                <th> {{trans('admin.edit')}} </th>
                                <th> {{trans('admin.product_name')}} </th>
                                <th>{{trans('admin.product_image')}}</th>
                                <th>{{trans('admin.product_description')}}</th>
                                <th>{{trans('admin.price')}} </th>
                                <th>{{trans('admin.quantity')}} </th>
                                <th>{{app()->getLocale() == "ar" ?trans('admin.category_name_of_product_ar'):trans('admin.category_name_of_product_en')}}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
@endsection
@section('footer')

    <script src="{{url('/design/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('/design/adminlte/dist/js/adminlte.min.js')}}"></script>
    <script src="{{url('/design/adminlte/dist/js/demo.js')}}"></script>

    <script type="text/javascript">
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        })
    </script>
@endsection


