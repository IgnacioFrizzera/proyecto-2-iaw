@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/views/about.css') }}">

<!-- Font Awesome Brand Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
    <html>
        <body>
            <h1 id="title">My Generic Online Shop</h1>
            <div class="container">
                <div class="container" id="p_cont">
                    <p>
                        My Generic Online Shop or MyGOS is a fresh project made by <a href="https://github.com/IgnacioFrizzera" target="_blank">Ignacio Frizzera</a>.
                        The main focus of it was to learn the <a href="https://laravel.com/" target="_blank">Laravel</a> framework and make a web application with it.
                        Personally I made an 'e-commerce' type page so that in the future I could use this project as a palette to make multiple e-commerce pages for different users in little time.
                    </p>
                    <div class="container">
                        <h3>Things you can do as an user:</h3>
                        <li>Browse for products</li>
                        <li>View the brands our page has to offer and see the products that belong to each brand</li>
                        <li>View your purchases history from the dashboard</li>
                        <li>Purchase products (payment mechanism has to be implemented)</li>
                        <br>
                        <h3>Things you <strong>WILL</strong> be able to do as an user:</h3>
                        <li>Customize your profile (set an avatar, preferences, etc.)</li>
                        <li>Refound a purchase</li>
                        <li>Save payment methods (<strong>e.g</strong>, credit card info)</li>
                        <li>Charge money into a wallet</li>
                        <li>Search by category (<strong>e.g</strong>, by hoodies)</li>
                        <li>Support services</li>
                    </div>
                    <br>
                    <p>
                        All the buttons animations in the <a href="{{ route('brands') }}">'Our Brands'</a> section are made by <a href="https://fdossena.com/?p=home.frag" target="_blank">Federico Dossena</a>. Be sure to check his web page to see more of his work.
                    </p>
                    <br>                    
                </div>
            </div>
            <footer class="page-footer font-small indigo">
                <div class="container">
                    <h2 id="title">Contact links</h2>
                    <div class="row text-center d-flex justify-content-center pt-5 mb-3">
                        <div class="col-md-2 mb-3">
                            <a href="https://github.com/IgnacioFrizzera" target="_blank">
                                <i class="fa fa-github" style="font-size:36px"></i>
                            </a>
                        </div>
                        <div class="col-md-2 mb-3">
                            <a href="mailto: ignaciofrizzera@gmail.com">
                                <i class="fa fa-envelope-o" style="font-size:36px"></i>
                            </a>
                        </div>
                        <div class="col-md-2 mb-3">
                            <a href="https://www.linkedin.com/in/ignacio-frizzera-1a94ab195/" target="_blank">
                                <i class="fa fa-linkedin" style="font-size:36px"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </body>
    </html>
@endsection