<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Product Created',
            'text' => 'The product has been created successfully.',
        ]);

        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Product Updated',
            'text' => 'The product has been updated successfully.',
        ]);

        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->inventories()->exists()){
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Cannot Delete Product',
                'text' => 'The product cannot be deleted because it has associated inventories.',
            ]);
        }

        if($product->purchaseOrders()->exists()||$product->quotes()->exists()){
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Cannot Delete Product',
                'text' => 'The product cannot be deleted because it is associated with purchase orders or quotes.',
            ]);
            return redirect()->route('admin.products.index');
        }


        $product->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Product Deleted',
            'text' => 'The product has been deleted successfully.',
        ]);

        return redirect()->route('admin.products.index');
    }
}
