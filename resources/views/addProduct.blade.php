@extends('layouts.app')

@section('content')
<html>
    <head>
        <title>Sumbit Product</title >
    </head>
    <body>
        <div class="container">
            <h1>Fullfill the following fields to load a product into server storage</h1>
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
            <form action="/admin" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="container">
                                <h2>Product general information</h2>
                                Product Name <input type="text" name="name">
                                <br><br>
                                Product Brand <input type="text" name="brand">
                                <br><br>
                                Product Code <input type="text" name="code">
                                <br><br>
                                Product Description <input type="text" name="description">
                                <br><br>
                                Product Price <input type="number" step="any" min="0" name="price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2>Product images</h2>
                            <p>At least one image has to be uploaded.</p>
                            Product First Image <input type="file" name="image_one">
                            <br><br>
                            Product Second Image <input type="file" name="image_two">
                            <br><br>
                            Product Third Image <input type="file" name="image_three">
                        </div>
                        <div class="col-md-4">
                            <div class="container">
                                <h2>Product sizes</h2>
                                S size stock <input type="number" min="0" name="s_stock">
                                <br><br>
                                M size stock <input type="number" step="any" min="0" name="m_stock">
                                <br><br>
                                L size stock <input type="number" step="any" min="0" name="l_stock">
                                <br><br>
                                XL size stock <input type="number" step="any" min="0" name="xl_stock"> 
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit">Load product</button>
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
