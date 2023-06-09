
<nav class="navbar navbar-expand-lg">
 
  <a class="navbar-brand" href="/"><img style="height:50px; width:50px; object-fit:contain;"class="image-responsive img-fluid" src="{{asset('images/logo.png')}}" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
  </button>
  <div class="justify-content-between">
    <form class="form-inline " method="GET" action="{{ route('products.search') }}">
      <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="/">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/products"><span>All Products</span> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/myorders"><span>My Orders</span> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/blogs"><span>Blogs</span> </a>
      </li>
    </ul>
    
   
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="/cart">Cart ({{ count((array) session('cart')) }})<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25c0-.05.01-.09.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2Z"/></svg></a>
      </li>
      @if (Route::has('login'))
      <div>
        @auth
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
              <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('profile.edit') }}">
                  {{ __('Profile') }}
              </a>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                  @csrf 

                  <button type="submit" class="dropdown-item">
                      {{ __('Log Out') }}
                  </button>
              </form>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-white">Log in</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a href="{{ route('register') }}" class="ml-4 font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-white">Register</a>
        </li>
        @endif
        @endauth
      </div>
      @endif
    </ul>
  </div>
  
</nav>
