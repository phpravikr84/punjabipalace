@extends('layouts.backend')

@section('title', 'Menu Category')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Item Category</h1>
            <a href="{{ route('item-categories.create') }}" class="btn btn-primary ml-auto">Add Item Category</a>
        </div>
        <div class="card-body">
            <table id="default_dt" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->item_category_name }}</td>
                            <td>{{ $category->item_category_desc }}</td>
                            <td>
                                <a href="{{ route('item-categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('item-categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
