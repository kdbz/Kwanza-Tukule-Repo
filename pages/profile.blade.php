@extends('main')
@section('title',' | Profile')
@section('content')
<div class="container-fluid" style="background-color:orange;text-align:center;margin-top:-30px">
<h3>User Profile</h3>
<h5>Username: {{ Auth::user()->name }} <br>
Email: {{ Auth::user()->email }}<br>
Phone Number: {{ Auth::user()->number }} 
  </h5>

</div>
<div class="container" style="background-color:#D5E6F1;text-align:center;">
<div class="row">
    <div class="col-md-6">
    <h4><b>Recent Order Dates</b></h4>
    @foreach($orders as $order)
                <p> {{ $order->created_at}}</p>
                @endforeach 
    </div>  
    <div class="col-md-6">
    <h4><b>Delivery Address</b></h4>
     @foreach($orders as $order)
          <p>{{ $order->delivery_location}}</p>
           @endforeach 
    </div>   
  </div>
</div>
</div>         
@endsection 