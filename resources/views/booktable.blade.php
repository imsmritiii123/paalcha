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
    <link rel="stylesheet" href="{{ asset('css/booktable.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Book Table</title>
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
            <li class="nav-item">
              <a class="nav-link" href="/aboutus"><b>About us</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/menu"><b>Menu</b></a>
              </li>
              <li class="nav-item active">
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
                  &nbsp;&nbsp; &nbsp;<button type="submit" style="background-color:rgba(244, 241, 241, 0.897); border-color:rgba(244, 241, 241, 0.897)" class="btn btn-outline-light me-2"><font color="black">Logout</font></button>
              </form>
       
      @else
          <a href="{{ route('userlogin') }}"><button type="button" style="background-color:rgba(244, 241, 241, 0.897); border-color:rgba(244, 241, 241, 0.897)" class="btn btn-outline-light me-2"><font color="black">Login</font></button></a>&nbsp;
          <a href="{{ route('usersignup') }}"><button style="background-color:rgb(247, 109, 88); border-color:rgb(247, 109, 88)" type="button" class="btn btn-warning">Sign-up</button></a>
      @endif
         
        </div>
      </nav>

<section class = "banner">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <!-- <h2>BOOK YOUR TABLE NOW</h2> -->
    <div class = "card-container">
        <div class = "card-img">
           <!-- <img src="booktable.jpg" width="100%" height="100%"> -->
        </div>
  
        <div class = "card-content">


            <h3>Reservation</h3>
            <form method="POST" action="{{ route('booktable.submit') }}">
            @csrf
                <div class = "form-row">
                    <input type ="date" name="date" id="date">
                    <input type="time" name="time" id="time">
                    <input type = "text" name="r_name" id="r_name" placeholder="Full Name">
                    <input type = "text" name="phone_no" id="phone_no" placeholder="Phone Number">
                    <input type = "number" name="guest" id="guest" placeholder="How Many Persons?" min = "1">
                    <input type = "submit" value = "BOOK TABLE">
                </div>

            </form>
        </div>
    </div>
</section>
