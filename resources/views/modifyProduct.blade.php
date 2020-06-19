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
                <form action="/admin/modifyProduct-search" method="GET" enctype="multipart/form-data">
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
                        <?php foreach($searchedData AS $value):?>
                            <tr>
                                <td><?php $searchedName = $value->name; echo $searchedName;?></td>
                                <td> {{$value->brand}} </td>
                                <td><?php $validCode = $value->code; echo $validCode;?></td>
                                <td><p><?php $searchedDescription = $value->description; echo $searchedDescription;?></p></td>
                                <td>$<?php $searchedPrice = $value->price; echo $searchedPrice;?></td>
                                <td><?php $searchedSStock = $value->s_stock; echo $searchedSStock;?></td>
                                <td><?php $searchedMStock = $value->m_stock; echo $searchedMStock;?></td>
                                <td><?php $searchedLStock = $value->l_stock; echo $searchedLStock;?></td>
                                <td><?php $searchedXLStock = $value->xl_stock; echo $searchedXLStock;?></td>
                                <td>
                                    <img src="{{ asset('uploads/temp/products/'.$value->code)}}" alt="Image" width="250px" height="250px"> </th> 
                                </td>
                                <th>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <h2>Edit the product information</h2>
                </div>
                <div class="container">
                    <form action="/adminDashboard-after-modified-product" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="new_name" value="{{ $searchedName }}"></td> 
                                    <td><input type="text" name="new_description" value="{{ $searchedDescription }}"></td> 
                                    <td><input type="number" step="any" min="0" name="new_price" value={{ $searchedPrice }}></td>
                                    <td><input type="file" name="new_image"></td>  
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="number" min="0" name="new_s_stock" value={{ $searchedSStock }}></td> 
                                    <td><input type="number" step="any" min="0" name="new_m_stock" value={{ $searchedMStock }}></td> 
                                    <td><input type="number" step="any" min="0" name="new_l_stock" value={{ $searchedLStock }}></td> 
                                    <td><input type="number" step="any" min="0" name="new_xl_stock" value={{ $searchedXLStock }}></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="update_code" value= {{ $validCode }}>
                        <button type="submit">Update product info</button>     
                    </form>
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