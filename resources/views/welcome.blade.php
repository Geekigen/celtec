<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>celtec electronics</title>
    @laravelPWA
    <meta name="description" content="celtec electronics">
    <meta name="keywords" content="celtec electronics">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
	
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        
        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }
        
        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        
        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
      
          }
          #header {
            position: fixed;
            top: 0;
            width: 100%;
  background-color:#0D0D0D;
            z-index: 1000; /* Adjust as needed */
        }
      
  .hover\:shadow-orange:hover {
    box-shadow: 0 4px 6px -1px rgb(255, 149, 0), 0 2px 4px -1px rgba(255, 154, 12, 0.89);
  }
    </style>
</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">
      
            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle" />

            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
              <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li><a class="inline-block no-underline text-white hover:text-white hover:underline py-2 px-4" href="/">Home</a></li>
                    <li><a class="inline-block no-underline text-white hover:text-white hover:underline py-2 px-4" href="#">All Products</a></li>
                    <li><a class="inline-block no-underline text-white hover:text-white hover:underline py-2 px-4" href="/myorders">Orders</a></li>
                    <li><a class="inline-block no-underline text-white hover:text-white hover:underline py-2 px-4" href="">Blogs</a></li>
                    
                    <li class="relative group">
                      <a class="inline-block no-underline text-white hover:text-white hover:underline py-2 px-4" href="#">Categories</a>
                      <ul class="absolute hidden bg-white text-gray-700 mt-2 p-2 rounded-lg group-hover:block transition duration-300 ease-in-out delay-150">   <!-- Loop through categories and generate links -->
                            @foreach ($categories as $category)
                                <li><a class="block px-2 py-1 hover:text-gray-900" href="{{ route('prod.sort', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                      <div >
                        @guest
                        
                            <a href="{{ route('login') }}" class="text-white hover:text-gray-200 px-4 py-2">
                              <svg class="fill-current hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <circle fill="none" cx="12" cy="7" r="3" />
                                <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                            </svg> Login</a>
                            <a href="{{ route('register') }}" class="text-white hover:text-gray-200 px-4 py-2">Register</a>
                        @else
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>
                                          <svg class="fill-current hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <circle fill="none" cx="12" cy="7" r="3" />
                                            <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                                        </svg> {{ Auth::user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                  <a href="{{ route('profile.edit') }}"
                                      class="block px-4 py-2 text-sm font-bold text-black dark:text-gray-300"
                                      role="menuitem">Profile</a>
                                  <form method="POST" action="{{ route('logout') }}">
                                      @csrf
                                      <button type="submit"
                                          class="block w-full text-left px-4 py-2 text-sm font-bold text-black dark:text-gray-300"
                                          role="menuitem">Log Out</button>
                                  </form>
                              </x-slot>
                              
                            </x-dropdown>
                        @endguest
                    </div>
                    </li>
                </ul>
            </nav>
            
            </div>
            <div class="relative">
              <form method="GET" action="{{ route('products.search') }}">
              <label for="Search" class="sr-only"> Search </label>
            
              <input
              name="keyword" 
                type="text"
                id="Search"
                placeholder="Search for..."
                class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm"
              />
            
              <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                <button type="submit"class="text-gray-600 hover:text-gray-700">
                  <span class="sr-only">Search</span>
            
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                    />
                  </svg>
                </button>
              </span>
          </form>
            </div>
            
          
            <div class="order-1 md:order-2 flex items-center">
              <a href="{{ route('dashboard') }}" class="text-gray-800 flex items-center">
                  <x-application-logo class="block h-9 w-auto fill-current mr-2" />
                  <span class="no-underline hover:no-underline font-bold text-white text-xl">
                      Enjoy Shopping
                  </span>
              </a>
          </div>
          

            <div class="order-2 md:order-3 flex items-center" id="nav-content">

               
                <a class="pl-3 inline-block no-underline text-white hover:text-black" href="/cart">
                   Cart ({{ count((array) session('cart')) }})
                    <svg class="fill-current hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                </a>

            </div>
        </div>
    </nav>

    <div class="carousel relative container mx-auto" style="max-width:1600px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            @foreach ($Ads as $index => $ad)
            <input class="carousel-open" type="radio" id="carousel-{{ $index + 1 }}" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('{{ asset('images/ad-images/' .  $ad->filename) }}');">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-black text-2xl my-4">{{ $ad->title}}</p>
                            <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="{{ $ad->link }}">view product</a>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        @endforeach
            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>

        </div>
    </div>

    <!--	 

Alternatively if you want to just have a single hero

<section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right" style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1422190441165-ec2956dc9ecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">

	<div class="container mx-auto">

		<div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
			<h1 class="text-black text-2xl my-4">Stripy Zig Zag Jigsaw Pillow and Duvet Set</h1>
			<a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">products</a>

		</div>

	  </div>

</section>

-->

    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="navsearch" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                  <div class="flex flex-col items-center space-y-4">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl bg-orange-500 py-2 px-4 rounded-lg" href="#">
                        Popular products
                    </a>
                    
                    <a class="text-orange-500 text-sm hover:underline" href="#">
                        See more popular products
                    </a>
                </div>
                
                

                    <div class="flex items-center" id="store-nav-content">

     


                    </div>
              </div>
            </nav>
            @foreach ($popular as $product)
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col hover:grow hover:shadow-orange">
                <a href="{{ route('products.show', $product->id) }}">
                    @if ($product->images->count() > 0)
                    <img style="height:300px; width:300px; object-fit:contain;"  src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }} image">
                  
                    
                    @else
                    <img class="hover:grow hover:shadow-lg" src="" alt="no image">
                  
                    @endif
                    <div class="pt-3 flex items-center justify-between">
                        <p class="">{{ $product->title }}</p>
                        <a href="/add-to-cart/{{ $product->id }}">
                            Add to Cart
                             <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                 <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                                 <circle cx="10.5" cy="18.5" r="1.5" />
                                 <circle cx="17.5" cy="18.5" r="1.5" />
                             </svg>
                         </a>
                    </div>
                    <p class="pt-1 text-2xl font-bold text-red-600">Sh:{{ number_format($product->price, 0, '.', ',') }}</p>

                </a>
            </div>
            @endforeach

          


         
            
           
           

            </div>

    </section>

    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                @forelse ($category1 as $category)
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                  <div class="flex flex-col items-center space-y-4">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl bg-orange-500 py-2 px-4 rounded-lg" href="#">
                      {{$category->name}}
                    </a>
                    
                    <a class="text-orange-500 text-sm hover:underline" href="#">
                     see more {{$category->name}}
                    </a>
                </div>

                  
              </div>
              @empty
  <div></div>
@endforelse
            </nav>

            @foreach ($cat1 as $product)
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col hover:grow hover:shadow-orange">
                <a href="{{ route('products.show', $product->id) }}">
                    @if ($product->images->count() > 0)
                    <img style="height:300px; width:300px; object-fit:contain;"  src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }} image">
                  
                    
                    @else
                    <img class="hover:grow hover:shadow-lg" src="" alt="no image">
                  
                    @endif
                    <div class="pt-3 flex items-center justify-between">
                        <p class="">{{ $product->title }}</p>
                        <a href="/add-to-cart/{{ $product->id }}">
                            Add to Cart
                             <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                 <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                                 <circle cx="10.5" cy="18.5" r="1.5" />
                                 <circle cx="17.5" cy="18.5" r="1.5" />
                             </svg>
                         </a>
                    </div>
                    <p class="pt-1 text-2xl font-bold text-red-600">Sh:{{ number_format($product->price, 0, '.', ',') }}</p>

                </a>
            </div>
            @endforeach

            
            </div>

    </section>
     
    <section class="bg-white py-8">

      <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

          <nav id="store" class="w-full z-30 top-0 px-6 py-1">
              @forelse ($category2 as $category)
              <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                <div class="flex flex-col items-center space-y-4">
                  <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl bg-orange-500 py-2 px-4 rounded-lg" href="#">
                    {{$category->name}}
                  </a>
                  
                  <a class="text-orange-500 text-sm hover:underline" href="#">
                   see more {{$category->name}}
                  </a>
              </div>

                
            </div>
            @empty
<div></div>
@endforelse
          </nav>

          @foreach ($cat2 as $product)
          <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col hover:grow hover:shadow-orange">
              <a href="{{ route('products.show', $product->id) }}">
                  @if ($product->images->count() > 0)
                  <img style="height:300px; width:300px; object-fit:contain;"  src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }} image">
                
                  
                  @else
                  <img class="hover:grow hover:shadow-lg" src="" alt="no image">
                
                  @endif
                  <div class="pt-3 flex items-center justify-between">
                      <p class="">{{ $product->title }}</p>
                      <a href="/add-to-cart/{{ $product->id }}">
                          Add to Cart
                           <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                               <circle cx="10.5" cy="18.5" r="1.5" />
                               <circle cx="17.5" cy="18.5" r="1.5" />
                           </svg>
                       </a>
                  </div>
                  <p class="pt-1 text-2xl font-bold text-red-600">Sh:{{ number_format($product->price, 0, '.', ',') }}</p>

              </a>
          </div>
          @endforeach

          
          </div>

  </section>
  <section class="bg-white py-8">

    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

        <nav id="store" class="w-full z-30 top-0 px-6 py-1">
            @forelse ($category3 as $category)
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

              <div class="flex flex-col items-center space-y-4">
                <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl bg-orange-500 py-2 px-4 rounded-lg" href="#">
                  {{$category->name}}
                </a>
                
                <a class="text-orange-500 text-sm hover:underline" href="#">
                 see more {{$category->name}}
                </a>
            </div>

              
          </div>
          @empty
<div></div>
@endforelse
        </nav>

        @foreach ($cat3 as $product)
        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col hover:grow hover:shadow-orange">
            <a href="{{ route('products.show', $product->id) }}">
                @if ($product->images->count() > 0)
                <img style="height:300px; width:300px; object-fit:contain;"  src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }} image">
              
                
                @else
                <img class="hover:grow hover:shadow-lg" src="" alt="no image">
              
                @endif
                <div class="pt-3 flex items-center justify-between">
                    <p class="">{{ $product->title }}</p>
                    <a href="/add-to-cart/{{ $product->id }}">
                        Add to Cart
                         <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                             <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                             <circle cx="10.5" cy="18.5" r="1.5" />
                             <circle cx="17.5" cy="18.5" r="1.5" />
                         </svg>
                     </a>
                </div>
                <p class="pt-1 text-2xl font-bold text-red-600">Sh:{{ number_format($product->price, 0, '.', ',') }}</p>

            </a>
        </div>
        @endforeach

        
        </div>

</section>

<section class="bg-white py-8">

  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

      <nav id="store" class="w-full z-30 top-0 px-6 py-1">
          @forelse ($category4 as $category)
          <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

            <div class="flex flex-col items-center space-y-4">
              <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl bg-orange-500 py-2 px-4 rounded-lg" href="#">
                {{$category->name}}
              </a>
              
              <a class="text-orange-500 text-sm hover:underline" href="#">
               see more {{$category->name}}
              </a>
          </div>

            
        </div>
        @empty
<div></div>
@endforelse
      </nav>

      @foreach ($cat4 as $product)
      <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col hover:grow hover:shadow-orange">
          <a href="{{ route('products.show', $product->id) }}">
              @if ($product->images->count() > 0)
              <img style="height:300px; width:300px; object-fit:contain;"  src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }} image">
            
              
              @else
              <img class="hover:grow hover:shadow-lg" src="" alt="no image">
            
              @endif
              <div class="pt-3 flex items-center justify-between">
                  <p class="">{{ $product->title }}</p>
                  <a href="/add-to-cart/{{ $product->id }}">
                      Add to Cart
                       <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                           <circle cx="10.5" cy="18.5" r="1.5" />
                           <circle cx="17.5" cy="18.5" r="1.5" />
                       </svg>
                   </a>
              </div>
              <p class="pt-1 text-2xl font-bold text-red-600">Sh:{{ number_format($product->price, 0, '.', ',') }}</p>

          </a>
      </div>
      @endforeach

      
      </div>

</section>
<section class="bg-white py-8">

  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

      <nav id="store" class="w-full z-30 top-0 px-6 py-1">
          @forelse ($category5 as $category)
          <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

            <div class="flex flex-col items-center space-y-4">
              <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl bg-orange-500 py-2 px-4 rounded-lg" href="#">
                {{$category->name}}
              </a>
              
              <a class="text-orange-500 text-sm hover:underline" href="#">
               see more {{$category->name}}
              </a>
          </div>

            
        </div>
        @empty
<div></div>
@endforelse
      </nav>

      @foreach ($cat5 as $product)
      <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col hover:grow hover:shadow-orange">
          <a href="{{ route('products.show', $product->id) }}">
              @if ($product->images->count() > 0)
              <img style="height:300px; width:300px; object-fit:contain;"  src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }} image">
            
              
              @else
              <img class="hover:grow hover:shadow-lg" src="" alt="no image">
            
              @endif
              <div class="pt-3 flex items-center justify-between">
                  <p class="">{{ $product->title }}</p>
                  <a href="/add-to-cart/{{ $product->id }}">
                      Add to Cart
                       <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                           <circle cx="10.5" cy="18.5" r="1.5" />
                           <circle cx="17.5" cy="18.5" r="1.5" />
                       </svg>
                   </a>
              </div>
              <p class="pt-1 text-2xl font-bold text-red-600">Sh:{{ number_format($product->price, 0, '.', ',') }}</p>

          </a>
      </div>
      @endforeach

      
      </div>

</section>

<section class="bg-white py-8">

  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

      <nav id="store" class="w-full z-30 top-0 px-6 py-1">
          @forelse ($category6 as $category)
          <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

            <div class="flex flex-col items-center space-y-4">
              <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl bg-orange-500 py-2 px-4 rounded-lg" href="#">
                {{$category->name}}
              </a>
              
              <a class="text-orange-500 text-sm hover:underline" href="#">
               see more {{$category->name}}
              </a>
          </div>

            
        </div>
        @empty
<div></div>
@endforelse
      </nav>

      @foreach ($cat6 as $product)
      <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col hover:grow hover:shadow-orange">
          <a href="{{ route('products.show', $product->id) }}">
              @if ($product->images->count() > 0)
              <img style="height:300px; width:300px; object-fit:contain;"  src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }} image">
            
              
              @else
              <img class="hover:grow hover:shadow-lg" src="" alt="no image">
            
              @endif
              <div class="pt-3 flex items-center justify-between">
                  <p class="">{{ $product->title }}</p>
                  <a href="/add-to-cart/{{ $product->id }}">
                      Add to Cart
                       <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                           <circle cx="10.5" cy="18.5" r="1.5" />
                           <circle cx="17.5" cy="18.5" r="1.5" />
                       </svg>
                   </a>
              </div>
              <p class="pt-1 text-2xl font-bold text-red-600">Sh:{{ number_format($product->price, 0, '.', ',') }}</p>

          </a>
      </div>
      @endforeach

      
      </div>

</section>
    <footer class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 pb-8 pt-16 sm:px-6 lg:px-8 lg:pt-24">
         
      
          <div
            class="mt-16 border-t border-gray-100 pt-8 sm:flex sm:items-center sm:justify-between lg:mt-24"
          >
            <ul class="flex flex-wrap justify-center gap-4 text-xs lg:justify-end">
              <li>
                <a href="#" class="text-gray-500 transition hover:opacity-75">
                  CALL O722452517
                </a>
              </li>
      
              <li>
                <a href="#" class="text-gray-500 transition hover:opacity-75">
                 lOCATION : Nandi arcade eldoret shop no29
                </a>
              </li>
      
            </ul>
      
            <ul class="mt-8 flex justify-center gap-6 sm:mt-0 lg:justify-end">
              <li>
                <a
                  href="https://www.facebook.com/CeltecE"
                  rel="noreferrer"
                  target="_blank"
                  class="text-gray-700 transition hover:opacity-75"
                >
                  <span class="sr-only">Facebook</span>
      
                  <svg
                    class="h-6 w-6"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </a>
              </li>
      
              <li>
                <a
                  href="/"
                  rel="noreferrer"
                  target="_blank"
                  class="text-gray-700 transition hover:opacity-75"
                >
                  <span class="sr-only">Instagram</span>
      
                  <svg
                    class="h-6 w-6"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </a>
              </li>
      
              <li>
                <a
                  href="/"
                  rel="noreferrer"
                  target="_blank"
                  class="text-gray-700 transition hover:opacity-75"
                >
                  <span class="sr-only">Twitter</span>
      
                  <svg
                    class="h-6 w-6"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                  >
                    <path
                      d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                    />
                  </svg>
                </a>
              </li>
      
           
      
              
            </ul>
          </div>
        </div>
      </footer>
</body>

</html>
