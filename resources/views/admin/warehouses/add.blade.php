@extends('admin.dash')

@section('content')

  <div class="col-md-12">
    
    <div class="panel-heading"><h1>Add Warehouse</h1></div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/warehouse/add') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-1 control-label"> Warehouse Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="warehouse_name" placeholder="Name of warehouse" value="{{ old('warehouse_name') }}">
                </div>
                <label class="col-md-1 control-label">  Warehouse Address</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Address of warehouse" name="warehouse_address" value="{{ old('warehouse_address') }}">
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-1 control-label">Person in charge</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="person_in_charge" placeholder="Name of person in charge" value="{{ old('person_in_charge') }}">
                </div>

                <label class="col-md-1 control-label">Zip Code/postal code</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Zip/postal code" name="warehouse_zip_code" value="{{ old('warehouse_zip_code') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label">City</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="warehouse_location" placeholder="City" value="{{ old('warehouse_location') }}">
                </div>
                <label class="col-md-1 control-label"> Phone </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="warehouse_phone" placeholder="Contact phone of warehouse" value="{{ old('warehouse_phone') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary"> Add Warehouse</button>
                </div>
            </div>
        </form>

  </div>

@endsection
