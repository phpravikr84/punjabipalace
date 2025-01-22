<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\MenuItem;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Uom;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(){

        return view('admin.purchase.index');
    }

    public function create(){

        $vendors =  Vendor::all();
        $uoms = Uom::all();
         // Fetch the last inserted record
         $lastItem = Purchase::orderBy('id', 'desc')->first();

         // If there's no record, set item_code to 'IT_1'
         if (!$lastItem) {
             $invoice_no = 'INV-1';
         } else {
             // Generate item_code based on the last inserted ID
             $invoice_no = 'INV-' . ($lastItem->id + 1);
         }
        return view('admin.purchase.create', compact('vendors', 'uoms', 'invoice_no'));
    }


    /**
     * Get the list of vendors.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVendors()
    {
        $vendors = Vendor::join('users', 'vendors.uid', '=', 'users.id')
            ->where('users.role_id', 3)
            ->where('users.status', 1) // Active users only
            ->select('vendors.id', 'vendors.sname as name', 'users.email', 'users.contact_number')
            ->get();

        return response()->json($vendors);
    }

    /**
     * Get the list of restaurant owners.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOwners()
    {
        $owners = User::where('role_id', 1)
            ->where('status', 1) // Active users only
            ->select('id', 'name', 'email', 'contact_number')
            ->get();

        return response()->json($owners);
    }
}