
<div class="thumbnail">
  <h3 class="">{{ $product->name }}</h3>
  <img src="{{ $product->photo_path }}" class="img-rounded">
    <p>Model: {{ $product->model }}</p>
    <p>Price: <strong>KShs{{ number_format($product->price, 2) }}</strong></p>
    <p>Category:
      @foreach ($product->categories as $category)
        <span class="label label-primary">
        <i class="fa fa-btn fa-tags"></i>
        {{ $category->title }}</span>
      @endforeach
    </p>

    @include('layouts._customer-feature', ['partial_view'=>'catalogs._add-product-form', 'data' => compact('product')])

</div>
