<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\FoodCategory;
    use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    // public function index()
    // {
        
    //     return view("menu");
    // }

    public function index(){
        $data = Menu::all();
        $category = FoodCategory::all();
       // $catcount=Category::count();
        return view('menu',compact('data','category')); 
    }
}
