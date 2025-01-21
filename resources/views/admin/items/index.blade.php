@extends('layouts.backend')

@section('title', 'Items')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Items</h1>
            <a href="{{ route('items.create') }}" class="btn btn-primary ml-auto">Add Items</a>
        </div>
        <div class="card-body">
            <table  id="default_dt" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>UOM</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->item_code }}</td>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->itemCategory->item_category_name }}</td>
                            <td>{{ $item->uom_name }}</td>
                            <td>
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
