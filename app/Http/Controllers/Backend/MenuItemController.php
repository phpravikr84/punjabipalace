<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\MenuItem;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with(['menu', 'category'])->get();
        return view('admin.menu-items.index', compact('menuItems'));
    }

    public function create()
    {
        $menus = Menu::pluck('title', 'id');
        $categories = Category::where('type', 1)->pluck('name', 'id');
        return view('admin.menu-items.create', compact('menus', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id',
            'category_id' => 'required|exists:categories,id',
            'menu_type' => 'required|in:Dine_In,Takeaway,Both',
        ]);

        MenuItem::create($request->all());
        return redirect()->route('menu-items.index')->with('success', 'Menu Item created successfully.');
    }

    public function edit(MenuItem $menuItem)
    {
        $menus = Menu::pluck('title', 'id');
        $categories = Category::where('type', 1)->pluck('name', 'id');
        return view('admin.menu-items.edit', compact('menuItem', 'menus', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id',
            'category_id' => 'required|exists:categories,id',
            'menu_type' => 'required|in:Dine_In,Takeaway,Both',
        ]);

        $menuItem->update($request->all());
        return redirect()->route('menu-items.index')->with('success', 'Menu Item updated successfully.');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Menu Item deleted successfully.');
    }
}
