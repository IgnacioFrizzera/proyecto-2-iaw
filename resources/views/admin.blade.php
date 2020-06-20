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
                                    <a href="{{ url('/admin/addProducts') }}">Add product</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ url('/admin/showStock') }}">View current stock</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ url('/admin/modifyProduct') }}">Modify a product</a>
                                @endauth
                            </div>
                            <div class="button">
                                @auth
                                    <a href="{{ url('/admin/deleteProduct') }}">Delete a product</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection