@extends('layouts.backend')

@section('title', 'Edit City')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit City</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('cities.update', $city->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $city->name }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="state_id">State</label>
                    <select name="state_id" class="form-control" required>
                        @foreach ($states as $state)
                        <option value="{{ $state->id }}" @if($state->id == $city->state_id) selected @endif>
                            {{ $state->name }} ({{ $state->country->name }})
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
