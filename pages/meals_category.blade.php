@extends('main')
@section('title'," | $categories->category_name ")
@section('content')
<br>
<h1>{{ $categories->category_name }}</h1>
<br>
<div class="row">
         <div class="col-md-12">
             <table class="table table-striped">
                  <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach($categories->meals as $meal)
                    <tr>
                      <th>{{ $meal->id }}</th>
                      <td>{{ $meal->meal_name }}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <form method="POST" action="/mealsSelect">{{ csrf_field() }}
                      <td><button  href="/mealsSelect" name="meal" value="{{ $meal->meal_name }}" class="btn btn-light btn-sm">Select</button></td>
                      </form>
                    </tr>
                    @endforeach
                  </tbody>
             </table>
         </div> 
     </div>
@endsection    