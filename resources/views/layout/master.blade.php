<!DOCTYPE html>
<html lang="en">

<head>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/samples.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  
</head>

<body>

	@include('partials.nav')
  
<div class="container">

  @yield('content') 
  @yield('sign-up')
  @yield('sign-in')
  @yield('password')
  @yield('user-dashboard')
  @yield('reset')
  @yield('post-article')

</div>

</body>
</html>