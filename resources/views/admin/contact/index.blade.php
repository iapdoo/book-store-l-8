@extends('admin.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th> {{trans('admin.delete')}} </th>
                                <th> {{trans('admin.User_Name')}} </th>
                                <th>{{trans('admin.User_E-mail') }}</th>
                                <th>{{trans('admin.Subject')}}</th>
                                <th>{{trans('admin.Massage')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contact as $contactInfo)
                                <tr>
                                    <td>
                                        {!! Form::open(['id'=>'form_delete','url'=>url('contact/'.$contactInfo->id),'method'=>'delete']) !!}
                                        {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger fa fa-trash' ,'layouts'=>'inline']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{$contactInfo->contact_name}}</td>
                                    <td>{{$contactInfo->contact_email}}</td>
                                    <td>{{$contactInfo->contact_subject}}</td>
                                    <td>{{$contactInfo->contact_massage}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th> {{trans('admin.delete')}} </th>
                                <th> {{trans('admin.User_Name')}} </th>
                                <th>{{trans('admin.User_E-mail') }}</th>
                                <th>{{trans('admin.Subject')}}</th>
                                <th>{{trans('admin.Massage')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
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


