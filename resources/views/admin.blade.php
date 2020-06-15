@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Panel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Admin has logged in.
                </div>
                <div class="container">
                    <div class="button">
                        @auth
                            <a href="{{ url('/admin/addProducts') }}">Add products</a>
                        @endauth
                    </div>
                    <div class="button">
                        @auth
                            <a href="{{ url('/admin/showStock') }}">View all the stock</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection