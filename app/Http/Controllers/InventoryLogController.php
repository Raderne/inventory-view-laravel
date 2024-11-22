<?php

namespace App\Http\Controllers;

use App\Models\InventoryLog;
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
}
