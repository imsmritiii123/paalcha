<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/loginpage.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<title>Login page</title>
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
              <li class="nav-item">
                <a class="nav-link" href="/booktable"><b>Book Table</b></a>
              </li>
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <!-- <button type="button" style="background-color:rgba(236, 211, 19, 0.897); border-color:rgba(236, 211, 19, 0.897)" class="btn btn-outline-light me-2"><font color="black">Login</font></button>&nbsp; -->
            <a href="/usersignup"><button onclick="location.href='signup.html'" style="background-color:rgb(247, 109, 88); border-color:rgb(247, 109, 88)" type="button" class="btn btn-warning">Sign-up</button></a>
          </form>
        </div>
      </nav>

      <div class="container">
        <div class="screen">
            <div class="screen__content">
            @if(session('success'))
    <div class="alert alert-success" style="font-size: 14px; padding: 5px; width: 60%; margin: 0 auto;">{{ session('success') }}</div>
    
@endif  
@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
            @if(session('error'))
    <div class="alert alert-danger" style="font-size: 14px; padding: 5px; width: 60%; margin: 0 auto;">{{ session('error') }}</div>
    
@endif

                <form class="login" method="POST" action="{{ route('userlogin.post') }}">
                @csrf   
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="username" id="username" placeholder="User name">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" id="password" placeholder="Password">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <br> <br>
                    <h5 align="center">Not registered? <a href="/usersignup">Sign up here</a></h5>
                    
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>

</body>
</html>