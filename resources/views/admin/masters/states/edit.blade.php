@extends('layouts.backend')

@section('title', 'Edit State')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit State</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('states.update', $state->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">State Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $state->name }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="country_id">Country</label>
                    <select name="country_id" class="form-control" required>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @if($country->id == $state->country_id) selected @endif>
                            {{ $country->name }}
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

