@extends('layouts.main')
@section('page_title')
أضافة رحلة
@endsection


@section('css')
<style>
    .gmap_canvas {
        overflow: hidden;
        background: none!important;
        height: 100%;
        width: 100%;
    }
    .mapouter {
        position: relative;
        text-align: right;
        height: 100%;
        width: 100%;
    }
    </style>
@endsection



@section('content')

<section class="content-header">
    <h1>
        لوحة التحكم
        <small>أضافة رحلة</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('user-trips.index')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active">أضافة رحلة</li>
    </ol>
</section>




<section class="content">
    <!-- row opened -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h4 class="card-title mg-b-0"> أضافة رحلة</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div><!-- /.box-header -->
            <div class="box-body">

                                        <!-- row -->
                <div class="row">


                    <div class="col-lg-12 col-md-12">

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>خطا</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('office.index') }}">رجوع</a>
                                    </div>
                                </div><br>
                                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                                    action="{{route('office.store','test')}}" method="post">
                                    {{csrf_field()}}

                                    <div id="map" style="height: 500px;width: 100%;"></div>
                                    <div id="map2" style="height: 500px;width: 100%;"></div>

{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}


{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d110471.61552682519!2d31.248551091104126!3d30.087369863515573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e0!4m3!3m2!1d29.9864641!2d31.1366709!4m3!3m2!1d30.1414372!2d31.188818899999998!5e0!3m2!1sar!2seg!4v1617203634442!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
















                                        <div class="row mg-b-20">



                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                                                <label> اسم االكابتن</label>
                                                @inject('drivers','App\Models\Driver')
                                                {!! Form::select('driver_id', $drivers->where('office_id', auth()->user()->office_id )->pluck('name','id')->toArray(),null, ['class' => 'form-control','placeholder'=>' اخر المكتب']) !!}

                                            </div>


                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                                                <label>السيارة: <span class="tx-danger">*</span></label>
                                                {!! Form::select('driver_id', $drivers->where('office_id', auth()->user()->office_id )->pluck('name','id')->toArray(),null, ['class' => 'form-control','placeholder'=>' اخر المكتب']) !!}

                                            </div>
                                        </div>


                                        <div class="row mg-b-20">


                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                                <label>الهاتف: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20" name="phone" type="text">
                                            </div>


                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">

                                                <label>العنوان: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20"name="address" type="text">

                                            </div>

                                        </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                                        <button class="btn btn-primary" type="submit">تاكيد</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row closed -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </div><!-- /.col -->


    <!-- main-content closed -->
</section>


@endsection
@push('js')
{{-- <script>
    $(function () {
        var origin, destination, map;

        // add input listeners
        google.maps.event.addDomListener(window, 'load', function (listener) {
            setDestination();
            initMap();
        });

        // init or load map
        function initMap() {

            var myLatLng = {
                lat: 52.520008,
                lng: 13.404954
            };
            map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: myLatLng,});
        }

        function setDestination() {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });


        }

        function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: travel_mode,
                avoidTolls: true
            }, function (response, status) {
                if (status === 'OK') {
                    directionsDisplay.setMap(map);
                    directionsDisplay.setDirections(response);
                } else {
                    directionsDisplay.setMap(null);
                    directionsDisplay.setDirections(null);
                    alert('Could not display directions due to: ' + status);
                }
            });
        }

        // calculate distance , after finish send result to callback function
        function calculateDistance(travel_mode, origin, destination) {

            var DistanceMatrixService = new google.maps.DistanceMatrixService();
            DistanceMatrixService.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode[travel_mode],
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, save_results);
        }

        // save distance results
        function save_results(response, status) {

            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    var distance_in_kilo = distance.value / 1000; // the kilo meter
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    appendResults(distance_in_kilo, distance_in_mile, duration_text);
                    sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
                }
            }
        }

        // append html results
        function appendResults(distance_in_kilo, distance_in_mile, duration_text) {
            $("#result").removeClass("hide");
            $('#in_mile').html("aa : <span class='badge badge-pill badge-secondary'>" + distance_in_mile.toFixed(2) + "</span>");
            $('#in_kilo').html("aa: <span class='badge badge-pill badge-secondary'>" + distance_in_kilo.toFixed(2) + "</span>");
            $('#duration_text').html("aa: <span class='badge badge-pill badge-success'>" + duration_text + "</span>");
        }

        // send ajax request to save results in the database
        function sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text) {
            var username =   $('#username').val();
            var travel_mode =  $('#travel_mode').find(':selected').text();
            $.ajax({
                url: 'common.php',
                type: 'POST',
                data: {
                    username,
                    travel_mode,
                    origin,
                    destination,
                    distance_in_kilo,
                    distance_in_mile,
                    duration_text
                },
                success: function (response) {
                    console.info(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        // on submit  display route ,append results and send calculateDistance to ajax request
        $('#distance_form').submit(function (e) {
            e.preventDefault();
            var origin = $('#origin').val();
            var destination = $('#destination').val();
            var travel_mode = $('#travel_mode').val();
            var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
            var directionsService = new google.maps.DirectionsService();
           displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
            calculateDistance(travel_mode, origin, destination);
        });

    });

    // get current Position
    function getCurrentPosition() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setCurrentPosition);
        } else {
            alert("Geolocation is not supported by this browser.")
        }
    }

    // get formatted address based on current position and set it to input
    function setCurrentPosition(pos) {
        var geocoder = new google.maps.Geocoder();
        var latlng = {lat: parseFloat(pos.coords.latitude), lng: parseFloat(pos.coords.longitude)};
        geocoder.geocode({ 'location' :latlng  }, function (responses) {
            console.log(responses);
            if (responses && responses.length > 0) {
                $("#origin").val(responses[1].formatted_address);
                $("#from_places").val(responses[1].formatted_address);
                //    console.log(responses[1].formatted_address);
            } else {
                alert("Cannot determine address at this location.")
            }
        });
    }


</script> --}}


{{--
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQm-pHYFL0BN4rUTydW2GfdAWEd-8uCcs&libraries=places&callback=initAutocomplete&language=ar&region=SA
     async defer"></script> --}}

  {{-- <script src="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=40.6655101,-73.89188969999998&destinations=40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626&key=AIzaSyAyf0BRu7mnLaU2IxblxQTYTpSvG8g5XD8"></script> --}}


  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyCGU0PK5ks0K4jqqAZ6l2A6FKWUknklPkM"  type="text/javascript"></script> --}}


<script>
  // Google map
  function initMap() {

    var map = new google.maps.Map(document.getElementById('map2'), {
      zoom: 17,
      center: {lat: <lat>, lng: <lng>},
      scrollwheel: false,
        disableDefaultUI: true,
    });
    var image = 'images/map-icon.png';
    var marker = new google.maps.Marker({
      position: {lat: <lat>, lng: <lng>},
      map: map,
      icon: image,
      title: 'Hello World!'
    });
  }
</script>
<script async defer
   src="https://maps.googleapis.com/maps/api/js?signed_in=false&callback=initMap">
</script>

@endpush
@section('script')


    @stop
