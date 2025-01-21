@extends('layouts.backend')

@section('title', 'Create Vendor')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Vendor</h1>
        </div>
        <div class="card-body">
             <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('vendors.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vendor Details</h5>

                        <div class="form-group">
                            <label for="sname">Vendor Name</label>
                            <input type="text" class="form-control" id="sname" name="sname" value="{{ old('sname') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tax_number">Tax Number</label>
                            <input type="text" class="form-control" id="tax_number" name="tax_number" value="{{ old('tax_number') }}">
                        </div>

                        <div class="form-group">
                            <label for="saddr">Address</label>
                            <input type="text" class="form-control" id="saddr" name="saddr" value="{{ old('saddr') }}">
                        </div>

                        <div class="form-group">
                            <label for="scity">City</label>
                            <input type="text" class="form-control" id="scity" name="scity" value="{{ old('scity') }}">
                        </div>

                        <div class="form-group">
                            <label for="sdist">District</label>
                            <input type="text" class="form-control" id="sdist" name="sdist" value="{{ old('sdist') }}">
                        </div>

                        <div class="form-group">
                            <label for="spin">PIN Code</label>
                            <input type="text" class="form-control" id="spin" name="spin" value="{{ old('spin') }}">
                        </div>

                        <div class="form-group">
                            <label for="sstate">State</label>
                            <input type="text" class="form-control" id="sstate" name="sstate" value="{{ old('sstate') }}">
                        </div>

                        <div class="form-group">
                            <label for="scountry">Country</label>
                            <input type="text" class="form-control" id="scountry" name="scountry" value="{{ old('scountry') }}">
                        </div>

                        <div class="form-group">
                            <label for="scperson">Contact Person</label>
                            <input type="text" class="form-control" id="scperson" name="scperson" value="{{ old('scperson') }}">
                        </div>

                        <div class="form-group">
                            <label for="scmob">Mobile Number</label>
                            <input type="text" class="form-control" id="scmob" name="scmob" value="{{ old('scmob') }}">
                        </div>

                        <div class="form-group">
                            <label for="sphone">Phone Number</label>
                            <input type="text" class="form-control" id="sphone" name="sphone" value="{{ old('sphone') }}">
                        </div>

                        <div class="form-group">
                            <label for="cin">Company Identification Number (CIN)</label>
                            <input type="text" class="form-control" id="cin" name="cin" value="{{ old('cin') }}">
                        </div>

                        <div class="form-group">
                            <label for="pan">PAN Number</label>
                            <input type="text" class="form-control" id="pan" name="pan" value="{{ old('pan') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="accholder">Account Holder Name</label>
                            <input type="text" class="form-control" id="accholder" name="accholder" value="{{ old('accholder') }}">
                        </div>

                        <div class="form-group">
                            <label for="accno">Account Number</label>
                            <input type="text" class="form-control" id="accno" name="accno" value="{{ old('accno') }}">
                        </div>

                        <div class="form-group">
                            <label for="bankname">Bank Name</label>
                            <input type="text" class="form-control" id="bankname" name="bankname" value="{{ old('bankname') }}">
                        </div>

                        <div class="form-group">
                            <label for="bankbranch">Bank Branch</label>
                            <input type="text" class="form-control" id="bankbranch" name="bankbranch" value="{{ old('bankbranch') }}">
                        </div>

                        <div class="form-group">
                            <label for="ifsc">IFSC Code</label>
                            <input type="text" class="form-control" id="ifsc" name="ifsc" value="{{ old('ifsc') }}">
                        </div>

                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea class="form-control" id="remarks" name="remarks">{{ old('remarks') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="infotext">Information Text</label>
                            <textarea class="form-control" id="infotext" name="infotext">{{ old('infotext') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-success">Create Vendor</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

