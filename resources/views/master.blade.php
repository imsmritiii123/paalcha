<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Admin Dashboard Panel</title>
    
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/logo-removebg-preview.png" alt="">
            </div>
            <span class="logo_name">PaalchaNewari Kitchen</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="/dashboard">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li class="{{ Request::is('orders') ? 'active' : '' }}"><a href="/orders">
                    <i class="uil uil-utensils"></i>
                    <span class="link-name">Orders</span>
                </a></li>
                <li class="{{ Request::is('customer') ? 'active' : '' }}"><a href="/customer">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Customers</span>
                </a></li>
                <li class="{{ Request::is('reservations') ? 'active' : '' }}"><a href="/reservations">
                    <i class="uil uil-check-circle"></i>
                    <span class="link-name">Reservations</span>
                </a></li>
                <li class="{{ Request::is('adminmenu') ? 'active' : '' }}"><a href="/adminmenu">
                    <i class="uil uil-clipboard"></i>
                    <span class="link-name">Menu</span>
                </a></li>
                <li class="{{ Request::is('employee') ? 'active' : '' }}"><a href="/employee">
                    <i class="uil uil-user-md"></i>
                    <span class="link-name">Employees</span>
                </a></li>
                <li class="{{ Request::is('events') ? 'active' : '' }}"><a href="/events">
                    <i class="uil uil-calender"></i>
                    <span class="link-name">Events</span>
                </a></li>
                <li class="{{ Request::is('gallery') ? 'active' : '' }}"><a href="/gallery">
                    <i class="uil uil-images"></i>
                    <span class="link-name">Gallery</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="{{ route('logout') }}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            @if(session('admin_username'))
            <h4>Hello, {{ session('admin_username') }}</h4>
            @endif
            <img src="images/profile.png" alt="">
        </div>

        <div class="dash-content">
        @yield('content')
        </div>
    </section>

<script>
    const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
</script>
</body>
</html>