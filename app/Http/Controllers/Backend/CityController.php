<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CityController extends Controller
{
     // List cities
     public function index()
     {
         $cities = City::with('state.country')->get();
         return view('admin.masters.cities.index', compact('cities'));
     }
 
     // Show create form
     public function create()
     {
         $states = State::with('country')->get();
         return view('admin.masters.cities.create', compact('states'));
     }
 
     // Store city
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|max:255',
             'state_id' => 'required|exists:states,id',
         ]);
 
         City::create($request->only('name', 'state_id'));
 
         return redirect()->route('admin.masters.cities.index')->with('success', 'City created successfully.');
     }
 
     // Show edit form
     public function edit($id)
     {
         $city = City::findOrFail($id);
         $states = State::with('country')->get();
         return view('admin.masters.cities.edit', compact('city', 'states'));
     }
 
     // Update city
     public function update(Request $request, $id)
     {
         $request->validate([
             'name' => 'required|max:255',
             'state_id' => 'required|exists:states,id',
         ]);
 
         $city = City::findOrFail($id);
         $city->update($request->only('name', 'state_id'));
 
         return redirect()->route('admin.masters.cities.index')->with('success', 'City updated successfully.');
     }

     // List cities
    public function getCity($stateId)
    {
        $cities = City::where('state_id', $stateId)->get(['id', 'name']);
        return response()->json(['cities' => $cities]);
    }

}
