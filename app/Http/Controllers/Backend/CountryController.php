<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // List countries
    public function index()
    {
        $countries = Country::all();
        return view('admin.masters.countries.index', compact('countries'));
    }

    // Show create form
    public function create()
    {
        return view('admin.masters.countries.create');
    }

    // Store country
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:countries|max:255']);

        Country::create(['name' => $request->name]);

        return redirect()->route('admin.masters.countries.index')->with('success', 'Country created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.masters.countries.edit', compact('country'));
    }

    // Update country
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|max:255']);

        $country = Country::findOrFail($id);
        $country->update(['name' => $request->name]);

        return redirect()->route('admin.masters.countries.index')->with('success', 'Country updated successfully.');
    }

    // List country
    public function getCountry($id="")
    {
        if($id){
           $countries = Country::where('id', $id)->first();
        } else {
           $countries = Country::all();;
        }
        $http_code = 200;
        $this->message['status'] = trans('messages.success');
        $this->message['countries'] = $countries;
        return response()->json($this->message, $http_code);
    }
}
