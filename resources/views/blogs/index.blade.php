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
        @foreach($blogs as $blog)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('images/' . $blog->image) }}" class="card-img-top" alt="Blog Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


      @include('layouts.footerclient')
      
 @livewireStyles
 @livewireScripts
 
</body>


</html>