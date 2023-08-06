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
     
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <!-- Product Details -->
        <div class="card mb-4 mt-4">
            <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <table class="table">
              <tbody>
                  <tr>
                      <th scope="row">Title</th>
                      <td>{{ $product->title }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Description</th>
                      <td>{{ $product->description }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Price</th>
                      <td>Sh: {{ $product->price }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Quantity</th>
                      <td>{{ $product->quantity }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Featured</th>
                      <td>{{ $product->is_featured ? 'Yes' : 'No' }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Category</th>
                      <td>{{ $product->category->name }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Color</th>
                      <td>{{ $product->color }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Size</th>
                      <td>{{ $product->size }}</td>
                  </tr>
                  <tr>
                      <th scope="row">RAM</th>
                      <td>{{ $product->ram }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Storage Type</th>
                      <td>{{ $product->storage_type }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Processor</th>
                      <td>{{ $product->processor }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Cores</th>
                      <td>{{ $product->cores }}</td>
                  </tr>
                  <!-- Add more details here -->
                  <tr>
                    <th scope="row">Rating</th>
                    <td>
                        @php
                            $ratingNumber = number_format($product->ratings->avg('rating'));
                        @endphp
                        @for ($i = 1; $i <= $ratingNumber; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><circle cx="24" cy="24" r="21" fill="#F44336"/><path fill="#FFCA28" d="m24 11l3.9 7.9l8.7 1.3l-6.3 6.1l1.5 8.7l-7.8-4.1l-7.8 4.1l1.5-8.7l-6.3-6.1l8.7-1.3z"/></svg>
                        @endfor
                
                        @for ($j = $ratingNumber + 1; $j <= 5; $j++)
                            <i class="fas fa-star text-gray"></i>
                        @endfor
                
                        @if ($product->ratings->count() > 0)
                            : By {{ $product->ratings->count() }} ratings.
                        @else
                            : No ratings
                        @endif
                    </td>
                </tr>
                
              </tbody>
          </table>
          
            <div style="color:green;">
                <a class="icon tw" href="https://wa.me/+254722452517?text=I%20am%20ordering%20{{ $product->name }}%20i%20saw%20at%20your%20website">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 256 258"><defs><linearGradient id="logosWhatsappIcon0" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1FAF38"/><stop offset="100%" stop-color="#60D669"/></linearGradient><linearGradient id="logosWhatsappIcon1" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#F9F9F9"/><stop offset="100%" stop-color="#FFF"/></linearGradient></defs><path fill="url(#logosWhatsappIcon0)" d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a122.994 122.994 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004"/><path fill="url(#logosWhatsappIcon1)" d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416Zm40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513l10.706-39.082Z"/><path fill="#FFF" d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561c0 15.67 11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716c-3.186-1.593-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64"/></svg></i> Direct order
        </a>
            </div>
            <button style="background-color:#FF540D;
            color: white;
            position: absolute;
            bottom: 20px;
            right: 20px;"> <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a></button>
          </div>
        </div>
      </div>
  
      <div class="col-md-6">
        <!-- Image Carousel -->
        <div id="productCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach ($product->images->take(3) as $index => $image)
                <li data-target="#productCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
              @endforeach
            </ol>
            <div class="carousel-inner">
              @foreach ($product->images->take(3) as $index => $image)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                  <img style="height:400px; width:400px; object-fit:contain;" src="{{ asset('images/' . $image->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
                </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          
      </div>
    </div>
  </div>
  
      <!-- accessories -->
      <h4>Similar Products</h4>
      <div class="container-fluid p-0">
        <div class="row">
            @foreach($similarProducts as $product)
            <div class="col-sm-3 col-md-3 col-lg-3 item container">
                <div class="card">
                  <a href="{{ route('products.show', $product->id) }}" class="text-black">
                    @if ($product->images->count() > 0)
                      <img style="height:200px; width:200px; object-fit:contain;" src="{{ asset('images/' . $product->images[0]->filename) }}" class="card-img-top image-responsive img-fluid" alt="{{ $product->title }}">
                    @else
                      <img src="placeholder.jpg" class="card-img-top img-fluid" alt="Placeholder Image">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title text-dark">{{ $product->title }}</h5>
                      <p class="card-text text-dark">{{ $product->description }}</p>
                      <button class="add-to-cart btn" style="display:none"> <a href="/add-to-cart/{{ $product->id }}" class="text-white">Add to Cart</a></button>
                    </div>
                  </a>
                </div>
              </div>
            @endforeach
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