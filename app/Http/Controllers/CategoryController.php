<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        Log::info('Category index view accessed.');
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        Log::info('Accessing create category view.');
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Log::info('Attempting to store a new category.');
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'menu_id' => 'required|exists:menus,id'
        ]);

        Category::create($validated);
        Log::info('New category stored successfully: ' . $validated['name']);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        Log::info('Showing category: ' . $category->id);
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        Log::info('Accessing edit view for category: ' . $category->id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        Log::info('Attempting to update category: ' . $category->id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'menu_id' => 'required|exists:menus,id'
        ]);

        $category->update($validated);
        Log::info('Category updated successfully: ' . $category->id);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        Log::info('Attempting to delete category: ' . $category->id);
        $category->delete();
        Log::info('Category deleted successfully: ' . $category->id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
