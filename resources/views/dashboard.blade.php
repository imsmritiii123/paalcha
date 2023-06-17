

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
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="/orders">
                    <i class="uil uil-utensils"></i>
                    <span class="link-name">Orders</span>
                </a></li>
                <li><a href="/customer">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Customers</span>
                </a></li>
                <li><a href="/reservations">
                    <i class="uil uil-check-circle"></i>
                    <span class="link-name">Reservations</span>
                </a></li>
                <li><a href="/menu">
                    <i class="uil uil-clipboard"></i>
                    <span class="link-name">Menu</span>
                </a></li>
                <li><a href="/employee">
                    <i class="uil uil-user-md"></i>
                    <span class="link-name">Employees</span>
                </a></li>
                <li><a href="/events">
                    <i class="uil uil-calender"></i>
                    <span class="link-name">Events</span>
                </a></li>
                <li><a href="/gallery">
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
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-utensils-alt"></i>
                        <span class="text">Today Orders</span>
                        <span class="number">{{$todayOrders}}</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-check-circle"></i>
                        <span class="text">Today Reservations</span>
                        <span class="number">{{$todayReservations}}</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Members</span>
                        <span class="number">{{$totalCustomers}}</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Orders</span>
                </div>

                <div class="activity-data">
                <table class="table table-striped">
        <thead>
          <tr>
            <th>SNo.</th>
            <th>Customer name</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Time</th>
            <th>Total</th>
            <th>Phone</th>
          </tr>
        </thead>
        <tbody>
        @php
            $serialNumber = 1;
        @endphp
        @foreach($orders as $order)
                            <tr>
                                <td>{{$serialNumber++}}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->menu_item }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->time }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            @endforeach
        </tbody>
      </table>
                </div>
            </div>
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