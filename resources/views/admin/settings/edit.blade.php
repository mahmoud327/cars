@extends('layouts.main')
@section('page_title')
الأعدات
@endsection

@section('content')



<section class="content-header">
    <h1>
        لوحة التحكم
        <small>الأعدات</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active">الأعدات</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


    <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">الأعدات</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            @include('flash::message')

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::model($model,[
                    'action' => ['Admin\Main\SettingController@update', $model->id],
                    'method' => 'put'
                    ]) !!}

                    <div class="form-group">
                      <label>About us</label>
                      {!! Form::textarea('about_us',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>phone</label>
                      {!! Form::text('phone',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      {!! Form::text('email',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>Fb_link</label>
                      {!! Form::text('fb_link',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>Tw_link</label>
                      {!! Form::text('tw_link',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>Youtube_link</label>
                      {!! Form::text('youtube_link',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>Inst_link</label>
                      {!! Form::text('inst_link',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>Whatsapp_link</label>
                      {!! Form::text('whatsapp_link',null,[
                        'class' => 'form-control'
                      ]) !!}

                    </div>

                    <div class="form-group">
                      <label>Google_plus_link</label>
                      {!! Form::text('google_plus_link',null,[
                        'class' => 'form-control'
                      ]) !!}
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"> حفظ </button>
                    </div>

                    {!! Form::close() !!}
          </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->
  </div><!-- /.row -->


    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

</section><!-- /.content -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection

