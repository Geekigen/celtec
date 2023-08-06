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
    <h1> Order</h1>
   
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Official Name</th>
                    <th>Location</th>
                    <th>Phone Number</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th></th> <!-- Added column for actions -->
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->official_name }}</td>
                        <td>{{ $order->location }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                        
                    </tr>
        
            </tbody>
        </table>

</div>
  
<h1>More order Details</h1>

<div class="table-responsive">
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th >{{__('Product')}}</th>
                <th >{{__('Price')}}</th>
                <th>{{__('Quantity')}}</th>
                <th  class="text-center">{{__('Subtotal')}}</th>
                <th ></th>
                <th >Rate product</th>
            </tr>
        </thead>
        <tbody>
            @php
            $data=json_decode($order->order_array, true);
        @endphp
            
            @foreach ( $data as $details )
                   
                    <tr >
                        <td data-th="Product">
                            <div class="d-flex align-items-center">
                                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                                    <img style="height:200px; width:100%; object-fit:contain;" src="{{ asset('images/' . $details['image']) }}" class="img-fluid" />
                                </div>
                                <div class="col-12 col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    {{-- rate   <h4 class="nomargin">{{ $details['id'] }}</h4> --}}
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">KSH:{{ number_format($details['price'], 0, '.', ',') }}</td>

                        <td data-th="Quantity">
                            {{ $details['quantity'] }}
                        </td>
                        <td data-th="Subtotal" class="text-center">ksh <td data-th="Subtotal" class="text-center">KSH :{{ number_format($details['price'] * $details['quantity'], 0, '.', ',') }}</td>
                    </td>
                        <td class="actions" data-th="">
                          
                            <style>
                                form.rating .flex {
                             display: flex;
                             align-items: center;
                             background: linear-gradient(to right, #FBBF24 0%, #FBBF24 var(--Rate), #ddd var(--Rate), #ddd 100%);
                             padding: 10px;
                             border-radius: 10px;
                             overflow: hidden;
                           }
                           
                           .stars {
                             display: flex;
                             flex-direction: row-reverse;
                             font-size: 30px;
                             justify-content: center;
                             position: relative;
                           }
                           
                           .stars input {
                             display: none;
                           }
                           
                           .stars label {
                             display: inline-block;
                             color: lightgrey;
                             margin: 0 5px;
                             text-shadow: 1px 1px #bbb;
                             cursor: pointer;
                           }
                           
                           .stars label:before {
                             content: '★';
                           }
                           
                           .stars input:checked ~ label {
                             color: gold;
                             text-shadow: 1px 1px #c60;
                           }
                           
                           .stars:not(:checked) > label:hover,
                           .stars:not(:checked) > label:hover ~ label {
                             color: gold;
                           }
                           
                           .stars input:checked > label:hover,
                           .stars input:checked > label:hover ~ label {
                             color: gold;
                             text-shadow: 1px 1px goldenrod;
                           }
                           
                           .stars .result:before {
                             position: absolute;
                             content: "";
                             width: 100%;
                             left: 50%;
                             transform: translateX(-50%);
                             top: -30px;
                             font-size: 30px;
                             font-weight: 500;
                             color: gold;
                             font-family: 'Poppins', sans-serif;
                             display: none;
                           }
                           
                           .stars input:checked ~ .result:before {
                             display: block;
                           }
                           
                           .stars #five:checked ~ .result:before {
                             content: "I love it ";
                           }
                           
                           .stars #four:checked ~ .result:before {
                             content: "I like it ";
                           }
                           
                           .stars #three:checked ~ .result:before {
                             content: "It's good ";
                           }
                           
                           .stars #two:checked ~ .result:before {
                             content: "I don't like it ";
                           }
                           
                           .stars #one:checked ~ .result:before {
                             content: "I hate it ";
                           }
                           
                                 
                                 </style>
                                 <form action="/save-rating" method="POST">
                           @csrf
                           <input name="productid" type="text" style="display: none" value="{{ $details['id'] }}">
                                 <div class="stars-container">
                                   <div class="stars">
                                     <input type="radio" id="one" name="Rate" value="5">
                                     <label for="one" class="star"></label>
                                     <input type="radio" id="two" name="Rate" value="4">
                                     <label for="two" class="star"></label>
                                     <input type="radio" id="three" name="Rate" value="3">
                                     <label for="three" class="star"></label>
                                     <input type="radio" id="four" name="Rate" value="2">
                                     <label for="four" class="star"></label>
                                     <input type="radio" id="five" name="Rate" value="1">
                                     <label for="five" class="star"></label>
                                   </div>
                                   
                                 </div>
                                 <button class="mt-4" style="background-color:#FF540D;
                                 color: rgb(0, 0, 0);
                                 "> Rate</button>
                               </form>
                                      
                        </td>
                    </tr>
                @endforeach
           
        </tbody>
        <tfoot>
           
            
        </tfoot>
    </table>
</div>
    <!-- end footer -->
      @include('layouts.footerclient')
     
 
</body>


</html>