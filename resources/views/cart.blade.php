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
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Cart</title>
</head>


    
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
          @if(Auth::check())
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
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
<body>
    <section>
    @if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif

        <h1>&nbspYour Orders <i class="fas fa-utensils"></i></h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <!-- <th> Customer </th> -->
                        <th> Item </th>
                        <th> Image</th>
                        <th> Quantity </th>
                        <th> Time </th>
                        <th> Total </th>
                        <th> Remove </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <!-- <td>{{ $order->user->name }}</td> -->
                        <td>{{ $order->menu->menu }}</td>
                        <td><img src="{{ asset('foodmenuimg/' . $order->menu->image) }}" style="height: 70px;width:70px;"></td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->time }}</td>
                        <td>{{ $order->total }}</td>
                        <td><a href="{{ route('cart.destroy', ['id' => $order->id]) }}"><i class="fas fa-times"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="note-message">
  <p style="color:red">Restaurant will call you to confirm your order!</p>
</div>
            <!-- <button class="checkout-btn" onclick="showQRCode()">Pay Advance</button> -->
        </div>
    </section>
  
    <div id="qr-code-modal" class="modal qr-code-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="qr-code-wrapper">
            <img src="{{ asset('images/qrcode.jpg') }}" alt="QR Code" width="200" height="200">
        </div>
        </div>
    </div>

    <style>
    .qr-code-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    .modal-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 50%;
  width:20%;
  margin: 150px 0 0 500px; 

}
</style>
    <script>
     // Get the modal
     var modal = document.getElementById("qr-code-modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function showQRCode() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>
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

            

</body>
</html>