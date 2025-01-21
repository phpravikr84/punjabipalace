@extends('layouts.backend')

@section('title', 'Menus')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Menus</h1>
            <a href="{{ route('menus.create') }}" class="btn btn-primary ml-auto">Add Menus</a>
        </div>
        <div class="card-body">
            <table id="default_dt" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Submenus</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $menu->category->name ?? 'N/A' }}</td>
                            <td>{{ $menu->title }}</td>
                            <td>
                                @if($menu->submenus->isNotEmpty())
                                    <ul class="list-unstyled">
                                        @foreach($menu->submenus as $submenu)
                                            <li>{{ $submenu->title }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $menu->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No menus found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
