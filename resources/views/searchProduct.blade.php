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
            <form action="/admin/searchProduct" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h2>Search product by code</h2> <input type="text" name="code">
                <button type="submit">Search product</button>                
            </form>
            @if(isset($searchedData))
                <div class="container">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">S Stock</th>
                            <th scope="col">M Stock</th>
                            <th scope="col">L Stock</th>
                            <th scope="col">XL Stock</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        <?php foreach($searchedData AS $key=>$value):?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo $value->name;?></td>
                                <td><?php echo $value->code;?></td>
                                <td><?php echo $value->s_stock;?></td>
                                <td><?php echo $value->m_stock;?></td>
                                <td><?php echo $value->l_stock;?></td>
                                <td><?php echo $value->xl_stock;?></td>
                            </tr>
                            <?php $i = $i + 1;?>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            @endif
            @if(isset($message))
                <h2>{{$message}}</h2>
            @endif
        </div>
    </body>
</html>
@endsection