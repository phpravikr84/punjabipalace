<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Uom;
use Illuminate\Http\Request;

class UomController extends Controller
{
    // Show list of Unit of Materials
    public function index()
    {
        $uoms = Uom::all(); // Get all Unit of Materials
        return view('admin.masters.uoms.index', compact('uoms'));
    }

    public function create()
    {
        return view('admin.masters.uoms.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'uom_name' => 'required|string|max:255',
            'uom_desc' => 'required|string',
        ]);

        Uom::create([
            'uom_name' => $request->uom_name,
            'uom_desc' => $request->uom_desc,
        ]);

        return redirect()->route('uoms.index')->with('success', 'Uom created successfully.');
    }

    // Show form for editing a Unit of Material
    public function edit($id)
    {
        $uoms = Uom::findOrFail($id); // Find Unit of Material by ID
        return view('admin.masters.uoms.edit', compact('uoms'));
    }

    // Update the Unit of Material in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'uom_name' => 'required|string|max:255',
            'uom_desc' => 'required|string',
        ]);

        $uom = Uom::findOrFail($id); // Find Unit of Material by ID
        $uom->update([
            'uom_name' => $request->uom_name,
            'uom_desc' => $request->uom_desc,
        ]);

        return redirect()->route('uoms.index')->with('success', 'Unit of Material updated successfully.');
    }
}
