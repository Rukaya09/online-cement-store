@extends('layouts.app')
@section('content')
<div id="page-content" class="page-content">
        <div class="banner">

            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{asset('assets/img/bg-header.jpg')}}');">
                <div class="container">
                    <h1 class="pt-5">
                        Your Cart
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
        @if(session('delete'))
            <div class="alert alert-success">{{ session('delete') }}</div>
      @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%"></th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th width="15%">Quantity</th>
                                        <th width="15%">Update</th>
                                        <th>Subtotal</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartProducts as $product)
                                    <tr>
                                        <td>
                                            <img src="{{asset('assets/img/'.$product->image)}}" width="60">
                                        </td>
                                        <td>
                                            {{$product->name}}<br>
                                            <small>1000g</small>
                                        </td>
                                        <td>
                                           RS{{$product->price}}
                                        </td>
                                        <td>
                                           {{$product->qty}}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary">UPDATE</a>
                                        </td>
                                        <td>
                                        RS{{$product->price * $product->qty}}
                                        </td>
                                        <td>
                                        <a href="{{ route('products.delete-cart', $product->id) }}" class="text-danger">
    <i class="fa fa-times"></i>
</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{route('products.shop')}}" class="btn btn-default">Continue Shopping</a>
                    </div>
                    <div class="col text-right">

                        <div class="clearfix"></div>
                        <h6 class="mt-3">Total: Rs/ {{$subtotal}}</h6>
                        @if($subtotal > 0)
                        <form  method="POST"  action="{{route('products.prepare-checkout')}}" class="action">
                            @csrf
                            <input name="price"value="{{$subtotal}}"type="hidden">
                            <button type="submit" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></button>
                        </form>
                        @else
                        <p class="alert alert-success"> you have no products in cart you can't checkout yet</p>
                        @endif
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
