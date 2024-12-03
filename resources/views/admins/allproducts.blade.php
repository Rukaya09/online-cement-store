@extends('layouts.admin')
@section('content')
         @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('update'))
            <div class="alert alert-success">{{ session('update') }}</div>
        @endif
        @if(session('delete'))
            <div class="alert alert-success">{{ session('delete') }}</div>
        @endif
        <div class="container-fluid">

<div class="row">
<div class="col">
<div class="card">
  <div class="card-body">
    <h5 class="card-title mb-4 d-inline">Products</h5>
    <a  href="{{route('products.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
  
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">product</th>
          <th scope="col">price in $$</th>
          <th scope="col">expiration date</th>
          <th scope="col">status</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($allproducts as $products)
        <tr>
          <th scope="row">{{$products->id}}</th>
          <td>{{$products->name}}</td>
          <td>{{$products->price}}</td>
          <td>{{$products->exp_date}}</td>
           <td><a href="{{route('products.delete',$products->id)}}" class="btn btn-danger  text-center ">delete</a></td>
        </tr>
        @endforeach
    
        
      </tbody>
    </table> 
  </div>
</div>
</div>
</div>
</div>
@endsection