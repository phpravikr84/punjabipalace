@extends('layouts.backend')

@section('title', 'Create City')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create City</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('cities.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label for="state_id">State</label>
                    <select name="state_id" class="form-control" required>
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }} ({{ $state->country->name }})</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
