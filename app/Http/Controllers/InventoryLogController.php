<?php

namespace App\Http\Controllers;

use App\Models\InventoryLog;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryLogController extends Controller
{
    public function index()
    {
        $inventoryLogs = InventoryLog::with(["product"])
            ->latest()
            ->get()
            ->groupBy("product_id");

        return view('history.index', compact('inventoryLogs'));
    }

    public function addLog(Product $product, int $stock)
    {
        $quantityChanged = $stock - $product->stock;
        $type = $quantityChanged > 0 ? 'add' : 'remove';

        InventoryLog::create([
            'product_id' => $product->id,
            'quantity_changed' => $quantityChanged,
            'type' => $type,
        ]);
    }
}
