<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $data = Gallery::all();
        $events = Event::all();
        return view('home',compact('data','events')); 
    }
}
