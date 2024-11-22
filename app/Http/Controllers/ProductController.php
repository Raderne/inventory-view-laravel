<?php

namespace App\Http\Controllers;

use App\Models\InventoryLog;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        $suppliers = Supplier::all()->sortBy('name');
        $products = Product::with("supplier")->latest()->get();

        return view("dashboard", compact('suppliers', "products"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            "supplier_id" => ["required"],
            "sku" => ["required", "unique:products"],
            "price" => ["required"],
            "stock" => ["required"],
        ]);

        $createdProduct = Product::create([
            "name" => $request->name,
            "sku" => $request->sku,
            "price" => $request->price,
            "stock" => $request->stock,
            "supplier_id" => (int)$request->supplier_id,
        ]);

        InventoryLog::create([
            "product_id" => $createdProduct->id,
            "quantity_changed" => $request->stock,
            "type" => "add",
        ]);

        return redirect("/")->with("success", "Product Created");
    }
}
