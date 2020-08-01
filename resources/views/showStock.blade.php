@extends('layouts.app')

@section('content')
<html>

<div class="container-fluid">
  <h1>Store current stock</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Code</th>
        <th scope="col">S Stock</th>
        <th scope="col">M Stock</th>
        <th scope="col">L Stock</th>
        <th scope="col">XL Stock</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($searchedData as $value)
        <tr>
          <td> {{$value->name}} </td>
          <td> {{$value->code}} </td>
          <td> {{$value->s_stock}} </td>
          <td> {{$value->m_stock}} </td>
          <td> {{$value->l_stock}} </td>
          <td> {{$value->xl_stock}} </td>
        </tr>  
      @endforeach
    </tbody>
  </table>
</div>

</html>
@endsection