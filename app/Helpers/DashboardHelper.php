<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;

class DashboardHelper
{
    public static function getTotalOrders()
    {
        return Order::count();
    }

    public static function getTotalReservations()
    {
        return Reservation::count();
    }

    public static function getTotalCustomers()
    {
        return User::count();
    }
}
