@extends('layouts.app') <!-- Assuming your layout file is named app.blade.php -->
@section('content')
<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{asset('assets/img/bg-header.jpg')}}');">
                <div class="container">
                    <h1 class="pt-5" style="color:white">
                        Pay With Paypal
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=ATBiZ6JZkoaD-Yy3252xw9Hs8uE657kaVeQc9IKc6Ox5TzHLAwjxwxa2Im3zOKaG6cKdElufBmXWlFcf&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '{{Session::get('value')}}' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='http://127.0.0.1:8000/products/success';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>


        
</div>


@endsection