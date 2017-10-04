@extends('admin.dash')

@section('content')
  <div class="col-md-2">

  </div>
  <div class="col-md-10">
    <h1>View Online Shoppings</h1><hr>
    <a href="/warehouse/add" class="btn btn-primary"></a>
    <table class="table table-responsive table-bordered table-stripped">
      <thead>
        <th>ID</th>
        <th>Product URL</th>
        <th>Quantity</th>
        <th>Shopper Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Receiving Address</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
          @foreach ($shopping as $shop)
            <tr>
              <td>{{ $shop->id }}</td>
              <td><a target="_blank" href="{{ $shop->product_link }}">{{ $shop['product_link'] }}</a></td>
              <td>{{ $shop['quantity'] }}</td>
              <td>{{ $shop->first_name }} {{ $shop->last_name }}</td>
              <td>{{ $shop->email }}</td>
              <td>{{ $shop->phone }}</td>
              <td>{{ $shop->delivery_address }}</td>
              <td><a href="#"><i class="fa fa-edit"></i></a></td>
              <td>
                <form class="delware" action="/shopping/{{ $shop->id }}/delete" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection
