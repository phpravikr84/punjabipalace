<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::join('countries', 'countries.id', '=', 'companies.country')
                            ->join('states', 'states.id', '=', 'companies.state')
                            ->join('cities', 'cities.id', '=', 'companies.city')
                            ->select(
                                'companies.*', 
                                'countries.name as country_name', 
                                'states.name as state_name', 
                                'cities.name as city_name'
                            )
                            ->get();

        return view('admin.masters.companies.index', compact('companies'));
    }

    public function create()
    {
        $companyTypes =  array(1 => 'Sole Trader', 2 => 'Partnership', 3 => 'Limited Company', 4 => 'Limited Liability Partnership', 5 => 'Proprietary Limited Company' );
        $companies = Company::all();
        $countries = Country::all();
        return view('admin.masters.companies.create', compact('companyTypes', 'companies', 'countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'companyname' => 'required|string|max:100',
            'contact_person_name' => 'nullable|string|max:100',
            'company_type' => 'required|integer|in:1,2',
            'caddr' => 'nullable|string|max:100',
            'city' => 'nullable|exists:cities,id',
            'dist' => 'nullable|string|max:50',
            'pin' => 'nullable|string|max:10',
            'state' => 'nullable|exists:states,id',
            'country' => 'nullable|exists:countries,id',
            'cmob' => 'nullable|string|max:15',
            'cphone' => 'nullable|string|max:20',
            'designation' => 'nullable|string|max:30',
            'registrationno' => 'nullable|string|max:50',
            'tinno' => 'nullable|string|max:50',
            'remarks' => 'nullable|string',
            'active' => 'required|boolean',
        ]);

        Company::create($validated);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $companyTypes =  array(1 => 'Sole Trader', 2 => 'Partnership', 3 => 'Limited Company', 4 => 'Limited Liability Partnership', 5 => 'Proprietary Limited Company' );
        $countries = Country::all();
        // Fetch the company and its related country, state, and city details
        $company = Company::where('companies.id', $id)
            ->join('countries', 'countries.id', '=', 'companies.country')
            ->join('states', 'states.id', '=', 'companies.state')
            ->join('cities', 'cities.id', '=', 'companies.city')
            ->select(
                'companies.*', 
                'countries.name as country_name', 
                'states.name as state_name', 
                'cities.name as city_name'
            )
            ->first(); // Use `first()` instead of `get()` to retrieve a single record

        // Ensure the company exists
        if (!$company) {
            return redirect()->route('admin.masters.company.index')->with('error', 'Company not found.');
        }

        // Pass the company to the edit view
        return view('admin.masters.companies.edit', compact('company', 'companyTypes', 'countries'));
    }

    // Update company
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'companyname' => 'required|string|max:100',
            'contact_person_name' => 'nullable|string|max:100',
            'company_type' => 'required|integer|in:1,2',
            'caddr' => 'nullable|string|max:100',
            'city' => 'nullable|exists:cities,id',
            'dist' => 'nullable|string|max:50',
            'pin' => 'nullable|string|max:10',
            'state' => 'nullable|exists:states,id',
            'country' => 'nullable|exists:countries,id',
            'cmob' => 'nullable|string|max:15',
            'cphone' => 'nullable|string|max:20',
            'designation' => 'nullable|string|max:30',
            'registrationno' => 'nullable|string|max:50',
            'tinno' => 'nullable|string|max:50',
            'remarks' => 'nullable|string',
            'active' => 'required|boolean',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Added company_image validation
        ]);

        // Find the company by ID
        $company = Company::find($id);

        // Ensure the company exists
        if (!$company) {
            return redirect()->route('admin.masters.company.index')->with('error', 'Company not found.');
        }

        // Handle image upload if a new image is provided
        if ($request->hasFile('company_logo')) {
            $imagePath = $request->file('company_logo')->store('company_logos', 'public'); // Store image and get the path
            $company->company_logo = $imagePath; // Update the company image
        }

        // Update the company details
        $company->update([
            'companyname' => $request->companyname,
            'contact_person_name' => $request->contact_person_name,
            'company_type' => $request->company_type,
            'caddr' => $request->caddr,
            'city' => $request->city,
            'dist' => $request->dist,
            'pin' => $request->pin,
            'state' => $request->state,
            'country' => $request->country,
            'cmob' => $request->cmob,
            'cphone' => $request->cphone,
            'designation' => $request->designation,
            'registrationno' => $request->registrationno,
            'tinno' => $request->tinno,
            'remarks' => $request->remarks,
            'active' => $request->active,
        ]);

        // Redirect with a success message
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }


      // Show edit form
      public function editCompany($id)
      {
          $companyTypes =  array(1 => 'Sole Trader', 2 => 'Partnership', 3 => 'Limited Company', 4 => 'Limited Liability Partnership', 5 => 'Proprietary Limited Company' );
          $countries = Country::all();
          // Fetch the company and its related country, state, and city details
          $company = Company::where('companies.id', $id)
              ->join('countries', 'countries.id', '=', 'companies.country')
              ->join('states', 'states.id', '=', 'companies.state')
              ->join('cities', 'cities.id', '=', 'companies.city')
              ->select(
                  'companies.*', 
                  'countries.name as country_name', 
                  'states.name as state_name', 
                  'cities.name as city_name'
              )
              ->first(); // Use `first()` instead of `get()` to retrieve a single record
  
          // Ensure the company exists
          if (!$company) {
            return response()->json(['company' => []]);
          }
  
          // Pass the company to the edit view
          return response()->json(['company' => $company]);
      }


}
