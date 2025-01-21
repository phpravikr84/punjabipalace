<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index()
    {
        $categories = ItemCategory::all();
        return view('admin.item-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.item-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_category_name' => 'required|string|max:255',
            'item_category_desc' => 'nullable|string|max:255',
        ]);

        ItemCategory::create($request->all());

        return redirect()->route('item-categories.index');
    }

    public function edit(ItemCategory $itemCategory)
    {
        return view('admin.item-categories.edit', compact('itemCategory'));
    }

    public function update(Request $request, ItemCategory $itemCategory)
    {
        $request->validate([
            'item_category_name' => 'required|string|max:255',
            'item_category_desc' => 'nullable|string|max:255',
        ]);

        $itemCategory->update($request->all());

        return redirect()->route('item-categories.index');
    }

    public function destroy(ItemCategory $itemCategory)
    {
        $itemCategory->delete();
        return redirect()->route('item-categories.index');
    }
}
