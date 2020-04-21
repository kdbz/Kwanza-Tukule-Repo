@extends('main')
@section('title',' | Contact')
@section('content')
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                    <hr/>
                    <form action="{{ url('contact' )}}"method="POST">{{ csrf_field() }}
                        <div class="form-group">
                            <label name="email">E-mail:</label>
                            <input id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="subject">Subject:</label>
                            <input id="subject" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="message">Message:</label>
                            <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                        </div>
                        <input type="submit" value="Send Message &#xf1d8;" class="btn btn-success" style="font-family: FontAwesome, Arial; font-style: normal;">
                    </form>    
                </div>
                <div class="col-md-3"><br>
                    <h3 style="font-family: FontAwesome, Arial; font-style: normal;">Head Office <i class="fa fa-map-marker"></i></h3>
                    <p>Elephant Soap Industries</p>
                    <p>Shimo la Tewa Rd,</p>
                    <p>Nairobi</p>
                    <p>09:00 am – 6:00 pm</p>
                    <p>+254 757 427 227</p>
                    <p>info@Kwanzatukule.com</p>
                </div>
                <div class="col-md-8 " id="map" ></div>
                <script>
// Initialize and add the map
function initMap() {
  // The location of headquaters
  var headquaters = {lat: -1.305730, lng: 36.830139};
  // The map, centered at headquaters
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15,draggable: false, zoomControl:false,streetViewControl:false, center: headquaters});
  // The marker, positioned at headquaters
  var marker = new google.maps.Marker({position: headquaters, map: map,});
  marker.addListener('click',function(){
    infowindow.open(map,marker);
  });
}

    </script>
            </div>

 @endsection       






