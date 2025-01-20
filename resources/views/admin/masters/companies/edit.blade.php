@extends('layouts.backend')

@section('title', 'Edit Company')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Company</h1>
        </div>
        <div class="card-body">
        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
       
                <input type="hidden" name="edit_company_id" id="edit_company_id" value="{{ $company->id }}" />

                <!-- Company Type -->
                <div class="form-group">
                    <label for="company_type">Company Type</label>
                    <select name="company_type" id="company_type" class="form-control" required>
                        <option value="">Select Type</option>
                        @foreach($companyTypes as $key => $companyType)
                            <option value="{{ $key }}" {{ $company->company_type == $key ? 'selected' : '' }}>{{ $companyType }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Company Name -->
                <div class="form-group mt-3">
                    <label for="companyname">Company Name</label>
                    <input type="text" name="companyname" id="companyname" class="form-control" value="{{ $company->companyname }}" required>
                </div>

                <!-- Contact Person Name -->
                <div class="form-group mt-3">
                    <label for="contact_person_name">Contact Person Name</label>
                    <input type="text" name="contact_person_name" id="contact_person_name" class="form-control" value="{{ $company->contact_person_name }}" required>
                </div>

                
                <!-- Designation -->
                <div class="form-group mt-3">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" id="designation" class="form-control" value="{{ $company->designation }}">
                </div>

                <!-- Registration Number -->
                <div class="form-group mt-3">
                    <label for="registrationno">Registration Number</label>
                    <input type="text" name="registrationno" id="registrationno" class="form-control" value="{{ $company->registrationno }}">
                </div>

                <!-- TIN Number -->
                <div class="form-group mt-3">
                    <label for="tinno">TIN Number</label>
                    <input type="text" name="tinno" id="tinno" class="form-control" value="{{ $company->tinno }}">
                </div>
                
                <!-- Country -->
                <div class="form-group mt-3">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ $company->country == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- State -->
                <div class="form-group mt-3">
                    <label for="state">State</label>
                    <select name="state" id="select_company_state" class="form-control" required>
                        <option value="">Select State</option>
                    </select>
                </div>

                <!-- City -->
                <div class="form-group mt-3">
                    <label for="city">City</label>
                    <select name="city" id="select_company_city" class="form-control" required>
                        <option value="">Select City</option>
                    </select>
                </div>

                
                <!-- Address -->
                <div class="form-group mt-3">
                    <label for="caddr">Address</label>
                    <input type="text" name="caddr" id="caddr" class="form-control" value="{{ $company->caddr }}" required>
                </div>


                <!-- District -->
                <div class="form-group mt-3">
                    <label for="dist">District/Region</label>
                    <input type="text" name="dist" id="dist" class="form-control" value="{{ $company->dist }}">
                </div>

                <!-- Pin Code -->
                <div class="form-group mt-3">
                    <label for="pin">Pin Code</label>
                    <input type="text" name="pin" id="pin" class="form-control" value="{{ $company->pin }}">
                </div>

                <!-- Contact Information -->
                <div class="form-group mt-3">
                    <label for="cmob">Mobile Number</label>
                    <input type="text" name="cmob" id="cmob" class="form-control" value="{{ $company->cmob }}">
                </div>

                <div class="form-group mt-3">
                    <label for="cphone">Phone Number</label>
                    <input type="text" name="cphone" id="cphone" class="form-control" value="{{ $company->cphone }}">
                </div>

                <!-- Remarks -->
                <div class="form-group mt-3">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" class="form-control" rows="3">{{ $company->remarks }}</textarea>
                </div>

                <!-- Active -->
                <div class="form-group mt-3">
                    <label for="active">Active</label>
                    <select name="active" id="active" class="form-control">
                        <option value="1" {{ $company->active ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$company->active ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <!-- Company Logo -->
                <div class="form-group mt-3">
                    <label for="company_logo">Logo</label>
                    <input type="file" name="company_logo" id="company_logo" class="form-control">
                    @if($company->company_logo)
                        <img src="{{ asset('storage/' . $company->company_logo) }}" alt="Company Logo" class="mt-2" height="100">
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-4">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

