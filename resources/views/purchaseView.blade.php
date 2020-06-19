@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/displayProducts.css') }}">

@section('content')
    <html>
        <body>
            <div class="container">
                @if(isset($productStock))
                    @foreach ($productStock as $stock)
                        @foreach ($productInfo as $info)
                                {{ csrf_field() }}
                                <div class="card">
                                    <img src="{{ asset('uploads/temp/products/'.$productCode)}}" alt="Image" width="250px" height="250px">
                                    <h1> {{$info->name}} </h1>
                                    <p class="price"> ${{ $info->price }} </p>
                                    <div class="col-sm">
                                        <form action="/finish-purchase" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <input type="hidden" value= "s" name="size">
                                                <input type="hidden" value= {{$stock->s_stock}} id="s_stock">
                                                <input type="hidden" value= {{$productCode}} name="code">
                                                <button id="s_button">Purchase S size ({{$stock->s_stock}} left)</button>
                                            </div>
                                        </form>
                                        <form action="/finish-purchase" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <input type="hidden" value= "m" name="size">
                                                <input type="hidden" value= {{$stock->m_stock}} id="m_stock">
                                                <input type="hidden" value= {{$productCode}} name="code">
                                                <button id="m_button">Purchase M size ({{$stock->m_stock}} left)</button>
                                            </div>
                                        </form>
                                        <form action="/finish-purchase" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <input type="hidden" value= "l" name="size">
                                                <input type="hidden" value= {{$stock->l_stock}} id="l_stock">
                                                <input type="hidden" value= {{$productCode}} name="code">
                                                <button id="l_button">Purchase L size ({{$stock->l_stock}} left) </button>
                                            </div>
                                        </form>
                                        <form action="/finish-purchase" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <input type="hidden" value= "xl" name="size">
                                                <input type="hidden" value= {{$stock->xl_stock}} id="xl_stock">
                                                <input type="hidden" value= {{$productCode}} name="code">
                                                <button id="xl_button">Purchase XL size ({{$stock->xl_stock}} left)</button>
                                            </div>
                                        </form>
                                    </div> 
                                </div> 
                            </form>
                        @endforeach
                    @endforeach
                @endif
            </div>
            <script src="{{ asset('js/views/purchaseView.js')}}"></script>
            @if(isset($message))
                <div class="container">
                    <h2>{{$message}}</h2>
                    Continue browsing other products !button to browse here!
                </div>
            @endif
        </body>
    </html>
@endsection
