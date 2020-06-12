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
                  <th> <img src="{{ asset('uploads/products/' . $validData['image_one'])}}" alt="Image"> </th>
                </tr>
            </tbody>
        </table>

    </body>
</html>