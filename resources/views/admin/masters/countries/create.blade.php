@extends('layouts.backend')

@section('title', 'Create Country')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Country</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('countries.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Country Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

