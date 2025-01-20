@extends('layouts.backend')

@section('title', 'Type of Tables')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Type of Tables</h1>
            <a href="{{ route('tables.create') }}" class="btn btn-primary ml-auto">Add Type of Tables</a>
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Table No</th>
                    <th>Seating Capacity</th>
                    <th>Icon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tables as $table)
                <tr>
                    <td>{{ $table->id }}</td>
                    <td>{{ $table->table_no }}</td>
                    <td>{{ $table->seating_capacity }}</td>
                    <td>
                        @if($table->icon_image)
                            <img src="{{ asset('storage/' . $table->icon_image) }}" alt="Icon" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tables.edit', $table) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tables.destroy', $table) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
