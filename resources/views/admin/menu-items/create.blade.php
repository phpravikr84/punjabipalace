@extends('layouts.backend')

@section('title', 'Create Menu Item')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Menu Item</h1>
        </div>
        <div class="card-body">
        <form action="{{ route('menu_items.store') }}" method="POST">
        @csrf

        <input type="hidden" name="menu_id" value="{{ $menu->id }}">

        <div class="mb-3">
            <label for="title" class="form-label">Item Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ old('link') }}" required>
            @error('link')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ old('order') ?? 0 }}" required>
            @error('order')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('menu_items.index', ['menu_id' => $menu->id]) }}" class="btn btn-secondary">Cancel</a>
    </form>
        </div>
    </div>
</div>
@endsection

