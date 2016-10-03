<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Demo App</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="">Post Article</a></li>
      <li><a href="3"> User Name</a></li>
      <li><a href="{{ route('register') }}"> Sign Up</a></li>
      <li><a href="{{ route('login') }}"> Login</a></li>
    </ul>
  </div>
</nav>