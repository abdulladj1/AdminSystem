<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3</title>
  <link rel="stylesheet" href="mesin/assets/css/main.css">

<!-- Page specific script -->
@yield('style')
@yield('script')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @yield('content')
    </div>
</body>
</html>