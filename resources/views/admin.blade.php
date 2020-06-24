@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="container">
                        @if(isset($message))
                            <div class="container">
                                <h2>{{$message}}</h2>
                            </div>
                        @endif
                        <div class="container">
                            <div class="button">
                                @auth
                                    <a href=" {{ route('add-product') }}">Add product</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ route('show-stock') }}">View current stock</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ route('modify') }}">Modify a product</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ route('delete') }}">Delete a product</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ route('show-purchase-history') }}">View purchases history</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ route('show-sales') }}">View shop total sales history</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection