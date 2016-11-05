<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Demo App</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('home') }}">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right"> 
    
    {{-- herer is bav secectuiib --}}
    
      @if(Auth::check())
        <li><a href="{{ route('article') }}">Post Article</a></li>

        <li><img src=""></li>
        <li><img src="{{ asset('image/profile_image/'.Auth::user()->image_url ) }}" width="80px" height="60px"></li>
        <li><a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('logout') }}"> logout</a></li>
      @else
        <li><a href="{{ route('login') }}"> Login</a></li>
        <li><a href="{{ route('register') }}"> Sign Up</a></li>
      @endif
      
    </ul>
  </div>
</nav>