@extends('layouts.backend')

@section('title', 'Edit Item Category')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Item Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('item-categories.update', $itemCategory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="item_category_name">Name</label>
                    <input type="text" name="item_category_name" id="item_category_name" class="form-control" value="{{ old('item_category_name', $itemCategory->item_category_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="item_category_desc">Description</label>
                    <input type="text" name="item_category_desc" id="item_category_desc" class="form-control" value="{{ old('item_category_desc', $itemCategory->item_category_desc) }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection

