<ol class="breadcrumb">
  @if(!is_null($current_category))
    <li>Category: <a href="{{ url('/catalogs?cat=' . $current_category->id) }}">{{ $current_category->title }}</a></li>
  @else
    <li>Category: Products</a></li>
  @endif
  <span class="pull-right">Price Order:
  <a href="{{ appendQueryString(['sort'=>'price', 'order'=>'asc']) }}"
    class="btn btn-default btn-xs
    {{ isQueryStringEqual(['sort'=>'price', 'order'=>'asc']) ? 'active' : ''}}"
    >Ascending</a> |
  <a href="{{ appendQueryString(['sort'=>'price', 'order'=>'desc']) }}"
    class="btn btn-default btn-xs
    {{ isQueryStringEqual(['sort'=>'price', 'order'=>'desc']) ? 'active' : ''}}"
    >Descending</a>
</ol>
