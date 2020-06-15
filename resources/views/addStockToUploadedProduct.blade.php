@extends('layouts.app')

@section('content')

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <title>Sumbit Product</title >
    </head>
    <body>
      <h2>Information about the product you just uploaded: </h2>
      <br/>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Code</th>
                <th scope="col">Product Image</th>
              </tr>
            </thead>
            
            <tbody>
                <tr>
                  <th> {{ $validData['name'] }}</th>
                  <th> {{ $validData['code'] }} </th>
                  <th>
                    <?php
                        $target_dir = "uploads/temp/products/";
                        $target_name = "latest_uploaded_product";
                        $path = $target_dir.$target_name;
                        
                        $imageBLOB = $validData['image_one'];

                        $file = fopen($path, "w");
                        fwrite($file, base64_decode($imageBLOB));
                    ?>.
                  <th> <img src="{{ asset('uploads/temp/products/'.$target_name)}}" alt="Image" width="250px" height="250px"> </th>
                
                </tr>
            </tbody>
        </table>

    </body>
</html>
@endsection
