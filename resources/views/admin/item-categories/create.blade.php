@extends('layouts.backend')

@section('title', 'Create Item Category')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Item Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('item-categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="item_category_name">Name</label>
                    <input type="text" name="item_category_name" id="item_category_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="item_category_desc">Description</label>
                    <input type="text" name="item_category_desc" id="item_category_desc" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

