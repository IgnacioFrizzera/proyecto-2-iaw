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
</html>
@endsection