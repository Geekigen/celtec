<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Adjust the height of the sidebar */
    .sidebar {
      height: 100vh;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 sidebar bg-dark">
        <ul class="nav flex-column">
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
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-white">Log in</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-white">Register</a>
              </li>
              @endif
              @endauth
            </div>
            @endif
          <li class="nav-item">
            <a class="nav-link text-white" href="/location-price">Add delivery locations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/createprod">Manage products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/category">Add categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/adimage-upload">Add ads</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/adimage-upload">create blog</a>
          </li>
        </ul>
      </div>

      <!-- Content -->
      <div class="col-md-9">
        <div class="container">
          <h1>Orders</h1>
          <!-- Your orders content here -->
          @livewire('admin-order-component')
        </div>

        <div class="container">
          <h1>Messages</h1>
          <!-- Your messages content here -->
        </div>

        <div class="container">
          
          <!-- Your requests content here -->
        </div>
      </div>
    </div>
  </div>
  @livewireStyles
 @livewireScripts
 
</body>
</html>
