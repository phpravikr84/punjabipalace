@extends('layouts.backend')

@section('title', 'Dietary Attributes')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Dietary Attributes</h1>
            <a href="{{ route('dietary-attributes.create') }}" class="btn btn-primary ml-auto">Add Dietary Attributes</a>
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Attribute</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($dietaryAttributes as $dietaryAttribute)
                    <tr>
                        <td>{{ $dietaryAttribute->id }}</td>
                        <td>{{ $dietaryAttribute->attribute }}</td>
                        <td>{{ $dietaryAttribute->description }}</td>
                        <td>
                            <a href="{{ route('dietary-attributes.edit', $dietaryAttribute->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
