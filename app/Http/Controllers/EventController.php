<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('events', compact('events'));
    }

    public function update(Request $request, $id)
{
    // Validate the request data

    $event = Event::findOrFail($id);
    $event->title = $request->input('title');
    $event->date = $request->input('date');
    $event->description = $request->input('description');

    if ($request->hasFile('image')) {
        // Handle the image upload and update the image field
        $imagePath = $request->file('image')->store('public/images');
        $event->image = basename($imagePath);
    }

    $event->save();

    return redirect()->back()->with('success', 'Event updated successfully');
}

}

