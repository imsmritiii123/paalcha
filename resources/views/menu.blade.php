<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <img src="images/logo-removebg-preview.png" width="100" height="70" alt="logo" /><pre>  </pre>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/home"><b>Home </b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/aboutus"><b>About us</b></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/menu"><b>Menu</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/booktable"><b>Book table</b></a>
              </li>
            
          </ul>
          @if(Auth::check())
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cart') }}"><b>My Cart&nbsp;&nbsp;</b></a>
            </li>
        </ul>
          <a href="{{ route('profileedit') }}" style="font-weight: bold; color: black;"><i class="fas fa-user"></i>&nbsp;&nbsp;{{ Auth::user()->username }}</a>
          
              <form method="post" action="{{ route('userlogout') }}">
                  @csrf
                  &nbsp;&nbsp; &nbsp;<button type="submit" style="background-color:rgba(244, 241, 241, 0.897); border-color:rgba(244, 241, 241, 0.897)" class="btn btn-outline-light me-2"><font color="black">Logout</font></button>
              </form>
       
      @else
          <a href="{{ route('userlogin') }}"><button type="button" style="background-color:rgba(244, 241, 241, 0.897); border-color:rgba(244, 241, 241, 0.897)" class="btn btn-outline-light me-2"><font color="black">Login</font></button></a>&nbsp;
          <a href="{{ route('usersignup') }}"><button style="background-color:rgb(247, 109, 88); border-color:rgb(247, 109, 88)" type="button" class="btn btn-warning">Sign-up</button></a>
      @endif

        </div>
      </nav>


      <div class="main">
  <div class="section-title">
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2>Our Menu</h2>
    <p>All the prices are exclusive of Tax.</p>
  </div>
  <div class="menus">
    @foreach($category as $cat)
      <div class="menu-column">
        <h4>{{ $cat->category }}</h4>
        @foreach($data as $item)
          @if($item->food_category_id == $cat->id)
            <div class="single-menu">
              <img src="foodmenuimg/{{$item->image}}" alt="" width="100px" height="100px">
              <div class="menu-content">
                <h5>{{ $item->menu }}&nbsp&nbsp<span>Rs.{{ $item->price }}</span></h5>
                <p>{{ $item->description }}</p>
                <form action="{{ route('addorder') }}" method="POST">
                 @csrf
                <input type="hidden" name="menu_id" value="{{ $item->id }}">
                <input type="hidden" name="price" value="{{ $item->price }}">
                <input type="number" name="quantity" placeholder="Quantity" style="width:87px;height:30px;" min="1">
                <input type="time" name="time" placeholder="Time" style="width:85px;height: 30px;">
                <button class="btn btn-danger btn-sm">Add to cart</button>
                </form>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    @endforeach
  </div>
</div>

   
    <!-- footer -->
    <div class="footer-basic">
        <footer class="footer">
            <div class="container bottom_border">
            <div class="row">
            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
            <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
            <!--headin5_amrc-->
            <p class="mb10">Thank you for visiting our website! If you have any questions or comments, please don't hesitate to reach out to us. You can contact us by sending us an email or texting us on the given details.</p>
         
            <p><i class="fa fa-phone"></i>  
              980-1056357 </p>
            <p><i class="fa fa fa-envelope"></i> paalchanewarikitchen@gmail.com</p>
            
            
            </div>
            
            <div class=" col-sm-4 col-md  col-12 col">
            <h5 class="headin5_amrc col_white_amrc pt2">Location</h5>
            <!--headin5_amrc ends here-->
            
            <ul class="footer_ul2_amrc">
              <li><p>Uttar Kuna Shanti Bagaicha Road, Lalitpur 44600</p></li>
           
              <li><p>Nepal</p></li>
            </ul>
            
            <h5 class="headin5_amrc col_white_amrc pt2">Services</h5>
            <!--headin5_amrc ends here-->
            
            <ul class="footer_ul2_amrc">
              <li><p>Dine in, Kerbside pickup, Delivery</p></li>
           
            </ul>
            <!--footer_ul2_amrc ends here-->
            </div>
      
      <div class=" col-sm-4 col-md  col-12 col">
            <h5 class="headin5_amrc col_white_amrc pt2">Opening hours</h5>
            <!--headin5_amrc ends here-->
            
            <ul class="footer_ul2_amrc">
            <li><p>Sun to Fri 11:55am - 10:00pm</p></li>
            <li><p>Sat 12:30am - 10:00pm</p></li>
            </ul>
            <!--footer_ul2_amrc ends here-->
            </div>
  
            
      
            </div>
            </div>
            <div class="container">
            <!--foote_bottom_ul_amrc ends here-->
            <p class="text-center">Copyright @2023 | Designed by <a href="#">Paalcha Newari Kitchen</a></p>
            
            <ul class="social_footer_ul">
            <li><a href="https://www.facebook.com/paalchakitchen/"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="http://webenlance.com"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/palchanewarikitchen/"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <!--social_footer_ul ends here-->
            </div>
            
            </footer>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>