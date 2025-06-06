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
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Orders</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">first name</th>
                <th scope="col">last name</th>
                <th scope="col">email</th>
                <th scope="col">country</th>
                <th scope="col">status</th>
                <th scope="col">price in USD</th>
                <th scope="col">date</th>
                <th scope="col">update</th>
              </tr>
            </thead>
            <tbody>
             @foreach($allorders as $order)
              <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->last_name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->state}}</td>
                <td>
                @if($order->status == 'processing')
                       <button class="btn btn-warning">{{$order->status}}</button>
                 @elseif($order->status == 'delivered')
                  <button class="btn btn-success">{{$order->status}}</button>
               @endif
                </td>
                <td>{{$order->price}}</td>
                <td>{{$order->created_at}}</td>                
                <td>                
                    <a href="{{route('orders.edit',$order->id)}}" class="btn btn-warning text-white mb-4 text-center">update status</a>
                </td>
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