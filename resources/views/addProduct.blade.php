@extends('layouts.app')

@section('content')
<html>
    <head>
        <title>Sumbit Product</title >
    </head>
    <body>
        <div class="container">
            <h1>Fullfill the following fields to load a product</h1>
            <br>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                Some data you tried to upload might be invalid! Try again.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif
            <form action="/admin-dashboard-after-uploaded-product" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="container">
                                <h2>Product general information</h2>
                                <input type="text" name="name" placeholder="Product name">
                                <br><br>
                                <input type="text" name="brand" placeholder="Product brand">
                                <br><br>
                                <input type="text" name="code" placeholder="Product code">
                                <br><br>
                                <input type="text" name="description" placeholder="Product description">
                                <br><br>
                                <input type="number" step="any" min="0" name="price" placeholder="Product price">
                                <br><br>
                                <button type="submit">Load product</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2>Product image</h2>
                            <input type="file" name="image">
                        </div>
                        <div class="col-md-4">
                            <div class="container">
                                <h2>Product sizes</h2>
                                <input type="number" min="0" name="s_stock" placeholder="S size amount">
                                <br><br>
                                <input type="number" step="any" min="0" name="m_stock" placeholder="M size amount">
                                <br><br>
                                <input type="number" step="any" min="0" name="l_stock" placeholder="L size amount">
                                <br><br>
                                <input type="number" step="any" min="0" name="xl_stock" placeholder="XL size amount"> 
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
            </form>
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </body>
</html>
@endsection
