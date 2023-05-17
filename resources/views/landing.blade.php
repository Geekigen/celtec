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
.nav-link {
  color:#fefefe !important;
}

        .navbar-toggler {
  border: none;
  background: transparent;
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
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="#">Company Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Account</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid midsection">
      <div class="row">
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="filter p-3 d-flex justify-content-between">
            <div>Filter by price:</div>
            <div class="form-group">
              <select class="form-control">
                <option>All</option>
                <option>$0-$50</option>
                <option>$51-$100</option>
                <option>$101-$200</option>
                <option>$201+</option>
              </select>
            </div>
          </div>
          
          <div class="side-panel">
            <h5 class="card-title">Categories</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="category-button">Category 1</a></li>
              <li><a href="#" class="category-button">Category 2</a></li>
              <li><a href="#" class="category-button">Category 3</a></li>
              <li><a href="#" class="category-button">Category 4</a></li>
              <li><a href="#" class="category-button">Category 5</a></li>
            </ul>
          </div>
          
        </div>
        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
          <!-- Main Content -->
        <div class="row">
          <div class="col-sm-3 col-md-3 col-lg-3 item">
            <div class="card">
              <img src="item1.jpg" class="card-img-top" alt="item1">
              <div class="card-body">
                <h5 class="card-title">Item 1</h5>
                <p class="card-text">Description of item 1</p>
                <button class="add-to-cart btn " style="display:none">Add to Cart</button>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-3 item">
            <div class="card">
              <img src="item2.jpg" class="card-img-top" alt="item2">
              <div class="card-body">
                <h5 class="card-title">Item 2</h5>
                <p class="card-text">Description of item 2</p>
                <button class="add-to-cart btn " style="display:none">Add to Cart</button>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-3 item">
            <div class="card">
              <img src="item3.jpg" class="card-img-top" alt="item3">
              <div class="card-body">
                <h5 class="card-title">Item 3</h5>
                <p class="card-text">Description of item 3</p>
                <button class="add-to-cart btn " style="display:none">Add to Cart</button>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-3 item">
            <div class="card">
              <img src="item4.jpg" class="card-img-top" alt="item4">
              <div class="card-body">
                <h5 class="card-title">Item 4</h5>
                <p class="card-text">Description of item 4</p>
                <button class="add-to-cart btn " style="display:none">Add to Cart</button>
              </div>
            </div>
          </div>
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
      
    <!-- footer -->
    <footer class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>Follow Us</h5>
            <ul class="list-unstyled">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Instagram</a></li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>Subscribe</h5>
            <form>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter email">
              </div>
              <button type="submit" class="btn btn-secondary btn-block">Subscribe</button>
            </form>
          </div>
          <div class="col-sm-3">
            <p class="text-muted">&copy; 2023 Company Name</p>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- end footer -->
      
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
      
</body>


</html>