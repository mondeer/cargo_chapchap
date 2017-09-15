@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @include('checkout._step')
      <div class="row">
        <div class="col-xs-8">
          <div class="panel panel-default">
              <div class="panel-heading">Shipping Address</div>
              <div class="panel-body">
                @if (auth()->check())
                  @include('checkout._address-choose-form')
                @else
                  @include('checkout._address-new-form')
                @endif
              </div>
          </div>
        </div>
        <div class="col-xs-4">
          @include('checkout._cart-panel')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
