<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/updateprofile.css') }}">
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
        <a href="#" style="font-weight: bold; color: black;"><i class="fas fa-user"></i>&nbsp;&nbsp;{{ Auth::user()->username }}</a>
        
       
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
<div class="container-form">
  <form class="form" action="{{ route('profileupdate') }}" method="POST">
    @csrf
  <div class="title">Welcome,<br><span>Update your profile here!</span></div>
  @if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif
  <input type="text" placeholder="Name" name="name" class="input" value="{{ $user->name }}" required>
  <input type="text" placeholder="Username" name="username" class="input" value="{{ $user->username }}" required>
  <input type="text" placeholder="Phone no." name="phone" class="input" value="{{ $user->phone }}" required>
  <input type="text" placeholder="Email" name="email" class="input" value="{{ $user->email }}" required>
  <input type="password" placeholder="New Password" name="password" class="input">
  <input type="password" placeholder="Confirm Password" name="password_confirmation" class="input"> 
  <button class="button-confirm">Update →</button>
</form>
</div>
</body>
</html>