<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function store(Request $request) {
        //check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('userlogin')->with('message', 'Please login to continue.');
        }
        $order = new Order;
        $order->user_id = Auth::id();
        $order->menu_id = $request->menu_id;
        $order->quantity = $request->quantity;
        $order->time = $request->time;
        $order->total = $request->quantity * $request->price; 
        $order->save();
        //show success message
        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    public function index()
{
    $orders = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->join('menus', 'menus.id', '=', 'orders.menu_id')
        ->select('orders.id', 'users.name as customer_name', 'menus.menu as menu_item', 'orders.quantity', 'orders.time', 'orders.total', 'users.phone')
        ->get();

    return view('orders', compact('orders'));
}

public function deleteOrder($id)
{
    $data=Order::find($id);
    $data->delete();
    session()->flash('success', 'Order deleted successfully!');
    return redirect('orders');
}

    
}
