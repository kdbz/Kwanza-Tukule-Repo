@extends('main')
@section('title',' | Homepage')
@section('content')  
     <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"  style="margin-top:-190px;"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" style="margin-top:-190px;"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2" style="margin-top:-190px;"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3" style="margin-top:-190px;"></li>
  </ol>
  <div class="carousel-fixed-item center cat" ><br><br><br><br><h1 style="text-align: center; color: black;"><img  src="{{url('images/logo-1.png')}}" width="100px" height="80px"> KWANZA TUKULE</h1>
  	<h3 style="text-align: center;">The easiest way to get your meals ready.</h3><br>&emsp;&emsp;&emsp;&emsp;&emsp;
    <a class="btn btn-success btn-lg" href="/category" role="button"><b>Place Order <i class="fa fa-arrow-circle-right"></i></b></a><br><br><br><br><br><br><br><br><br><br><br>
    <div id="categoryList" class="positioning">
    </div>
</div>
  <div class="carousel-inner position">
    <div class="carousel-item active" >
      <img class="d-block w-100" src="{{url('images/slider1.jpg')}}" alt="First slide" height="600px">
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="{{url('images/slider2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('images/slider3.jpg')}}" alt="Third slide" >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('images/slider4.png')}}" alt="Fourth slide" height="600px">
    </div>
  </div> 
  <br><br><br><br>   
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div style="background-image:url('images/howorks.jpg'); margin-top:-177px; margin-left: -85px; margin-right: -75px; height:400px;"><br>
<h2 style="text-align: center; ">How it works</h2><br>
<div class="row">
	<div class="col-md-3">&emsp;&emsp;&emsp;&emsp;
     <img src="{{ url('images/select.png')}}" height="140" width="140"/>
     </div>
     <div class="col-md-3">&emsp;&emsp;&emsp;&emsp;
     <img src="{{ url('images/confirm.png')}}" height="70" width="70"/>
     </div>
     <div class="col-md-3">&emsp;&emsp;&emsp;&emsp;
     <img src="{{ url('images/pay.png')}}" height="100" width="100"/>
     </div>
     <div class="col-md-3">&emsp;&emsp;&emsp;&emsp;
     <img src="{{ url('images/receive.jpg')}}" height="100" width="100"/>
     </div>
</div>
<div class="row">
	<div class="col-md-3">
		<h4>&emsp;&emsp;&emsp;&emsp;<b>SELECT</b></h4>
	</div>
	<div class="col-md-3">
		<h4>&emsp;&emsp;<b>CONFIRM</b></h4>
	</div>
	<div class="col-md-3">
		<h4>&emsp;&emsp;&emsp;&emsp;<b>PAY</b></h4>
	</div>
	<div class="col-md-3">
		<h4>&emsp;&emsp;&emsp;&emsp;<b>RECEIVE</b></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<p>&emsp;Search meal & select your preferred &emsp;ingredients on KwanzaTukule.com.</p>
	</div>
	<div class="col-md-3">
		<p>Confirm your contact and delivery address details.</p>
	</div>
	<div class="col-md-3">
		<p>Make your payments with ease using &emsp;M-pesa.</p>
	</div>
	<div class="col-md-3">
		<p>Receive your package in the shortest time possible.</p>
	</div>
</div>
</div>
<div>
<br>
<h2 style="text-align: center; ">Kwanza Tukule Benefits</h2>
<p style="text-align: center;">At Kwanza Tukule we enable you to have ready a healthy meal made to your own liking in a timely way. Make your order today!</p>
<div class="row">
            <div class="col-md-6">
                <div class="jumbotron">
                	<div class="row">
                	<div class="col-md-7">
                	<h6><b>1. Wide Variety of Meals</b></h6>
                	<p>Select your meal from a wide variety and in each meal select your most preferred ingredients for preparing that meal.</p>
                	</div>
                	<div class="col-md-5">
                         <img src="{{ url('images/widevariety.png')}}" height="150" width="150"/>
                	</div>
                	</div>
                </div>
            </div>  
             <div class="col-md-6">
                <div class="jumbotron">
                	<div class="row">
                	<div class="col-md-7">
                	<h6><b>2. Enjoy Convenience</b></h6>
                	<p>Order your meal at any time of the day and get it delivered at your most preferred location. Make your payments wherever your are using mobile money.</p>
                	</div>
                	<div class="col-md-5">
                         <img src="{{ url('images/convenient.jpg')}}" height="150" width="150"/>
                	</div>
                	</div>
                </div>
            </div>    	
</div>  	
<div class="row">
            <div class="col-md-6">
                <div class="jumbotron">
                	<div class="row">
                	<div class="col-md-7">
                	<h6><b>3. Eat Healthy</b></h6>
                	<p>At the end of it all enjoy your healthy homemade meal.</p>
                	</div>
                	<div class="col-md-5">
                         <img src="{{ url('images/healthy.jpg')}}" height="150" width="150"/>
                	</div>
                	</div>
                </div>
            </div>  
             <div class="col-md-6">
                <div class="jumbotron">
                	<div class="row">
                	<div class="col-md-7">
                	<h6><b>4. Great Customer Care</b></h6>
                	<p>Great customer care offered by Kwanza Tukule from 8:00 am - 5.00pm.</p>
                	</div>
                	<div class="col-md-5">
                         <img src="{{ url('images/customercare.jpg')}}" height="150" width="150"/>
                	</div>
                	</div>
                </div>
            </div>    	
</div>  	
</div>
<div>
<br>
<h2 style="text-align: center; ">Partnering with</h2>
<div style="text-align: center; ">
 <img src="{{ url('images/mmm.jpg')}}" height="100" width="150"/>
  <img src="{{ url('images/kfm.jpg')}}" height="100" width="150"/>
   <img src="{{ url('images/chandaria.jpg')}}" height="100" width="150"/>
   <img src="{{ url('images/kifaru.png')}}" height="110" width="140"/><br><br>
   </div>
</div>
<div style="background-color: #F5F5F5;">
<br>
<h2 style="text-align: center; ">Need More Information?</h2>
<div style="text-align: center; ">
	Talk to us. Call <b>+254 757 427 227</b> or email <b>info@Kwanzatukule.com</b><br><br>
	<a class="btn btn-success btn-lg" href="/contact" role="button"><b><i class="fa fa-phone"></i> Contact Us</b></a><br><br>
</div>
</div>
 <br><br>
@endsection    