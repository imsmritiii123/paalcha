<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\FoodCategory;

class AdminMenuController extends Controller
{
    public function printMenu()
{
    $menus = DB::table('menus')
                ->join('food_categories', 'menus.food_category_id', '=', 'food_categories.id')
                ->select('menus.id', 'menus.menu', 'food_categories.category', 'menus.price', 'menus.description', 'menus.image')
                ->get();

                
    $categories = FoodCategory::all();
    return view('adminmenu', compact('menus','categories'));
}

public function deleteMenu($id)
{
    $data=Menu::find($id);
    $data->delete();
    session()->flash('success', 'Menu deleted successfully!');
    return redirect('adminmenu');
}

public function storeMenu(Request $request)
{
    $request->validate([
        'menu' => 'required',
        'category' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $categories = FoodCategory::all();

    $image_name = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/foodmenuimg');
        $image->move($destinationPath, $image_name);
    }

    $menu = new Menu;
    $menu->menu = $request->input('menu');
    $menu->food_category_id = $request->input('category');
    $menu->description = $request->input('description');
    $menu->price = $request->input('price');
    $menu->image = $image_name;
    $menu->save();

    return redirect()->route('adminmenu')->with('success', 'Menu item added successfully.');
}


}
