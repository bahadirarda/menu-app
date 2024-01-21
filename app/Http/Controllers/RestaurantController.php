<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{
    public function index()
    {
        Log::info('Restaurant index view accessed.');
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        Log::info('Accessing create restaurant view.');
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        Log::info('Attempting to store a new restaurant.');
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:restaurants',
            'phone' => 'required',
            'website' => 'nullable|url'
        ]);

        Restaurant::create($validated);
        Log::info('New restaurant stored successfully: ' . $validated['name']);
        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully.');
    }

    public function show(Restaurant $restaurant)
    {
        Log::info('Showing restaurant: ' . $restaurant->id);
        return view('restaurants.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        Log::info('Accessing edit view for restaurant: ' . $restaurant->id);
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        Log::info('Attempting to update restaurant: ' . $restaurant->id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:restaurants,email,' . $restaurant->id,
            'phone' => 'required',
            'website' => 'nullable|url'
        ]);

        $restaurant->update($validated);
        Log::info('Restaurant updated successfully: ' . $restaurant->id);
        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully.');
    }

    public function destroy(Restaurant $restaurant)
    {
        Log::info('Attempting to delete restaurant: ' . $restaurant->id);
        $restaurant->delete();
        Log::info('Restaurant deleted successfully: ' . $restaurant->id);
        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully.');
    }
}
