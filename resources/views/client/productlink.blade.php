<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Always force latest IE rendering engine -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="ChapChap Cargo is an online cargo management system where users are able to ship stuff from abroad with ease">
  <meta charset="utf-8">
  <title>ChapChap || Cargo</title>

  <link rel="stylesheet" href="{{ asset ('style1.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/font-awesome-4.7.0/css/font-awesome.min.css')}}">


</head>

<body>
  <header id="main_menu" class="header navbar-fixed-top">
      <div class="main_menu_bg">
          <div class="container">
              <div class="row">
                  <div class="nave_menu">
                      <nav class="navbar imondred">
                          <div class="container-fluid">
                              <!-- Brand and toggle get grouped for better mobile display -->
                              <div class="navbar-header">
                                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                  </button>
                                  <a class="navbar-brand" href="#home">
                                      <img src="{{ asset ('logo.png')}}" width="200px"/>
                                  </a>
                              </div>

                              <!-- Collect the nav links, forms, and other content for toggling -->



                              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

                                  <ul class="nav navbar-nav navbar-right">
                                      <li><a class="imondwhite" href="/">HOME</a></li>
                                      <li><a class="imondwhite" href="#history">ABOUT US</a></li>
                                      <li><a class="imondwhite" href="/catalogs">Catalogs</a></li>
                                      <li><a class="imondwhite" href="#contact">LOGIN</a></li>
                                  </ul>


                              </div>

                          </div>
                      </nav>
                  </div>
              </div>

          </div>

      </div>
  </header> <!--End of header -->
 <div class="demo form-bg">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="heading"> CHAPCHAP CARGO </h1>
                    <h2 class="heading"> Convinience is With Us</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-1 col-md-9">
                    <form class="imond" method="post" role="form" action="/product/link">
                      {{ csrf_field() }}

                          <div class="form-group imond">

                              <div class="controls">
                                <div class="entry row">
                                  <label class="col-md-2 imond control-label"> Product Link</label>
                                  <div class="col-md-5">
                                      <input type="text" class="form-control" name="product_link[]" placeholder="Amamzon/eBay...Product link" value="{{ old('product_link') }}">
                                  </div>
                                  <label class="col-md-2 imond control-label">Quantity</label>
                                  <div class="col-md-2">
                                      <input type="number" class="form-control" placeholder="Quantity of product" name="quantity[]" value="{{ old('quantity') }}">
                                  </div>
                                  <!-- <div class=""> -->
                                    <span class="col-md-1 input-group-btn">
                                       <button class="btn btn-success btn-add" type="button">
                                           <span class="glyphicon glyphicon-plus"></span>
                                       </button>
                                   </span>
                                  <!-- </div> -->

                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <label class="col-md-2 control-label">First Name</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="Your First Name" value="{{ old('first_name') }}">
                                </div>
                                <label class="col-md-2 control-label"> Last Name</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Your Last name" name="last_name" value="{{ old('last_name') }}">
                                </div>
                              </div>

                              <div class="row">
                                <label class="col-md-2 control-label"> Email</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="email" placeholder="Your Email Address" value="{{ old('email') }}">
                                </div>
                                <label class="col-md-2 control-label"> Phone</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Your phone number" name="phone" value="{{ old('phone') }}">
                                </div>
                              </div>

                              <div class="row">
                                <label class="col-md-2 control-label">Delivery Address</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="delivery_address" placeholder="Delivery Address" value="{{ old('delivery_address') }}">
                                </div>
                                <label class="col-md-2 control-label">First Time?</label>
                                <div class="col-md-4">
                                  <select class="" >
                                    <option></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                  </select>
                                </div>
                              </div>

                              <button type="submit" class="btn btn-default">Book <i class="fa fa-arrow-circle-right fa-2x"></i></button>

                          </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset ('dash/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script>
  $(function()
    {
      $(document).on('click', '.btn-add', function(e)
      {
          e.preventDefault();

          var controlForm = $('.controls'),
              currentEntry = $(this).parents('.entry:first'),
              newEntry = $(currentEntry.clone()).appendTo(controlForm);

          newEntry.find('input').val('');
          controlForm.find('.entry:not(:last) .btn-add')
              .removeClass('btn-add').addClass('btn-remove')
              .removeClass('btn-success').addClass('btn-danger')
              .html('<span class="glyphicon glyphicon-minus"></span>');
      }).on('click', '.btn-remove', function(e)
      {
      $(this).parents('.entry:first').remove();

      e.preventDefault();
      return false;
    });
  });
</script>
</body>
</html>
