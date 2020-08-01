@extends('layouts.app')

@section('content')
<html>
    <div class="container">
        @if(isset($message))
            <h2>{{$message}}</h2>
        @endif
      @if(isset($storeTotalSalesHistory))
            <h1>Sales history</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Purchase ID</th>
                    <th scope="col">Buyer's email</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product code</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Product size</th>
                    <th scope="col">Purchase date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($storeTotalSalesHistory as $value)
                        <tr>
                            <td> {{$value->id}} </td>
                            <td> {{$value->email}} </td>
                            <td> {{$value->name}} </td>
                            <td> {{$value->product_code}} </td>
                            <td> ${{$value->price}} </td>
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