<table class="table table-condensed">
  <thead>
    <tr>
      <th style="width:50%">Product</th>
      <th style="width:20%">Quantity</th>
      <th style="width:30%">Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach($order->details as $detail)
    <tr>
      <td data-th="Product">{{ $detail->product->name }}</td>
      <td data-th="Quantity" class="text-center">{{ $detail->quantity }}</td>
      <td data-th="Price" class="text-right">{{ number_format($detail->price) }}</td>
    </tr>
    <tr>
      <td data-th="Subtotal">Subtotal</td>
      <td data-th="Subtotal" class="text-right" colspan="2">KShs{{ number_format($detail->total_price) }}</td>
    </tr>

    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td data-th="Subtotal"><strong>Shipping Fee</strong></td>
      <td data-th="Subtotal" class="text-right" colspan="2"><strong>KShs{{ number_format($order->total_fee) }}</strong></td>
    </tr>
    <tr>
      <td><strong>Total</strong></td>
        <td class="text-right" colspan="2"><strong>KShs{{ number_format($order->total_payment) }}</strong></td>
    </tr>
  </tfoot>
</table>
