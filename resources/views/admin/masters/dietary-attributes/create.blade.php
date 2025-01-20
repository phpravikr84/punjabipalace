@extends('layouts.backend')

@section('title', 'Create Dietary Attribute')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Dietary Attribute</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('dietary-attributes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="attribute">Attribute</label>
                    <input type="text" class="form-control" id="attribute" name="attribute" required>
                    @error('attribute')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

