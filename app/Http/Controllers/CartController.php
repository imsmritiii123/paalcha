<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class CartController extends Controller
{
    public function index()
    {
        return view("cart");
    }

    public function showCart()
    {
        // Get the authenticated user's ID
        $user_id = Auth::id();
        
        // Retrieve the user's orders from the database
        $orders = Order::where('user_id', $user_id)->with('user','menu')->get();
        
        // Pass the orders variable to the view
        return view('cart', ['orders' => $orders]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('success_message', 'Item has been removed!');
    }
    
}
