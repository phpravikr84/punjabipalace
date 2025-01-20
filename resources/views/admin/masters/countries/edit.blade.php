@extends('layouts.backend')

@section('title', 'Edit Country')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Country</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('countries.update', $country->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Country Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $country->name }}" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

