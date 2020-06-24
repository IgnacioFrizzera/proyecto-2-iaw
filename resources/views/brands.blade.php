@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/views/brands.css') }}">

@section('content')
    <html>
        <body>
            <div class="container">
                @if(isset($message))
                    <div class="container">
                        <h1>{{$message}}</h1>
                    </div>
                @endif
                @if(isset($shopBrands))
                    <h1 class="title">Our brands</h1>
                    <div class="row">
                        @foreach ($shopBrands as $value)
                            <div class="col-lg-3 col-sm-4" style="padding-bottom: 16px">
                                <form action=" {{ route('search-products-by-brand') }} " method="GET">
                                    <input type="hidden" name="brand" value={{$value->brand}}>
                                    <button type="submit" class="button1">{{$value->brand}}</a>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </body>
    </html>
@endsection