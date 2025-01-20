<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\Storage;

class TableController extends Controller
{
    // Display a listing of the tables
    public function index()
    {
        $tables = Table::all();
        return view('admin.masters.tables.index', compact('tables'));
    }

    // Show the form for creating a new table
    public function create()
    {
        return view('admin.masters.tables.create');
    }

    // Store a newly created table in storage
    public function store(Request $request)
    {
        $request->validate([
            'table_no' => 'required|string|max:20|unique:tables,table_no',
            'seating_capacity' => 'required|integer|min:1',
            'icon_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['table_no', 'seating_capacity']);

        if ($request->hasFile('icon_image')) {
            $data['icon_image'] = $request->file('icon_image')->store('icons', 'public');
        }

        Table::create($data);

        return redirect()->route('tables.index')->with('success', 'Table created successfully.');
    }

    // Show the form for editing the specified table
    public function edit(Table $table)
    {
        return view('admin.masters.tables.edit', compact('table'));
    }

    // Update the specified table in storage
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'table_no' => 'required|string|max:20|unique:tables,table_no,' . $table->id,
            'seating_capacity' => 'required|integer|min:1',
            'icon_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['table_no', 'seating_capacity']);

        if ($request->hasFile('icon_image')) {
            if ($table->icon_image) {
                Storage::disk('public')->delete($table->icon_image);
            }
            $data['icon_image'] = $request->file('icon_image')->store('icons', 'public');
        }

        $table->update($data);

        return redirect()->route('tables.index')->with('success', 'Table updated successfully.');
    }

    // Remove the specified table from storage
    public function destroy(Table $table)
    {
        if ($table->icon_image) {
            Storage::disk('public')->delete($table->icon_image);
        }

        $table->delete();

        return redirect()->route('tables.index')->with('success', 'Table deleted successfully.');
    }
}
