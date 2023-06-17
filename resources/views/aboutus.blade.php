<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  
    <title>About us</title>

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
              <a class="nav-link" href="/home"><b>Home</b></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/aboutus"><b>About us</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/menu"><b>Menu</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/booktable"><b>Book Table</b></a>
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
                  &nbsp;&nbsp;&nbsp;<button type="submit" style="background-color:rgba(244, 241, 241, 0.897); border-color:rgba(244, 241, 241, 0.897)" class="btn btn-outline-light me-2"><font color="black">Logout</font></button>
              </form>
       
      @else
          <a href="{{ route('userlogin') }}"><button type="button" style="background-color:rgba(244, 241, 241, 0.897); border-color:rgba(244, 241, 241, 0.897)" class="btn btn-outline-light me-2"><font color="black">Login</font></button></a>&nbsp;
          <a href="{{ route('usersignup') }}"><button style="background-color:rgb(247, 109, 88); border-color:rgb(247, 109, 88)" type="button" class="btn btn-warning">Sign-up</button></a>
      @endif

        </div>
      </nav>
      <div class="wrapper">
        <div class="background-color">
            <div class="bg-1">
            </div>
        </div>
        <div class="about-container">
            <div class="image-container">
                <img src="images/aboutus.jpg">
            </div>
            <div class="text-container">
                <h1>About us</h1>
                <p align="justify">Paalcha Newari Kitchen, established in 2015, is a restaurant co-founded by Sanjay Shrestha, Prakash Bhaju, Leejan Shakya, Sandeep Shrestha and Prabin Shrestha. At Paalcha Newari Kitchen, our goal is to provide a warm and safe atmosphere where customers can enjoy delicious Newari cuisine while creating and capturing precious moments with their loved ones. Our commitment to a unique cultural experience goes beyond just serving delicious food. We also offer Live Music events and a variety of other beloved dishes, along with a plethora of drinks, to make your experience with us even more memorable. We are especially known for our mouth-watering Momo items that are sure to satisfy any appetite. Come visit us and enjoy the authentic taste of Newari cuisine in a welcoming atmosphere.</p>
            </div>
        </div>
      </div>

      <section>
        <div class="row">
          <h2>Our Chef</h2>
          <hr style="width:1300px;height:2px;background-color:rgb(35, 110, 63)">

        </div>
        <div class="row">
          <!-- Column 1-->
          <div class="column">
            <div class="card">
              <div class="img-container">
                <img src="images/chef.jpg" />
              </div>
              <h3>Surya Tamang</h3>
              <p>Assistant Chef</p>
              <div class="icons">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
            
                <a href="#">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- Column 2-->
          <div class="column">
            <div class="card">
              <div class="img-container">
                <img src="images/headchef.jpg" />
              </div>
              <h3>Dipak Thapa</h3>
              <p>Head Chef</p>
              <div class="icons">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- Column 3-->
          <div class="column">
            <div class="card">
              <div class="img-container">
                <img src="images/chef.jpg" />
              </div>
              <h3>Jagat Tamang</h3>
              <p>Assistant Chef</p>
              <div class="icons">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
          </div>

          
        </div>
      </section>
  

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