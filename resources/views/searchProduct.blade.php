@extends('layouts.app')

@section('content')
<html>
    <body>
        <div class="container">
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
           <div class="container">
                <form action="/admin/searchProduct" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h2>Search product by code</h2> <input type="text" name="code">
                    <button type="submit">Search product</button>                
                </form>
                <br>
           </div>
            @if(isset($searchedData))
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">S Stock</th>
                                <th scope="col">M Stock</th>
                                <th scope="col">L Stock</th>
                                <th scope="col">XL Stock</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($searchedData AS $key=>$value):?>
                            <tr>
                                <td><?php echo $value->name;?></td>
                                <td><?php echo $value->brand;?></td>
                                <td><?php echo $value->code;?></td>
                                <td><p><?php echo $value->description;?></p></td>
                                <td>$<?php echo $value->price;?></td>
                                <td><?php echo $value->s_stock;?></td>
                                <td><?php echo $value->m_stock;?></td>
                                <td><?php echo $value->l_stock;?></td>
                                <td><?php echo $value->xl_stock;?></td>
                                <td>
                                    <?php
                                        $target_dir = "uploads/temp/products/";
                                        $target_name = "latest_uploaded_product";
                                        $path = $target_dir.$target_name;
                        
                                        $imageBLOB = $value->image;

                                        $file = fopen($path, "w");
                                        fwrite($file, base64_decode($imageBLOB)); 
                                    ?>
                                </td>
                                <th> <img src="{{ asset('uploads/temp/products/'.$target_name)}}" alt="Image" width="100px" height="100px"> </th> 
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <h2>Edit the product values</h2>
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="name" placeholder="Product name"></td> 
                                <td><input type="text" name="brand" placeholder="Product brand"></td> 
                                <td><input type="text" name="code" placeholder="Product code"></td> 
                                <td><input type="text" name="description" placeholder="Product description"></td> 
                                <td><input type="number" step="any" min="0" name="price" placeholder="Product price"></td> 
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S Stock</th>
                                <th scope="col">M Stock</th>
                                <th scope="col">L Stock</th>
                                <th scope="col">XL Stock</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" min="0" name="s_stock" placeholder="S size amount"></td> 
                                <td><input type="number" step="any" min="0" name="m_stock" placeholder="M size amount"></td> 
                                <td><input type="number" step="any" min="0" name="l_stock" placeholder="L size amount"></td> 
                                <td><input type="number" step="any" min="0" name="xl_stock" placeholder="XL size amount"></td>
                                <td><input type="file" name="new_image"></td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
            @if(isset($message))
                <div class="container">
                    <h2>{{$message}}</h2>
                </div>
            @endif
        </div>
    </body>
</html>
@endsection