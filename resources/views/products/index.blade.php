<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
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
      <div class="container-fluid midsection">
      <div class="row">
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          
          <div class="filter p-3 d-flex justify-content-between">
        
        <div class="form-group">
            @livewire('price-filter')
        </div>
    </div>
          <div class="side-panel">
            <h5 class="card-title">Categories</h5>
            <ul class="list-unstyled">
              @foreach ($categories as $category)
              <li><a href="{{ route('prod.sort', $category->id) }}">{{ $category->name }}</a>
              </li>
                @endforeach
            </ul>
          </div>
          
        </div>
        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
          <div class="row">
            @foreach($products as $product)
              <div class="col-sm-3 col-md-3 col-lg-3 item container">
                <div class="card">
                  <a href="{{ route('products.show', $product->id) }}" class="text-black">
                  @if($product->images->count() > 0)
                    <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
                  @else
                    <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <button class="add-to-cart btn" style="display:none"> <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a></button>
                  </div>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
          
        
        
    </div>
    </div>
      </div>
      
      <!-- accessories -->
      <div class="container-fluid p-0">
        <div class="row no-gutters">
          <div class="col-12" style="overflow-x: scroll;">
            <div class="d-flex">
              <div class="p-2">Item 1</div>
              <div class="p-2">Item 2</div>
              <div class="p-2">Item 3</div>
              <div class="p-2">Item 4</div>
              <div class="p-2">Item 5</div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- accesories  -->
      
  
    
    <!-- end footer -->
      @include('layouts.footerclient')
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