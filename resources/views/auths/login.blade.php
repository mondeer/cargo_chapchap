<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Always force latest IE rendering engine -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="ChapChap Cargo is an online cargo management system where users are able to ship stuff from abroad with ease">
  <meta charset="utf-8">
  <title>ChapChap || Cargo</title>
  <link rel="stylesheet" href="{{ asset ('dash/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/font-awesome-4.7.0/css/font-awesome.min.css')}}">

  <script src="{{ asset ('dash/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{ asset ('dash/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- Optional theme -->
  <link rel="stylesheet" href="style1.css">

</head>

<body>
 <div class="demo form-bg">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="heading"> CHAPCHAP CARGO </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form method="post" role="form" action="/login">
                      {{ csrf_field() }}
                        <h1 class="heading">LOGIN</h1>
                        <div class="form-group">

                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Example@EmailAddress.com"/>

                            <label class=" control-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="8+ Character Password"/>

                            <button type="submit" class="btn btn-default">Login <i class="fa fa-arrow-circle-right fa-2x"></i></button>
                        </div>
                        <span class="form-footer">No account? <a href="/register">Create One</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
