<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InventoryController extends Controller
{
    // 1. Index with Search & Pagination
    public function index(Request $request)
    {
        $search = $request->input('search');

        $inventories = Inventory::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('sku', 'like', "%{$search}%");
        })->paginate(10); // 10 items per page

        return view('inventory.index', compact('inventories', 'search'));
    }

    // 2. PDF Generation
    public function exportPdf(Request $request)
    {
        $search = $request->input('search');

        $inventories = Inventory::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('sku', 'like', "%{$search}%");
        })->get();

        $pdf = Pdf::loadView('inventory.pdf', compact('inventories', 'search'));

        return $pdf->download('inventory_report.pdf');
    }

    // 3. Standard CRUD Methods
    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        Inventory::create($request->all());
        return redirect()->route('inventory.index')->with('success', 'Item added to inventory.');
    }

    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $inventory->update($request->all());
        return redirect()->route('inventory.index')->with('success', 'Inventory item updated.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Item deleted.');
    }
}
