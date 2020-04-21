@extends('main')
@section('title',' | Homepage')
@section('content')
<h2>Select the category for the meal you would like to order</h2><br>
        <div class="row">
@foreach($data as $category)
                    <div class="col-md-4">
                      <form method="POST" action="{{url('search')}}">{{ csrf_field() }}&emsp;&emsp;&emsp;
                     <button name="category_name" value="{{ $category->category_name }}" class="btn btn-light btn-lg" style="width: 220px; height: 150px;">{{ $category->category_name }}<br> <img src="{{ asset('images/' . $category->image)}}" height="80" width="80"/>     </button><br>
                    <br>
                      </form>
                        </div>  
                    @endforeach 
                     </div>
@endsection    