<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function create()
    {
        $suppliers = Supplier::all()->sortBy('name');

        return view("dashboard", compact('suppliers'));
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

        Product::create([
            "name" => $request->name,
            "sku" => $request->sku,
            "price" => $request->price,
            "stock" => $request->stock,
            "supplier_id" => (int)$request->supplier_id,
        ]);

        return redirect("/")->with("success", "Product Created");
    }
}
