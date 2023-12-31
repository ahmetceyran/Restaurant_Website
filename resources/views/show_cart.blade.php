<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style type="text/css">

        .center
        {
            margin: auto;
            width: 80%;
            text-align: center;
            padding: 250px;
            padding-top: 150px;
        }

        table,th,td
        {
            border: 1px solid gray;
            align: center;
        }

        .th_deg
        {
            font-size: 20px;
            padding: 5px;
            background-color: rgb(247, 98, 81);
        }

        .img_size
        {
            width: 150px;
            height: 100px;
        }

        .total_price
        {
            font-size: 20px;
            padding: 40px;
        }

        .div_deg
        {

            text-align: center;
            padding: 30px;

        }

        label
        {

            display: inline-block;
            width: 200px;

        }

    </style>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 

                            <li class="scroll-to-section">
                                @auth
                                <a href="{{url('show_cart', Auth::user()->id)}}">
                                    Cart [{{$count}}]
                                </a>
                                @endauth
                                @guest
                                    Cart[0]
                                @endguest
                            </li> 

                            <li>

                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                        @auth
                                            <li>

                                                <x-app-layout>
    
                                                </x-app-layout>

                                            </li>
                                        @else
                                            <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                                            @endif
                                        @endauth
                                    </div>
                                @endif

                            </li>

                        </ul>        
                        <a class='menu-trigger'>
                            <span></span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <div class="center">

        <table>

            <tr>
                <th class="th_deg">Food Name</th>
                <th class="th_deg">Price Per One</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>

            <?php $totalprice=0 ?>

            @foreach ($data as $data)
           
            <form action="{{url('order_confirm')}}" method="POST">

                @csrf

            <?php $cartprice=0 ?>

            <tr>

                <td>
                    <input type="text" name="foodname[]" value="{{$data->title}}" hidden>
                    {{$data->title}}
                </td>
                <td>
                    <input type="text" name="price[]" value="{{$data->price}}" hidden>
                    {{$data->price}}
                </td>
                <td>
                    <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>
                    {{$data->quantity}}
                </td>
                <td>
                    <img class="img_size" src="/foodimage/{{$data->image}}">
                </td>
                

            </tr>

            <?php $cartprice= $data->price * $data->quantity ?>

            <?php $totalprice=$totalprice + $cartprice ?>
            
            @endforeach

            @foreach ($data2 as $data2)

            <tr style="position: relative; top: -200px; right: -430px;">

                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are You Sure?')" href="{{url('remove_cart', $data2->id)}}">Remove</a>
                </td>

            </tr>
                
            @endforeach

            

        </table>

        <div>

            <h1 class="total_price">Total Price :  ${{$totalprice}}</h1>

        </div>

        <div>

            <a style="background-color: red;" class="btn btn-danger" type="button" id="order">Order Now</a>

        </div>

        <div style="padding-top: 30px; display: none;" id="appear">

                <div class="div_deg">

                    <label>Name: </label>
                    <input type="text" name="name" placeholder="Name" required>

                </div>
                <div class="div_deg">

                    <label>Phone: </label>
                    <input type="number" name="phone" placeholder="Phone Number" required>

                </div>
                <div class="div_deg">

                    <label>Address: </label>
                    <input type="text" name="address" placeholder="Address" required>

                </div>
                <div class="div_deg">

                    <input style="background-color: green;" type="submit" class="btn btn-success" value="Order Confirm">

                    <button id="close" type="button" style="background-color: red;" class="btn btn-danger">Close</button>

                </div>

        </div>

    </form>


      </div>


    <script type="text/javascript">

        $("#order").click(

            function()
            {

                $("#appear").show();

            }

        );

        $("#close").click(

            function()
            {

                $("#appear").hide();

            }

        );

    </script>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>