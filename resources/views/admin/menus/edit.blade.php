@extends('layouts.backend')

@section('title', 'Edit Menu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Menu</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Menu Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $menu->title }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
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
                            <textarea name="description" id="description" class="form-control" required>{{ $menu->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $menu->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-12">
                        <h5>Submenus</h5>
                        <div id="submenu-container">
                            @php $lastIndex = 0 @endphp
                            @forelse($menu->submenus as $index => $submenu)
                                <div class="submenu-item mb-3">
                                    <label class="form-label">Submenu Title</label>
                                    <input type="text" name="submenus[{{ $index }}][title]" class="form-control" value="{{ $submenu->title }}" placeholder="Submenu Title">

                                    <label class="form-label mt-2">Description</label>
                                    <textarea name="submenus[{{ $index }}][description]" class="form-control" placeholder="Submenu Description">{{ $submenu->description }}</textarea>

                                    <label class="form-label mt-2">Status</label>
                                    <select name="submenus[{{ $index }}][status]" class="form-control">
                                        <option value="1" {{ $submenu->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $submenu->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>

                                    <button type="button" class="btn btn-danger mt-3 remove-submenu">Remove</button>
                                </div>
                                @php $lastIndex = $index @endphp
                            @empty
                                <p>No submenus available. Add new ones below.</p>
                            @endforelse
                        </div>
                        <input type="hidden" name="editLastIndex" id="editLastIndex" value="{{ $lastIndex+1 }}" />
                        <button type="button" id="edit-submenu" class="btn btn-secondary mb-3">Add Submenu </button>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection