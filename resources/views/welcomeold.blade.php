<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  
    <style>
      .category-button {
  display: inline-block;
  padding: 5px 10px;
  background-color: #736626;
  color: white;
  text-decoration: none;
  border: none;
  margin: 5px;
  cursor: pointer;
}

            .navbar{
  background-color:#051326
}
button.navbar-toggler {
 color: white !important;
}
.nav-link {
  color:#fefefe !important;
}

     

.navbar-nav {
  flex-direction: column;
  text-align: center;
}

.nav-item {
  width: 100%;
}

        .item {
            position: relative;
            padding: 20px;
        }

        .add-to-cart {
            background-color:#FF540D;
            color: white;
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: none;
        }
        .overflow-x-scroll {
        overflow-x: scroll;
        white-space: nowrap;
      }
      .product-card {
        height: 200px;
        width: 200px;
        display: inline-block;
        background-color: lightgray;
        margin: 10px;
      }
      .midsection {
  background-color: #F3F4F6;
}


    </style>
</head>
<body>  
  @include('layouts.navclient')
<div class="row" style="height: 50%; background-color: rgba(217, 107, 98, 0.3);">
  <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
    <div class="side-panel">
      <h5 class="card-title">Categories</h5>
      <div>
        <ul class="list-unstyled">
          @foreach ($categories as $category)
            <li>
              <a href="{{ route('prod.sort', $category->id) }}" class="btn btn-category mt-3 mb-2" style="background-color: #F2BA52; color: black;">{{ $category->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      {{ $categories->links('pagination::bootstrap-4') }}
    </div>
  </div>
  <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach ($Ads as $index => $ad)
          <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach ($Ads as $index => $ad)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img class="d-block w-100" style="object-fit: contain; height: 100%;" src="{{ asset('images/ad-images/' .  $ad->filename) }}" alt="Slide {{ $index + 1 }}">
            <div class="carousel-caption">
              <h3>{{ $index + 1 }}</h3>
              <p>{{ $ad->title}}</p>
              <a href="{{ $ad->link }}" class="btn btn-primary">More</a>
            </div>
          </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

  <div class="container-fluid midsection">
  <div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
      <div class="filter p-3 d-flex justify-content-between">
        <div class="form-group">
          @livewire('price-filter')
        </div>
      </div>
    </div>
    
    <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
      <div class="text-center mt-4">
        <h2 style="color: black; background-color: #F2884B; padding: 10px;">Popular Products</h2>
      </div>
      
      <div class="row">
        @foreach ($popular as $product)
          <div class="col-sm-6 col-md-3 col-lg-3 item container">
            <div class="card">
              <a href="{{ route('products.show', $product->id) }}" class="text-black">
                @if ($product->images->count() > 0)
                  <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/product-images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
                @else
                  <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
                @endif
                <div class="card-body" style="height: 200px; overflow: hidden;">
                  <h5 class="card-title text-dark" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->title }}</h5>
                  <div class="card-body" style="height: 100px; overflow: hidden;">
                    <p class="card-text text-dark" style="font-size: 14px;">{{ $product->description }}</p>
                  </div>
                  <div class="col-md-12">
                    <h2 style="font-weight: bold; font-size: 24px; color: black;">Sh:{{ number_format($product->price, 0, '.', ',') }}</h2>
                  </div>
                  <button class="add-to-cart btn" style="display:none">
                    <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a>
                  </button>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
      
      {{-- Pagination links --}}
      {{-- {{ $products->links('pagination::bootstrap-4') }} --}}
    </div>
  </div>
</div>

      
     
     @forelse ($category1 as $category)
  <div class="text-center mt-4 d-flex justify-content-between align-items-center rounded" style="background-color: #F2884B; padding: 10px;">
    <h2 style="color: black; margin-right: auto;">{{$category->name}}</h2>
    <a href="{{ route('prod.sort', $category->id) }}" class="ml-auto text-dark">
      <h3>See All</h3>
    </a>
  </div>
@empty
  <div></div>
@endforelse

          <div class="row">
            @foreach ($cat1 as $product)
               <div class="col-sm-6 col-md-3 col-lg-3 item container">
      <div class="card">
        <a href="{{ route('products.show', $product->id) }}" class="text-black">
          @if ($product->images->count() > 0)
            <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/product-images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
          @else
            <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
          @endif
          <div class="card-body" style="height: 200px; overflow: hidden;">
            <h5 class="card-title text-dark" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->title }}</h5>
            <div class="card-body" style="height: 100px; overflow: hidden;">
              <p class="card-text text-dark" style="font-size: 14px;">{{ $product->description }}</p>
            </div>
            <div class="col-md-12">
              <h2 style="font-weight: bold; font-size: 24px; color: black;">Sh:{{ number_format($product->price, 0, '.', ',') }}</h2>
            </div>
            <button class="add-to-cart btn" style="display:none">
              <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a>
            </button>
          </div>
        </a>
      </div>
    </div>
            @endforeach
          </div>
          
      </div>
      <!-- accessories --> 
      <div class="container-fluid p-0">
        @forelse ($category2 as $category )
       <div class="text-center mt-4 d-flex justify-content-between align-items-center rounded" style="background-color: #F2884B; padding: 10px;">
    <h2 style="color: black; margin-right: auto;">{{$category->name}}</h2>
    <a href="{{ route('prod.sort', $category->id) }}" class="ml-auto text-dark">
      <h3>See All</h3>
    </a>
  </div>
        @empty
          <div></div>
        @endforelse
       
          <div class="row">
            @foreach ($cat2 as $product)
               <div class="col-sm-6 col-md-3 col-lg-3 item container">
      <div class="card">
        <a href="{{ route('products.show', $product->id) }}" class="text-black">
          @if ($product->images->count() > 0)
            <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/product-images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
          @else
            <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
          @endif
          <div class="card-body" style="height: 200px; overflow: hidden;">
            <h5 class="card-title text-dark" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->title }}</h5>
            <div class="card-body" style="height: 100px; overflow: hidden;">
              <p class="card-text text-dark" style="font-size: 14px;">{{ $product->description }}</p>
            </div>
            <div class="col-md-12">
              <h2 style="font-weight: bold; font-size: 24px; color: black;">Sh:{{ number_format($product->price, 0, '.', ',') }}</h2>
            </div>
            <button class="add-to-cart btn" style="display:none">
              <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a>
            </button>
          </div>
        </a>
      </div>
    </div>
            @endforeach
          </div>
          
      </div>
      
      <!-- accesories  -->
      
      <div class="container-fluid p-0">
        @forelse ($category3 as $category )
      <div class="text-center mt-4 d-flex justify-content-between align-items-center rounded" style="background-color: #F2884B; padding: 10px;">
    <h2 style="color: black; margin-right: auto;">{{$category->name}}</h2>
    <a href="{{ route('prod.sort', $category->id) }}" class="ml-auto text-dark">
      <h3>See All</h3>
    </a>
  </div>
        @empty
          <div></div>
        @endforelse
          <div class="row">
            @foreach ($cat3 as $product)
               <div class="col-sm-6 col-md-3 col-lg-3 item container">
      <div class="card">
        <a href="{{ route('products.show', $product->id) }}" class="text-black">
          @if ($product->images->count() > 0)
            <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/product-images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
          @else
            <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
          @endif
          <div class="card-body" style="height: 200px; overflow: hidden;">
            <h5 class="card-title text-dark" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->title }}</h5>
            <div class="card-body" style="height: 100px; overflow: hidden;">
              <p class="card-text text-dark" style="font-size: 14px;">{{ $product->description }}</p>
            </div>
            <div class="col-md-12">
              <h2 style="font-weight: bold; font-size: 24px; color: black;">Sh:{{ number_format($product->price, 0, '.', ',') }}</h2>
            </div>
            <button class="add-to-cart btn" style="display:none">
              <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a>
            </button>
          </div>
        </a>
      </div>
    </div>
            @endforeach
          </div>
          
      </div>
      <div class="container-fluid p-0">
        @forelse ($category4 as $category )
        <div class="text-center mt-4 d-flex justify-content-between align-items-center rounded" style="background-color: #F2884B; padding: 10px;">
    <h2 style="color: black; margin-right: auto;">{{$category->name}}</h2>
    <a href="{{ route('prod.sort', $category->id) }}" class="ml-auto text-dark">
      <h3>See All</h3>
    </a>
  </div>
        @empty
          <div></div>
        @endforelse
          <div class="row">
            @foreach ($cat4 as $product)
              <div class="col-sm-6 col-md-3 col-lg-3 item container">
      <div class="card">
        <a href="{{ route('products.show', $product->id) }}" class="text-black">
          @if ($product->images->count() > 0)
            <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/product-images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
          @else
            <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
          @endif
          <div class="card-body" style="height: 200px; overflow: hidden;">
            <h5 class="card-title text-dark" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->title }}</h5>
            <div class="card-body" style="height: 100px; overflow: hidden;">
              <p class="card-text text-dark" style="font-size: 14px;">{{ $product->description }}</p>
            </div>
            <div class="col-md-12">
              <h2 style="font-weight: bold; font-size: 24px; color: black;">Sh:{{ number_format($product->price, 0, '.', ',') }}</h2>
            </div>
            <button class="add-to-cart btn" style="display:none">
              <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a>
            </button>
          </div>
        </a>
      </div>
    </div>
            @endforeach
          </div>
          
      </div>
      <div class="container-fluid p-0">
        @forelse ($category5 as $category )
      <div class="text-center mt-4 d-flex justify-content-between align-items-center rounded" style="background-color: #F2884B; padding: 10px;">
    <h2 style="color: black; margin-right: auto;">{{$category->name}}</h2>
    <a href="{{ route('prod.sort', $category->id) }}" class="ml-auto text-dark">
      <h3>See All</h3>
    </a>
  </div>
        
        @empty
          <div></div>
        @endforelse
          <div class="row">
            @foreach ($cat5 as $product)
             <div class="col-sm-6 col-md-3 col-lg-3 item container">
      <div class="card">
        <a href="{{ route('products.show', $product->id) }}" class="text-black">
          @if ($product->images->count() > 0)
            <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/product-images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
          @else
            <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
          @endif
          <div class="card-body" style="height: 200px; overflow: hidden;">
            <h5 class="card-title text-dark" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->title }}</h5>
            <div class="card-body" style="height: 100px; overflow: hidden;">
              <p class="card-text text-dark" style="font-size: 14px;">{{ $product->description }}</p>
            </div>
            <div class="col-md-12">
              <h2 style="font-weight: bold; font-size: 24px; color: black;">Sh:{{ number_format($product->price, 0, '.', ',') }}</h2>
            </div>
            <button class="add-to-cart btn" style="display:none">
              <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a>
            </button>
          </div>
        </a>
      </div>
    </div>
            @endforeach
          </div>
          
      </div>
      <div class="container-fluid p-0">
        @forelse ($category6 as $category )
       <div class="text-center mt-4 d-flex justify-content-between align-items-center rounded" style="background-color: #F2884B; padding: 10px;">
    <h2 style="color: black; margin-right: auto;">{{$category->name}}</h2>
    <a href="{{ route('prod.sort', $category->id) }}" class="ml-auto text-dark">
      <h3>See All</h3>
    </a>
  </div>
        
        @empty
          <div></div>
        @endforelse
          <div class="row">
            @foreach ($cat6 as $product)
               <div class="col-sm-6 col-md-3 col-lg-3 item container">
      <div class="card">
        <a href="{{ route('products.show', $product->id) }}" class="text-black">
          @if ($product->images->count() > 0)
            <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/product-images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
          @else
            <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
          @endif
          <div class="card-body" style="height: 200px; overflow: hidden;">
            <h5 class="card-title text-dark" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->title }}</h5>
            <div class="card-body" style="height: 100px; overflow: hidden;">
              <p class="card-text text-dark" style="font-size: 14px;">{{ $product->description }}</p>
            </div>
            <div class="col-md-12">
              <h2 style="font-weight: bold; font-size: 24px; color: black;">Sh:{{ number_format($product->price, 0, '.', ',') }}</h2>
            </div>
            <button class="add-to-cart btn" style="display:none">
              <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a>
            </button>
          </div>
        </a>
      </div>
    </div>
            @endforeach
          </div>
          
      </div>
      
    
    <!-- end footer -->
      @include('layouts.footerclient')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $(".item").hover(
                function () {
                    $(this).find(".add-to-cart").show();
                },
                function () {
                    $(this).find(".add-to-cart").hide();
                }
            );
        });
    </script>
      <script>
        $(document).ready(function () {
          $(".item").hover(
            function () {
              $(this).find(".add-to-cart").show();
            },
            function () {
              $(this).find(".add-to-cart").hide();
            }
          );
        });
      </script>
      
 @livewireStyles
 
 @livewireScripts
 
</body>


</html>