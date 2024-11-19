<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        $limitedSupplier = Supplier::limit(4)->latest()->get();

        return view("supplies.index", compact(["supplier", "limitedSupplier"]));
    }

    public function create()
    {
        return view("supplies.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => ["required", "email", "unique:suppliers,email"],
        ]);

        $userId = Auth::user()->getAuthIdentifier();

        Supplier::create([
            "name" => $request->name,
            "email" => $request->email,
            "user_id" => $userId,
        ]);

        return redirect("/suppliers");
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect("/suppliers");
    }
}
