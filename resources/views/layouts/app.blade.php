<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Always force latest IE rendering engine -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="">
  <meta charset="utf-8">
  <title>ChapCHap || Cargo</title>
  <link rel="stylesheet" href="{{ asset ('dash/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/font-awesome-4.7.0/css/font-awesome.min.css')}}">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">
  <link rel="stylesheet" href="{{ mix('assets/css/libs.css') }}">
  <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset ('style.css')}}">

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
                                      <img src="{{ asset ('images/logo.png')}}" width="100px"/>
                                  </a>
                              </div>

                              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

                                <!-- Right Side Of Navbar -->
                                <ul class="nav navbar-nav navbar-right">

                                  @include('layouts._customer-feature', ['partial_view'=>'layouts._check-order-menu-bar', 'data'=>[]])

                                  @include('layouts._customer-feature', ['partial_view'=>'layouts._cart-menu-bar'])

                                    <!-- Authentication Links -->
                                    @if (Sentinel::guest())
                                        <li><a class="imondwhite" href="/login">Login</a></li>
                                        <li><a class="imondwhite imondred" href="/register">Register</a></li>
                                    @else
                                        <li class="dropdown">
                                            <a class="imondwhite" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Sentinel::getUser()->first_name }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="/logout"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>


                              </div>

                          </div>
                      </nav>
                  </div>
              </div>

          </div>

      </div>
  </header>
 <div class="demo form-bg">
        <div class="container-fluid">
            <div class="container">
              @include('flash::message')
            </div>



                @yield('content')

        </div>
    </div>
  <script src="{{ mix('assets/js/app.js') }}"></script>
  <script src="{{ mix('assets/js/all.js') }}"></script>
  <script src="{{ mix('assets/js/libs.js') }}"></script>
  <script src="{{ mix('assets/js/custom.js') }}"></script>
  <script src="{{ asset ('dash/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

  @if (Session::has('flash_product_name'))
    @include('catalogs._product-added', ['product_name' => Session::get('flash_product_name')])
  @endif
</body>
</html>
