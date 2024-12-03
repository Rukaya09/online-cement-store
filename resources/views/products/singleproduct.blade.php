@extends('layouts.app') <!-- Assuming your layout file is named app.blade.php -->

@section('content')
<div id="page-content" class="page-content">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{asset('assets/img/bg-header.jpg')}}');background-repeat: no-repeat; ">
                <div class="container">
                    <h1 class="pt-5">
                        {{$product->name}}
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="slider-zoom">
                            <a href="assets/img/meats.jpg" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                                <img alt="Detail Zoom thumbs image" src="{{asset('assets/img/'.$product->image)}}" style="width: 100%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            <strong>Overview</strong><br>
                            <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
                            {{$product->description}}
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <strong>Price</strong> (/Pack)<br>
                                    <span class="price">{{$product->price}}</span>
                                    <span class="old-price">Rp 150.000</span>
                                </p>
                            </div>
                           
                        </div>
                        <p class="mb-1">
                            <strong>Quantity</strong>
                        </p>
                        <form method="POST" action="{{ route('products.add.cart') }}" class="action">
                        @csrf <!-- Add CSRF token for security -->

                        <div class="row">
                            <div class="col-sm-5">
                                <input name="qty" class="form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="1" name="vertical-spin">
                            </div>
                            <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (1000 gram)</span></div>
                        </div>
                        <input name="name" value="{{$product->name}}" type="hidden">
                        <input name="price" value="{{$product->price}}" type="hidden">
                        <input name="pro_id" value="{{$product->id}}" type="hidden">
                        <input name="image" value="{{$product->image}}" type="hidden">
                        @if (isset(auth::user()->id))
                        @if($checkInCart > 0)
                           <button type="submit" name="submit"class="mt-3 btn btn-primary btn-lg">
                               <i class="fa fa-shopping-basket"></i> Added to Cart
                            </button>
                        @else
                              <button type="submit" name="submit"class="mt-3 btn btn-primary btn-lg">
                                  <i class="fa fa-shopping-basket"></i> Add to Cart
                                 </button>

                        @endif
                        @else
                        <p class="alert alert-success mt-5">Login to add the products to cart</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
</form>
        <section id="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Related Products</h2>
                        <div class="product-carousel owl-carousel">
                        @if($relatedProducts->count()>0)

                            @foreach($relatedProducts as $relatedProduct)
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until 2018
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="{{asset('assets/img/'.$product->image)}}" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$relatedProduct->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">{{$relatedProduct->price}}</span>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                        <a href="{{route('single.product',$product->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
                                </div>
                             @endforeach
                            </div>
                           
                            @else
                    <p class="alert alert-success"> There is no products in this category just now</p>
                       @endif
                      
                    </div>
                </div>
            </div>
        </section>
    </div>




@endsection