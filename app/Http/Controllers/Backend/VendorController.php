<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            // Add validation for vendor-specific fields
        ]);

        // Create the user first
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3, // Vendor role
            'status' => 1, // Active status
        ]);

        // Create the vendor record
        Vendor::create([
            'uid' => $user->id,
            'sname' => $request->sname,
            'tax_number' => $request->tax_number,
            'saddr' => $request->saddr,
            'scity' => $request->scity,
            'sdist' => $request->sdist,
            'spin' => $request->spin,
            'sstate' => $request->sstate,
            'scountry' => $request->scountry,
            'scperson' => $request->scperson,
            'scmob' => $request->scmob,
            'sphone' => $request->sphone,
            'cin' => $request->cin,
            'pan' => $request->pan,
            'email' => $request->email,
            'accholder' => $request->accholder,
            'accno' => $request->accno,
            'bankname' => $request->bankname,
            'bankbranch' => $request->bankbranch,
            'ifsc' => $request->ifsc,
            'remarks' => $request->remarks,
            'infotext' => $request->infotext,
        ]);

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        $request->validate([
            'sname' => 'required|string|max:100',
            // Add validation for other fields
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}
