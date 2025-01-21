@extends('layouts.backend')

@section('title', 'Create Menu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Menu</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Menu Section -->
                    <div class="col-md-12">
                        <h5>Menu Details</h5>
                        <div class="mb-3">
                            <label for="title" class="form-label">Menu Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                            @error('description')
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
                    </div>

                    <!-- Submenu Section -->
                    <div class="col-md-12">
                        <h5>Submenus (Optional)</h5>
                        <div id="submenu-container">
                            <div class="submenu-item mb-3">
                                <label for="submenus[0][title]" class="form-label">Submenu Title</label>
                                <input type="text" name="submenus[0][title]" class="form-control" placeholder="Submenu Title">
                                @error('submenus.*.title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="submenus[0][description]" class="form-label mt-2">Description</label>
                                <textarea name="submenus[0][description]" class="form-control" placeholder="Submenu Description"></textarea>
                                @error('submenus.*.description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="submenus[0][status]" class="form-label mt-2">Status</label>
                                <select name="submenus[0][status]" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('submenus.*.status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <button type="button" class="btn btn-danger mt-3 remove-submenu">Remove</button>
                            </div>
                        </div>

                        <button type="button" id="add-submenu" class="btn btn-secondary mt-3">Add Submenu</button>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
