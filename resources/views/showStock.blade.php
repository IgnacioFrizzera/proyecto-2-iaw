@extends('layouts.app')

@section('content')
<html>
    <div class="container-fluid">
      <h1>Store current stock</h1>
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
          <?php foreach($searchedData AS $value):?>
              <tr>
                  <th scope="row"> {{ $i }} </th>
                  <td> {{$value->name}} </td>
                  <td> {{$value->code}} </td>
                  <td> {{$value->s_stock}} </td>
                  <td> {{$value->m_stock}} </td>
                  <td> {{$value->l_stock}} </td>
                  <td> {{$value->xl_stock}} </td>
              </tr>
              <?php $i = $i + 1;?>
          <?php endforeach;?>
          </tbody>
        </table>
    </div>
</html>
@endsection