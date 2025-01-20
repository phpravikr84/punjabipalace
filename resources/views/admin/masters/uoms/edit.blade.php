@extends('layouts.backend')

@section('title', 'Edit Unit of Measurements')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Unit of Measurements</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('uoms.update', $uoms->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Unit of Material</label>
                    <input type="text" class="form-control" id="uom_name" name="uom_name" value="{{ old('uom_name', $uoms->uom_name) }}" required>
                        @error('uom_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="uom_desc">Description</label>
                        <textarea class="form-control" id="uom_desc" name="uom_descc" required>{{ old('uom_desc', $uoms->uom_desc) }}</textarea>
                        @error('uom_desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Attribute</button>
            </form>
        </div>
    </div>
</div>
@endsection

