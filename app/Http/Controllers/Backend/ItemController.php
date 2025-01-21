<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Uom; // Assuming you have a Uom model
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('itemCategory')->get();
        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        $categories = ItemCategory::all();
        $uoms = Uom::all(); // Assuming you have a Uom model for units of measurement
        // Fetch the last inserted record
        $lastItem = Item::orderBy('id', 'desc')->first();

        // If there's no record, set item_code to 'IT_1'
        if (!$lastItem) {
            $item_code = 'IT_1';
        } else {
            // Generate item_code based on the last inserted ID
            $item_code = 'IT_' . ($lastItem->id + 1);
        }
        return view('admin.items.create', compact('categories', 'uoms', 'item_code'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'item_category_id' => 'required|exists:item_categories,id',
            'uom_id' => 'required|exists:uoms,id',
            'uom_name' => 'required|string|max:255',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index');
    }

    public function edit(Item $item)
    {
        $categories = ItemCategory::all();
        $uoms = Uom::all();
        return view('admin.items.edit', compact('item', 'categories', 'uoms'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item_code' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'item_category_id' => 'required|exists:item_categories,id',
            'uom_id' => 'required|exists:uoms,id',
            'uom_name' => 'required|string|max:255',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
