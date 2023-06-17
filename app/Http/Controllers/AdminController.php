<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function showAdminLoginForm()
{
    return view('adminlogin');
}

public function authenticate(Request $request)
{
    // Validate the admin's credentials
    $validatedData = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Attempt to authenticate the admin
    $username = $validatedData['username'];
    $password = $validatedData['password'];
    $admin = Admin::where('username', $username)->where('password', $password)->first();

    if ($admin) {
        // Store the admin's username in session
        session(['admin_username' => $admin->username]);

        // Redirect the admin to the dashboard
        return redirect()->route('dashboard');
    } 
    else 
    {
        // Authentication failed
        return redirect()->route('adminlogin')->with('error', 'Invalid username or password');
    }
}

public function dashboardView()
{
    $orders = DB::table('orders')
    ->join('users', 'users.id', '=', 'orders.user_id')
    ->join('menus', 'menus.id', '=', 'orders.menu_id')
    ->select('orders.id', 'users.name as customer_name', 'menus.menu as menu_item', 'orders.quantity', 'orders.time', 'orders.total', 'users.phone')
    ->get();
   
    $todayDate=Carbon::now()->format('Y-m-d'); 
    $totalOrders = Order::count();
    $todayOrders=Order::whereDate('created_at',$todayDate)->count();
    $totalReservations = Reservation::count();
    $todayReservations=Reservation::whereDate('created_at',$todayDate)->count();
    $totalCustomers = User::count();

    return view('dashboard', compact('orders','todayOrders','todayReservations','totalCustomers'));
}

public function logout(Request $request)
{
    $request->session()->forget('admin_username');
    return redirect()->route('adminlogin');
}

public function reservations()
{
    $reservations = Reservation::all();
    return view('reservations', ['reservations' => $reservations]);
}


}
