<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with(['category', 'submenus'])->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|integer',
            'description' => 'required',
            'submenus' => 'nullable|array',
            'submenus.*.title' => 'required_with:submenus|string|max:255',
            'submenus.*.description' => 'required_with:submenus|string',
            'submenus.*.status' => 'required_with:submenus|integer',
        ]);

        $menu = Menu::create($request->only(['category_id', 'title', 'status', 'description']));

        if ($request->has('submenus')) {
            foreach ($request->input('submenus') as $submenu) {
                $menu->submenus()->create($submenu);
            }
        }

        return redirect()->route('menus.index')->with('success', 'Menu and submenus created successfully.');
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();
        $menu->load('submenus'); // Load associated submenus
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        //dd($request);
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|integer',
            'description' => 'required',
            'submenus' => 'nullable|array',
            'submenus.*.id' => 'nullable|exists:submenus,id',
            'submenus.*.title' => 'required_with:submenus|string|max:255',
            'submenus.*.description' => 'required_with:submenus|string',
            'submenus.*.status' => 'required_with:submenus|integer',
        ]);

        // Update the menu
        $menu->update($request->only(['category_id', 'title', 'status', 'description']));

        if ($request->has('submenus')) {
            $submittedSubmenuIds = collect($request->input('submenus'))
                ->pluck('id')
                ->filter() // Remove null values
                ->toArray();

            // Remove submenus that are no longer present in the request
            $menu->submenus()
                ->whereNotIn('id', $submittedSubmenuIds)
                ->delete();

            foreach ($request->input('submenus') as $submenuData) {
                if (isset($submenuData['id']) && !empty($submenuData['id'])) {
                    // Update existing submenu
                    $submenu = Submenu::findOrFail($submenuData['id']);
                    $submenu->update($submenuData);
                } else {
                    // Create new submenu
                    $menu->submenus()->create([
                        'title' => $submenuData['title'],
                        'description' => $submenuData['description'],
                        'status' => $submenuData['status'],
                    ]);
                }
            }
        } else {
            // If no submenus are submitted, delete all existing submenus
            $menu->submenus()->delete();
        }

        return redirect()->route('menus.index')->with('success', 'Menu and submenus updated successfully.');
    }



    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
