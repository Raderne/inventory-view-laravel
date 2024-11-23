<?php

namespace App\Http\Controllers;

use App\Models\InventoryLog;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function show(Product $product)
    {
        $logs = InventoryLog::where("product_id", $product->id)->latest()->get();

        return view('product.show', compact('product', "logs"));
    }

    public function create()
    {
        $suppliers = Supplier::all()->sortBy('name');
        $products = Product::with("supplier")->latest()->get();
        $usersCount = User::count();

        return view("dashboard", compact('suppliers', "products", "usersCount"));
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

    public function edit(Product $product)
    {
        return view("product.edit", compact("product"));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => ["required", "string"],
            "sku" => ["required"],
            "price" => ["required"],
            "stock" => ["required"],
        ]);

        $inventoryLogController = new InventoryLogController();
        $inventoryLogController->addLog($product, $request->stock);

        $product->update([
            "name" => $request->name,
            "sku" => $request->sku,
            "price" => $request->price,
            "stock" => $request->stock,
        ]);

        return redirect("/products/{$product->id}")->with("success", "Product Updated");
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect("/")->with("success", "Product Deleted");
    }
}
