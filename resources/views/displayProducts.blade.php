@extends('layouts.app')

@section('content')
    <html>
        <body>
            <div class="container">
                <div class="container-fluid">
                    @if(isset($searchedProducts))
                        <div class="row">
                            <?php foreach($searchedProducts AS $value):?>
                                <form action="/purchaseProduct" method="GET">
                                    {{ csrf_field() }}
                                    <div class="col-md-4">
                                        <?php
                                            $target_dir = "uploads/temp/products/";
                                            $target_name = $value->description.$value->name;
                                            $path = $target_dir.$target_name;
                                    
                                            $imageBLOB = $value->image;

                                            $file = fopen($path, "w");
                                            fwrite($file, base64_decode($imageBLOB)); 
                                        ?>
                                        <img src="{{ asset('uploads/temp/products/'.$target_name)}}" alt="Image" width="250px" height="250px">
                                        <h2> $<?php echo $value->price;?></h2>
                                        <h3> <?php echo $value->description; ?> </h3>
                                        <input type="hidden" name="code" value= {{ $value->code }} >
                                        <button class="btn-primary" type="sumbit">Purchase product</button>
                                    </div>  
                                </form>
                            <?php endforeach;?>
                            <div class="container">
                                <?php 
                                    echo $searchedProducts->appends(Request::all())->links();
                                ?>
                            </div>
                        </div> 
                    @endif
                </div>
            </div>
        </body>
    </html>
@endsection