@extends('layouts.main')
@section('page_title')
تعديل مكتب
@endsection

@section('css')

@endsection

@section('content')


    <section class="content-header">
        <h1>
            لوحة التحكم
            <small>تعديل مكتب</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
            <li><a href="{{route('office.index')}}">  المكاتب </a></li>
            <li class="active">تعديل مكتب</li>
        </ol>
    </section>




    <section class="content">
        <!-- row opened -->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h4 class="card-title mg-b-0"> تعديل مكتب</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('flash::message')
                    <div class="col-lg-12 margin-tb">
                       <div class="pull-right">
                           <a class="btn btn-primary btn-sm" href="{{ route('office.index') }}">رجوع</a>
                       </div>
                   </div><br>

                   {!! Form::model($office, ['method' => 'PATCH','route' => ['office.update', $office->id]]) !!}
                   <div class="">

                       <div class="row mg-b-20">
                           <div class="parsley-input col-md-6" id="fnWrapper">
                               <label>اسم المكتب: <span class="tx-danger">*</span></label>
                               {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                           </div>

                           <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                               <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                               {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                           </div>

                       </div>

                   </div>

                   <div class="row mg-b-20">


                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>الهاتف: <span class="tx-danger">*</span></label>
                            {!! Form::text('phone', null, array('class' => 'form-control','required')) !!}
                        </div>


                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">

                            <label>العنوان: <span class="tx-danger">*</span></label>
                            {!! Form::text('address', null, array('class' => 'form-control','required')) !!}
                        </div>

                    </div>

                   <div class="mg-t-30">
                       <button class="btn btn-primary" type="submit">تحديث</button>
                   </div>
                   {!! Form::close() !!}
                  </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->


        <!-- main-content closed -->
    </section>



@endsection

@push('js')

@endpush
