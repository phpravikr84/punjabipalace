@extends('layouts.backend')

@section('title', 'Unit of Measurements')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Unit of Measurements</h1>
            <a href="{{ route('uoms.create') }}" class="btn btn-primary ml-auto">Add Unit of Measurements</a>
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UOM Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($uoms as $uom)
                    <tr>
                        <td>{{ $uom->id }}</td>
                        <td>{{ $uom->uom_name }}</td>
                        <td>{{ $uom->uom_desc }}</td>
                        <td>
                            <a href="{{ route('uoms.edit', $uom->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
