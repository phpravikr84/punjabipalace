@extends('layouts.backend')

@section('title', 'Company Create')

@section('content')
<div class="container">
    <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary ml-auto">Add Company</a>
    </div>

        <div class="card-body">
        <table  id="admin_companies" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Company Logo</th>
                <th>Contact Person</th>
                <th>Type</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->companyname }}</td>
                    <td>@if($company->company_logo)
                        <img src="{{ asset('storage/' . $company->company_logo) }}" alt="Company Logo" class="mt-2" height="50">
                    @endif</td>
                    <td>{{ $company->contact_person_name }}</td>
                    <td>{{ $company->company_type == 1 ? 'Pvt Ltd' : 'Sole Proprietor' }}</td>
                    <td>{{ $company->caddr }}</td>
                    <td>{{ $company->city_name }}</td>
                    <td>{{ $company->state_name }}</td>
                    <td>{{ $company->country_name }}</td>
                    <td>{{ $company->active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
