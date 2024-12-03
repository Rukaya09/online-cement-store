@extends('layouts.app') <!-- Assuming your layout file is named app.blade.php -->

@section('content')
@vite('resources/css/style.css') <!-- This will include your bundled CSS -->
<style>
    


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
<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Shopping Page
                    </h1>
                    <p class="lead">
                        Save time and leave the cement to us.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-categories owl-carousel mt-5">
                        @foreach($categories as $category)
                        <div class="item">
                            <a href="{{route('single.category',$category->id)}}">
                                <div class="media d-flex align-items-center justify-content-center">
                                <!-- <i class="sb-bistro-{{$category->icon}}"></i> -->
                                <i class="bi bi-bag-fill"></i>
                                    <span class="d-flex mr-2"> <i class="bi bi-bag-fill"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5>{{$category->name}}</h5>
                                        <p>
                                        Building Strong Foundations for a Better Future
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
    
                    </div>
                </div>
            </div>
        </div>

        <section id="most-wanted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Most Wanted</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($mostwanted as $most)
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
                                        <img src="{{asset('assets/img/'.$most->image)}}" alt="Card image 2" class="card-img-top"style="height:220px">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$most->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">Rp. 300.000</span><br>
                                            <span class="reguler">{{$most->price}}</span>
                                        </div>
                                       
                                        <a href="{{route('single.product',$most->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="vegetables" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">H.k Cements</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($vegetables as $vegetable)
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
                                        <img src="{{asset('assets/img/'.$vegetable->image)}}" alt="Card image 2" class="card-img-top"style="height:200px">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$vegetable->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">Rp. 300.000</span>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                        <a href="{{route('single.product',$vegetable->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="meats">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">TCI Cements</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($frozenfoods as $frozenfood)
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
                                        <img src="{{asset('assets/img/'.$frozenfood->image)}}" alt="Card image 2" class="card-img-top"style="height:200px">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$frozenfood->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">Rp. 300.000</span><br>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                        <a href="{{route('single.product',$frozenfood->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="meats">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Khyber</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($meat as $meats)
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
                                        <img src="{{asset('assets/img/'.$meats->image)}}" alt="Card image 2" class="card-img-top"style="height:200px">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$meats->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">Rp. 300.000</span><br>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                        <a href="{{route('single.product',$meats->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="fishes" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Ambuja Cements</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($fishes as $fish)
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
                                        <img src="{{asset('assets/img/'.$fish->image)}}" alt="Card image 2" class="card-img-top"style="200px">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$fish->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">{{$fish->price}}</span><br>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                    
                                        <a href="{{route('single.product',$fish->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
                                </div>
                            </div>
                            
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fruits">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Arco Cement</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($fruits as $fruit)
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
                                        <img src="{{asset('assets/img/'.$fruit->image)}}" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$fruit->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">{{$fruit->price}}</span><br>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                     
                                        <a href="{{route('single.product',$fruit->id)}}" class="btn btn-block btn-primary">
                                            Product Details
                                        </a>

                                    </div>
                                </div>
                            </div>
                            
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection