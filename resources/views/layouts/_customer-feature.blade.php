@include($partial_view, isset($data) ? $data : [])

  @if (Sentinel::guest())
    <!-- @include($partial_view, isset($data) ? $data : []) -->
  @endif
