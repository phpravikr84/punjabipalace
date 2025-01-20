@extends('layouts.backend')

@section('title', 'Create Unit of Measurement')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Unit of Measurement</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('uoms.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="uom_name">Attribute</label>
                    <input type="text" class="form-control" id="uom_name" name="uom_name" required>
                    @error('attribute')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="uom_desc" class="form-label">Description</label>
                    <textarea class="form-control" id="uom_desc" name="uom_desc" required></textarea>
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

