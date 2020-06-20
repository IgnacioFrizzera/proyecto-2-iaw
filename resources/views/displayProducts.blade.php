@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/displayProducts.css') }}">

@section('content')
    <html>
        <body>
            @if(isset($searchedProducts))
                <div class="container">
                    <div class="row">
                        @foreach($searchedProducts as $value)
                            <form action="/purchaseProduct" method="GET">
                                <div class="column">
                                    <div class="card">
                                        <img src="{{ asset('uploads/temp/products/'.$value->code)}}" alt="Image" width="250px" height="250px">
                                        <h1> {{$value->name}} </h1>
                                        <p class="price"> ${{ $value->price }} </p>
                                        <p>{{ $value->description }}</p>
                                        <input type="hidden" name="code" value = {{$value->code}} >
                                        <p> <button type="sumbit">Purchase product</button> </p>
                                    </div>
                                </div> 
                            </form>
                        @endforeach
                    </div>
                </div>
                <div class="footer">
                    <?php 
                        echo $searchedProducts->appends(Request::all())->links();
                    ?>
                </div> 
            @endif
        </body>
    </html>
@endsection