@extends('main')
@section('title',' | Completion')
@section('content')
<br>
<h1>Payment Confirmed</h1>
<br><br>
<div class="row">
    <p>Transaction complete. Your order is now being processed and will be dispatched for delivery in the next one hour.</p><br>
    <p>Thank you very much {{ Auth::user()->name }} for choosing Kwanza Tukule.</p>
</div>        
 <br><br><br><br><br><br><br><br><br><br>       
<a class="btn btn-success btn-lg" href="/" role="button">Done</a><br><br>
@endsection 