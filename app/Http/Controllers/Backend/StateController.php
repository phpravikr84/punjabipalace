<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StateController extends Controller
{
    // List states
    public function index()
    {
        $states = State::with('country')->get();
        return view('admin.masters.states.index', compact('states'));
    }

    // Show create form
    public function create()
    {
        $countries = Country::all();
        return view('admin.masters.states.create', compact('countries'));
    }

    // Store state
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        State::create($request->only('name', 'country_id'));

        return redirect()->route('admin.masters.states.index')->with('success', 'State created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $state = State::findOrFail($id);
        $countries = Country::all();
        return view('admin.masters.states.edit', compact('state', 'countries'));
    }

    // Update state
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $state = State::findOrFail($id);
        $state->update($request->only('name', 'country_id'));

        return redirect()->route('admin.masters.states.index')->with('success', 'State updated successfully.');
    }

    
     // List cities
    public function getState($countryId)
    {
         $states = State::where('country_id', $countryId)->get(['id', 'name']);
         return response()->json(['states' => $states]);
    }

    public function getAllStates()
    {
         $states = State::all();
         return response()->json(['states' => $states]);
    }

}
