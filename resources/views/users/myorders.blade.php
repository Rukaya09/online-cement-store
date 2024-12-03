@extends('layouts.app') <!-- Assuming your layout file is named app.blade.php -->
@section('content')
<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{asset('assets/img/bg-header.jpg')}}');">
                <div class="container">
                    <h1 class="pt-5">
                        Your Transactions
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>last_name</th>
                                        <th>address</th>
                                        <th>phone number</th>
                                        <th>Email</th>
                                        <th>Town</th>
                                        <th>Status</th>
                                        <th>Zip code</th>
                                        <th>Order notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($orders->count()>0)
                                    @foreach ($orders as $order)
                                    <tr>
                                    <td width="5%"></td>

                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->last_name}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->phone_number}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->town}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->zip_code}}</td>
                                        <td>{{$order->order_notes}}</td>


                                    </tr>
                                    @endforeach
                                    @else
                                    <p class="alert alert-success">you have no orders right now</p>
                                    @endif
 
                                </tbody>
                            </table>
                        </div>

                      
                    </div>
                </div>
            </div>
        </section>

       
    </div>
    @endsection