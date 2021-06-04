
@extends('layouts.main')

@section('page_title')
الصفحة الرئيسية
@endsection
<!-- Content Wrapper. Contains page content -->

  <!-- Content Header (Page header) -->
@section('content')
  <section class="content-header">
    <h1>
        لوحة التحكم
        <small>الصفحة الرئيسية</small>

    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
      <li class="active">الصفحة الرئيسية </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

   <div class="row">
    <div class="col-lg-12">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
        <div class="small-box bg-aqua">
              <div class="inner">
                  @if(\App\Models\Office::count())
                    <h3>{{\App\Models\Office::count()}}</h3>
                  @else
                 <h2>  لايوجد مكاتب </h2>

                 @endif
                <p> عدد المكاتب</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="" class="small-box-footer">عرض المكاتب   <i class="fa fa-arrow-circle-left"></i></a>
         </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

                @if(\App\Models\User::count())

                 <h3>{{\App\Models\User::count()}}<sup style="font-size: 20px"></sup></h3>
               @else

              <h2> لايوجد موظفين </h2>

              @endif
              <h3><sup style="font-size: 20px"></sup></h3>

                  <p> عدد الموظفين  </p>

            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{route('user.index')}}" class="small-box-footer">  عرض الموظفين   <i class="fa fa-arrow-circle-left"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            @if(\App\Models\Driver::count())

              <h3>{{\App\Models\Driver::count()}}</h3>
            @else
          <h2>  لايوجد سائقين</h2>

           @endif

              <p> عدد سائقين</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{route('driver.index')}}" class="small-box-footer">  عرض السائقين <i class="fa fa-arrow-circle-left"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            @if(\App\Models\Trip::count())

              <h3>{{\App\Models\Trip::count()}}</h3>
              @else
              <h2>  لايوجد رحلات</h2>

              @endif
              <p>   عدد الرحلات</p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="{{route('trip.index')}}" class="small-box-footer">  عرض الرحلات<i class="fa fa-arrow-circle-left"></i></a>
          </div>
        </div>
    </div>


    <div class="col-lg-12">
      <div class="col-lg-6">

        <div class="box box-success" style="height: 410px;">
          <div class="box-header with-border">
            <h3 class="box-title">Bar Chart</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart"  ></canvas>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>
     <div class="col-lg-6">

         <div class="box-body">

                    <div class="chart" >

                        <div id="pie_chart">

                        </div>
                    </div>
                </div>
        </div>

</div>
    <!-- /.row -->
    <!-- Main row -->


   <!-- /.col (LEFT) -->


  </section><!-- /.content -->
<!-- /.content-wrapper -->
@push('js')




<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pie-chart/1.0.0/pie-chart.min.js" integrity="sha512-RloOYfWgCwxbdExraq88FwUdFA/RQSuLJADn72+kUcKraQGrhn43BfDruK5dxKjqDGhNDhkE3h1bSoqdXxbGHg==" crossorigin="anonymous"></script>

<script>

    $(document).ready(function () {

      var dates=<?php echo json_encode($dates); ?>;
       var barcanvas=$("#barChart");
       var barchart=new Chart(barcanvas,{

        type:'bar',
        data:{
          labels:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'],
          datasets:[
            {
              label:'  احصائيه عدد الرحلات ',
              data:dates,
              backgroundColor:['red','orange','yellow','green','blue','indigo','violet','puruple','pink','sliver','gold','brown']
            }
          ]

        },
        option:{
          scales:{
            yAxes:[{
              ticks:{
                beginAtZero:true
              }
            }]
          }
        }

       });

    })

    </script>


        <script>
            $(document).ready(function() {
                var sucess =  <?php echo json_encode($sucess); ?>;
                var options = {
                    chart: {
                        renderTo: 'pie_chart',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'نسبة عدد الرحلات'
                    },
                     tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                        percentageDecimals: 1
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                                dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                formatter: function() {
                                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                                }
                            }
                        }
                    },
                    series: [{
                        type:'pie',
                        name:'Success'
                    }]
                }
                myarray = [];
                $.each(sucess, function(index, val) {
                    myarray[index] = [val.status, val.count];
                });
                options.series[0].data = myarray;
                chart = new Highcharts.Chart(options);

            });
        </script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>

@endpush


@endsection
