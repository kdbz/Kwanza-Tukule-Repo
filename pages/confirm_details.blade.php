@extends('main')
@section('title',' | Confirm Details')
@section('content')
        <div class="row">
          <h5>Kindly confirm the following details to proceed</h5>
    {!! Form::model($order,['route'=>['orders.update',$order->id],'method'=>'PUT']) !!}
{{ Form::label('number','Number:')}}  
   {{ Form::text('number', Auth::user()->number, array("class"=>'form-control',"id"=>'number' ))}}<br>
    <p>Confirm Pickup Location</p>
   {{ Form::text('location', null, array("class"=>'form-control pac-container', "placeholder"=>'&#xf002; Search...', "style"=>'font-family: FontAwesome, Arial; font-style: normal; z-index: 1100;width: 700px;', "id"=>'search'))}}
  <div class="col-md-12 " id="confirm" ></div>
                <script>
                  var map;
          // Initialize and add the map
          function initMap() {
            // The location of headquaters
            var headquaters = {lat: -1.305730, lng: 36.830139};
            // The map, centered at headquaters
             map = new google.maps.Map(
                document.getElementById('confirm'), {zoom: 13,mapTypeControl: false, center: headquaters});
            var defaultBounds = new google.maps.LatLngBounds(
              new google.maps.LatLng(-1.262990,36.798611),
              new google.maps.LatLng(-1.310500,36.914661));
            var options = {
              bounds: defaultBounds
            };
            var places = new google.maps.places.SearchBox(document.getElementById('search'));
             map.controls[google.mapsControlPosition.TOP_LEFT].push(input);
             var autocomplete = new google.maps.places.Autocomplete(input,options);
 }
        </script>
      <br><br>
  {{ Form::submit('Confirm',array('class'=>'btn btn-success btn-block'))}} 
{!! Form::close() !!}
      </div>
@endsection 

