<html>
    <head>
        <title>Sumbit Product</title >
    </head>
    <body>
        <div class="container">
            <p>Fullfill the following fields to load a product into server storage.</p>
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
            <form action="/admin/addStockToUploadedProduct" method="POST" enctype="multipart/form-data">
                Product Name <input type="text" name="name">
                @csrf
                <br><br>
                Product Brand <input type="text" name="brand">
                @csrf
                <br><br>
                Product Code <input type="text" name="code">
                @csrf
                <br><br>
                Product Description <input type="text" name="description">
                @csrf
                <br><br>
                Product Price <input type="number" step="any" min="0" name="price">
                @csrf
                <p>Not all image fields need to be fullfilled.</p>
                <br>
                Product First Image <input type="file" name="image_one">
                @csrf
                <br><br>
                Product Second Image <input type="file" name="image_two">
                @csrf
                <br><br>
                Product Third Image <input type="file" name="image_three">
                @csrf
                <br><br>
                <button type="submit">Load product</button>
            </form>
        </div>
    </body>
</html>