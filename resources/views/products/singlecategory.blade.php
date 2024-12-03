@extends('layouts.app') <!-- Assuming your layout file is named app.blade.php -->

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('assets/img/bg-header.jpg') }}');>
                <div class="container">
                    <h1 class="pt-5">
                        Shopping Page
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
 
 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-categories owl-carousel mt-5">
                        <div class="item">
                            <a href="shop.html">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="fa fa-shopping-bag"></i></span>
                                    <div class="media-body">
                                        <h5>Hk</h5>
                                        <p>HK Cement might refer to a variety of companies or products related to cement production</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="shop.html">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="fa fa-shopping-bag"></i></span>
                                    <div class="media-body">
                                        <h5>Khyber</h5>
                                        <p>Khyber Cement is a prominent cement brand  widely recognized for producing high-quality cement products </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="shop.html">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="fas fa-shopping-bag"></i></span>
                                    <div class="media-body">
                                        <h5>Ambuja</h5>
                                        <p>Ambuja Cement is a prominent cement brand  widely recognized for producing high-quality cement products </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="shop.html">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="fas fa-shopping-bag"></i></span>
                                    <div class="media-body">
                                        <h5>Tci Max</h5>
                                        <p>The company typically offers various types of cement, including those for general construction, specialized projects</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    
                        <div class="item">
                            <a href="shop.html">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="fas fa-utensils"></i></span>
                                    <div class="media-body">
                                        <h5>Packages</h5>
                                        <p>Protein Rich Ingridients From Local Farmers</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>




.card {
            position: relative;
            display: inline-block; /* Adjust as needed */
            padding: 20px; /* Space for the content */
            border: 1px solid #ccc; /* Card border */
            background: #fff; /* Card background color */
            margin: 20px; /* Space around the card */
            border-radius: 5px; /* Optional: Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Optional: Shadow for depth */
        }

        .ribbon {
            position: absolute;
            top: 10px; /* Distance from the top */
            right: -15px; /* Distance from the right */
            background: #007bff; /* Example primary color */
            color: white;
            padding: 2px 5px; /* Adjust padding for smaller height */
            transform: rotate(45deg); /* Rotate to create ribbon effect */
            display: inline-block;
            font-size: 12px; /* Font size for the ribbon text */
            white-space: nowrap; /* Prevent line break */
            z-index: 10; /* Ensure it appears above other elements */
        }
        </style>
        <section id="most-wanted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Product Categories</h2>
                        @if($products->count()>0)
                        <div class="product-carousel owl-carousel">
                            @foreach ($products as $product)
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                        <img src="{{asset('assets/img/'.$product->image)}}" alt="Card image 2" class="card-img-top">
                                        <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-primary">
                                                {{$product->exp_date}}
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$product->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">{{$product->price}}</span><br>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                        <a href="{{route('single.product',$product->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
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
