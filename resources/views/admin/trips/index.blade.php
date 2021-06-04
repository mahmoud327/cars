@extends('layouts.main')
@section('page_title')
الرحلات
@endsection



@section('content')

<section class="content-header">
    <h1>
        لوحة التحكم
        <small>الرحلات  </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active"> الرحلات</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
 
    

    

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                   <h3 class="box-title">الرحلات  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   @include('flash::message')

                
                    {!! $dataTable->table([
                    'class'=>'dataTable table table-striped table-hover  table-bordered'
                    ]) !!}

                </div><!-- /.box-body -->
             </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

</section><!-- /.content -->

@push('dt_js')
    <script>
    delete_all();
    </script>
    {!! $dataTable->scripts() !!}
@endpush
@endsection
@push('js')
    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var username = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #username').val(username);
        })
    </script>
@endpush
