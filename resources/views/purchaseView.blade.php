@extends('layouts.app')


@section('content')
    <html>
        <body>
            <div class="container">
                @if(isset($productStock))
                    <?php foreach($productStock AS $key=>$value):?>
                            <form action="/finish-purchase" method="POST">
                            {{ csrf_field() }}
                                <?php
                                    echo '<p id="s_stock">'.$value->s_stock.'</p><button id="s_button">myButton</button>';
                                    echo '<p id="m_stock">'.$value->m_stock.'</p><button id="m_button">myButton</button>';
                                    echo '<p id="l_stock">'.$value->l_stock.'</p><button id="l_button">myButton</button>';
                                    echo '<p id="xl_stock">'.$value->xl_stock.'</p><button id="xl_button">myButton</button>';
                                ?>
                            <button type="submit" name="purchaseButton">Purchase</button> 
                            </form>
                    <?php endforeach;?>  
                @endif
            <script src="{{ asset('js/views/purchaseView.js')}}"></script>
            </div>
            @if(isset($message))
                <div class="container">
                    <h2>{{$message}}</h2>
                    Continue browsing other products !button to browse here!
                </div>
            @endif
        </body>
    </html>
@endsection
