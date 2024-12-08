
<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Recycling.com – Home</title>
  <!-- fav icon -->
  <link rel="icon" href="assets/images/favicon.png" type="image/gif/x-icon"> 
  <!-- meta tag -->
  <meta charset="UTF-8">
  <meta name="author" content="Recycling.com">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- meta keywords -->
  <meta name="keywords" content="Recycling, child"/>
  <meta name="robots" content="NOODP,index,follow"/>
  <!-- font awesome css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <!-- main stylesheet -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <!-- responsive stylesheet -->
  <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>

  <div class='thetop'></div>
  @include("frontend.header")

  @yield('content')


  <script src=" {{ asset('frontend/js/jquery.min.js') }}"></script>
  <!-- popper min js -->
  <script src=" {{ asset('frontend/js/popper.min.js') }}"></script>
  <!-- bootstrap min js -->
  <script src=" {{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <!-- scroll js -->
  <script src=" {{ asset('frontend/js/scrollIt.min.js') }}"></script>
  <!-- custom js -->
  <script src=" {{ asset('frontend/js/custom.js') }}"></script>

</body>
</html>

