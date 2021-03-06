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
                <form action=" {{ route('delete-search') }} " method="GET" enctype="multipart/form-data">
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
                                <td> {{$value->name}} </td>
                                <td> {{$value->brand}} </td>
                                <td><?php $validCode = $value->code; echo $validCode;?></td>
                                <td><p> {{$value->description}}</p></td>
                                <td><p> ${{$value->price}} </p></td>
                                <td> {{$value->s_stock}} </td>
                                <td> {{$value->m_stock}} </td>
                                <td> {{$value->l_stock}} </td>
                                <td> {{$value->xl_stock}} </td>
                                <td>
                                    <img src="{{ asset('uploads/temp/products/'.$value->code)}}" alt="Image" width="250px" height="250px"> </th> 
                                </td>
                                <th>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="alert alert-danger">
                        <strong>
                            Once you delete the product it will be gone forever and you will have to re-upload it
                        </strong>
                    </div>
                    <form action=" {{ route('after-delete') }} " method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="code" value= {{ $validCode }} >
                        <button type="submit">Delete product</button>      
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