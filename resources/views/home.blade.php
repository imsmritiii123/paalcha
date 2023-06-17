<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    <title>Paalcha Newari Kitchen</title>
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
            <li class="nav-item active">
              <a class="nav-link" href="/home"><b>Home</b></a>
            </li>
            <li class="nav-item">
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
      <main role="main">

      <section class="hero-section">
  <div class="hero-content">
    <h1><font color="white">Welcome to </font></h1><h1><font color="#b33022">Paalcha Newari Kitchen</font></h1>
    <p><b>Taste the authentic Newari cuisine!</b></p>
    <div class="btn-conteiner">
      <a class="btn-content" href="/menu">
        <span class="btn-title">Explore Menu</span>
      </a>
    </div>
  </div>
  <div class="hero-image">
    <img src="images/paalcha.jpg" alt="Restaurant Image">
  </div>
</section>

  
        <div class="album py-5 bg-light">
          <div class="container">
  
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="images/live music.jpg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text" align="justify">Preserve the memories of your delightful dining experience with us, while also immersing yourself in our restaurant's live music events!</p>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="images/eventss.jpg" alt="Card image cap" height="230">
                  <div class="card-body">
                    <p class="card-text" align="justify">Experience the festivities and special events here, From New Year's celebrations to other exciting events, our restaurant offers a variety of events!</p>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="images/goodfood.jpg" alt="Card image cap" height="230">
                  <div class="card-body">
                    <p class="card-text" align="justify">Aamazing food and a lively atmosphere at Paalcha Newari Kitchen, with friendly staff and delicious dishes, our restaurant welcomes everyone for a great time out!</p>
                
                  </div>
                </div>
              </div>
  
          <div class="row">
          <div class="column">
            <h3 align="center">Coming events</h3>
            <hr style="width:125px;height:2px;background-color:rgb(35, 110, 63)">
            @foreach($events as $event)  
            <div class="event-card">
                <div class="card-image">
                  <img src="{{ asset('images/'.$event->image) }}" alt="Event Image">
                  <div class="card-info">
                    <h3 class="event-name">{{ $event->title }}</h3>
                    <p class="event-description">{{ $event->description }}</p>
                    <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill">Date: {{ $event->date }}</span>
                  </div>
                </div>
              </div>
              @endforeach
          </div>

          <div class="column">
          <h3 align="center">Photo Gallery</h3>
          <hr style="width:120px;height:2px;background-color:rgb(35, 110, 63)">
        
          <div class="slideshow-container">
            <!-- Slides -->
            @foreach($data as $item)
            <div class="mySlides">

              <img src="images/{{$item->image}}" style="width:100%">
            </div>
            @endforeach
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
         
</div>
</div>
        </div>

        

      </main>
     
              
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
            <script>
              var slideIndex = 1;
              showSlides(slideIndex);
            
              function plusSlides(n) {
                showSlides(slideIndex += n);
              }
            
              function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                if (n > slides.length) {
                  slideIndex = 1
                }
                if (n < 1) {
                  slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
                }
                slides[slideIndex - 1].style.display = "block";
              }
            </script>
</body>
</html>