@extends('layouts.app')

@section('content')
<html>
    <div class="container">
        @if(isset($message))
            <h2>{{$message}}</h2>
            <button type="button">
                 @auth
                    <a href="{{ url('/') }}"><h4>Start browsing!</h4></a>
                @endauth
            </button>
        @endif
      @if(isset($userPurchaseHistory))
            <h1>Purchases history</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Purchase ID</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Product size</th>
                    <th scope="col">Purchase date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userPurchaseHistory as $value)
                        <tr>
                            <td> {{$value->id}} </td>
                            <td> {{$value->product_name}} </td>
                            <td> ${{$value->product_price}} </td>
                            <td> {{$value->product_size}} </td>
                            <td> {{$value->created_at}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</html>
@endsection