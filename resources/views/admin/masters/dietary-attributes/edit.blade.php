@extends('layouts.backend')

@section('title', 'Edit Dietary Attributes')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Dietary Attributes</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('dietary-attributes.update', $dietaryAttribute->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Dietary Attribute</label>
                    <input type="text" class="form-control" id="attribute" name="attribute" value="{{ old('attribute', $dietaryAttribute->attribute) }}" required>
                        @error('attribute')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required>{{ old('description', $dietaryAttribute->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Attribute</button>
            </form>
        </div>
    </div>
</div>
@endsection

