@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/displayProducts.css') }}">

@section('content')

    <html>
        <body>
            <div class="container">
                    @if(isset($searchedProducts))
                        <div class="row">
                            @foreach($searchedProducts as $value)
                                <form action="/purchaseProduct" method="GET">
                                        <div class="card">
                                            <img src="{{ asset('uploads/temp/products/'.$value->code)}}" alt="Image" width="250px" height="250px">
                                            <h1> {{$value->name}} </h1>
                                            <p class="price"> ${{ $value->price }} </p>
                                            <p>{{ $value->description }}</p>
                                            <input type="hidden" name="code" value = {{$value->code}} >
                                            <p> <button type="sumbit">Purchase product</button> </p>
                                        </div> 
                                </form>
                            @endforeach
                            <div class="container">
                                <?php 
                                    echo $searchedProducts->appends(Request::all())->links();
                                ?>
                            </div>
                        </div> 
                    @endif
            </div>
        </body>
    </html>
@endsection