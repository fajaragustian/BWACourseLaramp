<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct()
    //  Add Permission Access
    {
        $this->middleware('permission:list-product|create-product|edit-product|delete-product', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-product', ['only' => ['destroy']]);
    }
    // Product
    public function index()
    {

        $products = Product::latest()->paginate(50);
        return view('auth.admin.products.index', compact('products'));
    }
    // Create View
    public function create()
    {
        //
        return view('auth.admin.products.create');
    }

    // Request Create Product
    public function store(Request $request)
    {
        //
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    // Show Product with View Blade
    public function show(Product $product)
    {
        //
        return view('auth.admin.products.show', compact('product'));
    }

    //    Edit Product with View Blade
    public function edit(Product $product)
    {
        //
        return view('auth.admin.products.edit', compact('product'));
    }
    // Request Update Product
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $product->update($request->all());
        return redirect()->back()
            ->with('success', 'Product updated successfully');
    }
    //  Request Delete Product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
