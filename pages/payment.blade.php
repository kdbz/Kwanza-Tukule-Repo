@extends('main')
@section('title',' | Billing')
@section('content')
<br>
<h1>Order Billing</h1>
<br><br>
<div class="row">
    <div class="col-md-6">
        <p>Payment for meal package :</p><br>
    </div>  
    <div class="col-md-6">  
        <p>Your details : Name : {{ $user->name }}</p>
        <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Number : {{ $user->number }}</p>
        <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Pickup location : {{ $place->delivery_location }}</p>
        <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Package Cost : {{ $billing->totals }} Ksh.</p>
        <br>
    </div>    
</div>        
        <p>Payment will be done via Mpesa buy goods and services. You will receive a payment confirmation message on your mobile phone on payment. Please confirm to complete order process.</p><br>
<a class="btn btn-success btn-lg" href="/payment" role="button">Pay <i class="fa fa-credit-card"></i></a><br><br>
@endsection 