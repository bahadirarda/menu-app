<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        Log::info('Product index view accessed.');
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        Log::info('Accessing create product view.');
        return view('products.create');
    }

    public function store(Request $request)
    {
        Log::info('Attempting to store a new product.');
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        Product::create($validated);
        Log::info('New product stored successfully: ' . $validated['name']);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        Log::info('Showing product: ' . $product->id);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        Log::info('Accessing edit view for product: ' . $product->id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        Log::info('Attempting to update product: ' . $product->id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($validated);
        Log::info('Product updated successfully: ' . $product->id);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        Log::info('Attempting to delete product: ' . $product->id);
        $product->delete();
        Log::info('Product deleted successfully: ' . $product->id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
