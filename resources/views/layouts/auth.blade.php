<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QuickGoals</title>
  <link rel="stylesheet" href="/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  @stack('heads')
</head>

<body>
  <div class="container vh-100 ">
    <div class="row justify-content-center h-100 align-items-center">

      @yield('content')
    </div>
  </div>
  <script src="/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>

</html>
