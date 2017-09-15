<script>
$(document).ready(function() {
  swal({
     title: "Success",
     text: "You Added <strong>{{ $product_name }}</strong> to the cart!",
     type: "success",
     showCancelButton: true,
     confirmButtonColor: "#63BC81",
     confirmButtonText: "Confirm Payment",
     cancelButtonText: " Cancel",
     html: true
  }, function(isConfirm) {
      if (isConfirm) {
          window.location = '/cart';
      }
  });
});
</script>
