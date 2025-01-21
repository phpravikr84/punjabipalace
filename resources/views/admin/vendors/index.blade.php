@extends('layouts.backend')

@section('title', 'Vendors')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Vendors</h1>
            <a href="{{ route('vendors.create') }}" class="btn btn-primary ml-auto">Add Vendors</a>
        </div>
        <div class="card-body">
            <table  id="default_dt" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->sname }}</td>
                        <td>{{ $vendor->email }}</td>
                        <td>
                            <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
