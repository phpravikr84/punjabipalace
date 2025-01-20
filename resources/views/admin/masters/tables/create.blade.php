@extends('layouts.backend')

@section('title', 'Create Type of Table')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Type of Table</h1>
        </div>
        <div class="card-body">
        <form action="{{ route('tables.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="table_no" class="form-label">Table No</label>
                <input type="text" name="table_no" class="form-control" value="{{ old('table_no') }}" required>
            </div>

            <div class="mb-3">
                <label for="seating_capacity" class="form-label">Seating Capacity</label>
                <input type="number" name="seating_capacity" class="form-control" value="{{ old('seating_capacity') }}" required>
            </div>

            <div class="mb-3">
                <label for="icon_image" class="form-label">Icon Image</label>
                <input type="file" name="icon_image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Create</button>
        </form>
        </div>
    </div>
</div>
@endsection

