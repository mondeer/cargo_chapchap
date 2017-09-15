@extends('admin.dash')

@section('content')
  <div class="col-md-12">
    <h1>Warehouses</h1><hr>
    <a href="/warehouse/add" class="btn btn-primary">Add Warehouse</a>
    <table class="table table-responsive table-bordered table-stripped">
      <thead>
        <th>ID</th>
        <th>Warehouse Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Phone</th>
        <th>Zip/Postal Code</th>
        <th>Person In Charge</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
          @foreach ($warehouses as $warehouse)
            <tr>
              <td>{{ $warehouse->id }}</td>
              <td>{{ $warehouse->warehouse_name }}</td>
              <td>{{ $warehouse->warehouse_address }}</td>
              <td>{{ $warehouse->warehouse_location }}</td>
              <td>{{ $warehouse->warehouse_phone }}</td>
              <td>{{ $warehouse->warehouse_zip_code }}</td>
              <td>{{ $warehouse->person_in_charge }}</td>
              <td><a href="#"><i class="fa fa-edit"></i></a></td>
              <td>
                <form class="delware" action="/warehouse/{{ $warehouse->id }}/delete" method="post">
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
