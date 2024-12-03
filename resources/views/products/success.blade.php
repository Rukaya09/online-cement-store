@extends('layouts.app') <!-- Assuming your layout file is named app.blade.php -->
@section('content')
<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{asset('assets/img/bg-header.jpg')}}');">
                <div class="container">
                    <h1 class="pt-5" style="color:white">
                        you paid with Paypal successfully
                    </h1>
                    <a class="btn btn-primary" href="http://127.0.0.1:8000/home">Go to Home</a>

                        go home
                   </a>
                </div>
            </div>
        </div>
    </div>
    @endsection