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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
  background-color:#0D0D0D;
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
    
      
  
  <section id="cart" >
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:40%">{{__('Product')}}</th>
                    <th style="width:15%">{{__('Price')}}</th>
                    <th style="width:10%">{{__('Quantity')}}</th>
                    <th style="width:25%" class="text-center">{{__('Subtotal')}}</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="d-flex align-items-center">
                                    <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                                        <img style="height:200px; width:100%; object-fit:contain;" src="{{ asset('images/' . $details['image']) }}" class="img-fluid" />
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">KSH:{{ number_format($details['price'], 0, '.', ',') }}</td>

                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                            </td>
                            <td data-th="Subtotal" class="text-center">ksh <td data-th="Subtotal" class="text-center">KSH :{{ number_format($details['price'] * $details['quantity'], 0, '.', ',') }}</td>
                        </td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm remove-from-cart"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right"><h3><strong>{{__('Total ksh')}} :{{ number_format($total, 0, '.', ',') }}</strong></h3></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>{{__('Continue Shopping')}} </a>
                        <a href="{{ url('/wish') }}"><button class=" checkout btn btn-success">{{__('Checkout')}}</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="/checkout" method="post">
                            @csrf
                            <div class="form-top1">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <input type="text" name="name" placeholder="{{__('Your ID names')}}" required class="form-control">
                                        <label for="location">{{__('Select location to be delivered')}}</label>
                                        <select name="location" id="location"   class="form-control" required>
                                            @foreach ($location as $location)
                                                <option value="{{ $location->id}}">{{ $location->location }} Delivery Fee:sh {{ $location->price }}</option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="number" placeholder="{{__('Your phone number')}}" required class="form-control mt-3">
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary">{{__('CONFIRM PURCHASE')}} <i class="far fa-paper-plane ml-lg-3"></i></button>
                                </div>
                            </div>
                        </form>
                        
                        
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    

<script type="text/javascript">

$(".update-cart").change(function (e) {
    e.preventDefault();

    var ele = $(this);

    $.ajax({
        url: '{{ route('update.cart') }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}',
            id: ele.parents("tr").attr("data-id"),
            quantity: ele.parents("tr").find(".quantity").val()
        },
        success: function (response) {
           window.location.reload();
        }
    });
});

$(".remove-from-cart").click(function (e) {
    e.preventDefault();

    var ele = $(this);

    if(confirm("{{__('Are you sure want to remove?')}}")) {
        $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
});
</script>
    
    <!-- end footer -->
      @include('layouts.footerclient')
</body>


</html>