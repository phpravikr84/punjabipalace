<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DietaryAttribute;
use Illuminate\Http\Request;

class DietaryAttributeController extends Controller
{
    // Show list of dietary attributes
    public function index()
    {
        $dietaryAttributes = DietaryAttribute::all(); // Get all dietary attributes
        return view('admin.masters.dietary-attributes.index', compact('dietaryAttributes'));
    }

    public function create()
    {
        return view('admin.masters.dietary-attributes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        DietaryAttribute::create([
            'attribute' => $request->attribute,
            'description' => $request->description,
        ]);

        return redirect()->route('dietary-attributes.index')->with('success', 'Dietary attribute created successfully.');
    }

    // Show form for editing a dietary attribute
    public function edit($id)
    {
        $dietaryAttribute = DietaryAttribute::findOrFail($id); // Find dietary attribute by ID
        return view('admin.masters.dietary-attributes.edit', compact('dietaryAttribute'));
    }

    // Update the dietary attribute in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'attribute' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $dietaryAttribute = DietaryAttribute::findOrFail($id); // Find dietary attribute by ID
        $dietaryAttribute->update([
            'attribute' => $request->attribute,
            'description' => $request->description,
        ]);

        return redirect()->route('dietary-attributes.index')->with('success', 'Dietary attribute updated successfully.');
    }
}
