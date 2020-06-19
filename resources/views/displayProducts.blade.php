@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/displayProducts.css') }}">

@section('content')

    <html>
        <body>
            <div class="container">
                <div class="container-fluid">
                    @if(isset($searchedProducts))
                        <div class="row">
                            <?php foreach($searchedProducts AS $value):?>
                                <form action="/purchaseProduct" method="GET">
                                        <div class="card">
                                            <?php $target_name = $value->name.$value->code; ?>
                                            <img src="{{ asset('uploads/temp/products/'.$target_name)}}" alt="Image" width="250px" height="250px">
                                            <h1>Tailored Jeans</h1>
                                            <p class="price"> ${{ $value->price }} </p>
                                            <p>{{ $value->description }}</p>
                                            <input type="hidden" name="code" value = {{$value->code}} >
                                            <p> <button type="sumbit">Purchase product</button> </p>
                                        </div> 
                                </form>
                            <?php endforeach;?>
                            <div class="container">
                                <?php 
                                    echo $searchedProducts->appends(Request::all())->links();
                                ?>
                            </div>
                        </div> 
                    @endif
                </div>
            </div>
        </body>
    </html>
@endsection