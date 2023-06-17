<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function index(){
        $galleries = Gallery::all();
        return view('gallery', compact('galleries'));
    }

    public function deletegallery($id)
{
    $data=Gallery::find($id);
    $data->delete();
    session()->flash('success', 'Photo deleted successfully!');
    return redirect('gallery');
}

public function store(Request $request)
{
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image_name = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $image_name);
    }

    $gallery = new Gallery;
    $gallery->image = $image_name;
    $gallery->save();

    return redirect()->route('gallery.index')->with('success', 'Photo added successfully.');
}

}
