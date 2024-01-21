<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        Log::info('Menu index view accessed.');
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        Log::info('Accessing create menu view.');
        return view('menus.create');
    }

    public function store(Request $request)
    {
        Log::info('Attempting to store a new menu.');
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        Menu::create($validated);
        Log::info('New menu stored successfully: ' . $validated['name']);
        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function show(Menu $menu)
    {
        Log::info('Showing menu: ' . $menu->id);
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        Log::info('Accessing edit view for menu: ' . $menu->id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        Log::info('Attempting to update menu: ' . $menu->id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $menu->update($validated);
        Log::info('Menu updated successfully: ' . $menu->id);
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        Log::info('Attempting to delete menu: ' . $menu->id);
        $menu->delete();
        Log::info('Menu deleted successfully: ' . $menu->id);
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
