@extends('layouts.backend')

@section('title', 'Create State')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create State</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('states.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">State Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label for="country_id">Country</label>
                    <select name="country_id" class="form-control" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
