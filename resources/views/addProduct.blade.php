<html>
    <head>
        <title>Sumbit Product</title >
    </head>
    <body>
        <div class="container">
            <p>Fullfill the following fields to load a product into server storage.</p>
            <br>
            <form action="/admin/productInfo" method="POST">
                Product Name <input type="text" name="ProductName">
                @csrf
                <br><br>
                Product Brand <input type="text" name="ProductBrand">
                @csrf
                <br><br>
                Product Code <input type="text" name="ProductCode">
                @csrf
                <br><br>
                Product Description <input type="text" name="ProductDescription">
                @csrf
                <br><br>
                Product Price <input type="number" step="any" min="0" name="ProductPrice">
                @csrf
                <p>Not all image fields need to be fullfilled.</p>
                <br>
                Product First Image <input type="image" name="ProductFirstImage">
                @csrf
                <br><br>
                Product Second Image <input type="image" name="ProductSecondImage">
                @csrf
                <br><br>
                Product Third Image <input type="image" name="ProductThirdImage">
                @csrf
                <br><br>
                <button type="submit">Load product</button>
            </form>
        </div>
    </body>
</html>