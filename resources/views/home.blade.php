@extends('layouts.app')

@section('content')
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-video text-center bg-dark mb-0 rounded-0 position-relative">
            <video width="100%" preload="auto" loop autoplay muted>
                <source src='assets/media/explore.mp4' type='video/mp4' />
                <source src='assets/media/explore.webm' type='video/webm' />
            </video>
            <div class="container video-text-overlay">
                <h1 class="pt-5"style="color:white">
                Save Time,<br>  Leave the Cement to Us.
                 
                </h1>
                <p class="lead"style="color:white">
                Always Strong, Always Reliable.
                </p>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center">
                            <div class="card-icon">
                                <div class="card-icon-i">
                                    <i class="fa fa-shopping-basket"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Buy</h4>
                                <p class="card-text"style="color:white">Simply click-to-buy on the product you want and submit your order when you're done.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center">
                            <div class="card-icon">
                                <div class="card-icon-i">
                                    <!-- <i class="fas fa-leaf"></i> -->
                                    <i class="fas fa-bag-shopping"></i>

                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Procure</h4>
                                <p class="card-text"style="color:white">
                                Procure: Our team ensures the cement is sourced from trusted manufacturers, meeting the required quality standards.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center">
                            <div class="card-icon">
                                <div class="card-icon-i">
                                    <i class="fa fa-truck"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Delivery</h4>
                                <p class="card-text"style="color:white">Your cement order is delivered directly to your construction site within 24 hours of placing the order. We ensure no wastage, and you get the exact quantity you ordered, with no delays. Our team coordinates with suppliers in advance, so the cement is ready for delivery as per your needs..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


       
<section id="why">
            <h2 class="title">Why Moon Light</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon2">
                                <div class="card-icon-i text-success">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                Straight from the Quarry to Your Build
                                </h4>
                                <p class="card-text"style="color:black">
                                Our cement comes directly from trusted local quarries, ensuring that you receive the freshest, high-quality material. By eliminating unnecessary delays in the supply chain, we ensure that every batch is as fresh as possible for your construction needs.
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon2">
                                <div class="card-icon-i text-success">
                                    <i class="fa fa-question"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                Know Your Suppliers
                                </h4>
                                <p class="card-text">
                                We believe in transparency, which is why we showcase detailed profiles of our trusted quarry partners. Each cement bag you purchase carries the story of the quarry that sourced it. Feel free to visit the quarries and see firsthand the care and effort that go into producing your building materials.                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon2">
                                <div class="card-icon-i text-success">
                                    <i class="fas fa-smile"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                Building Stronger Communities
                                 </h4>
                                <p class="card-text">
                                By streamlining the supply chain, we aim to improve the livelihoods of our quarry partners. Fair returns and direct relationships with suppliers ensure that everyone involved in the process is treated fairly, building a stronger, more sustainable construction community.                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5 text-center">
                        <a href="{{ route ('products.shop') }}" class="btn btn-primary btn-lg">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </section>


        <section id="categories" class="pb-0 gray-bg">
            <h2 class="title"> Cement Categories</h2>
            <div class="landing-categories owl-carousel">
                @foreach( $categories as $category)
                <div class="item">
                    <div class="card rounded-0 border-0 text-center">
                    <img src="{{ asset('assets/img/'.$category->image.'') }}" alt="Frozen Image"style="height:250px">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <!-- <h4 class="card-title">Vegetables</h4> -->
                            <a href="{{ route('single.category', $category->id) }}" class="btn btn-primary btn-lg">{{ $category->name}}</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

@endsection
