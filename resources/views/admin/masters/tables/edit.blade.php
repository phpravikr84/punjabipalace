@extends('layouts.backend')

@section('title', 'Edit Type of Tables')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Type of Tables</h1>
        </div>
        <div class="card-body">
        <form action="{{ route('tables.update', $table) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="table_no" class="form-label">Table No</label>
                <input type="text" name="table_no" class="form-control" value="{{ $table->table_no }}" required>
            </div>

            <div class="mb-3">
                <label for="seating_capacity" class="form-label">Seating Capacity</label>
                <input type="number" name="seating_capacity" class="form-control" value="{{ $table->seating_capacity }}" required>
            </div>

            <div class="mb-3">
                <label for="icon_image" class="form-label">Icon Image</label>
                <input type="file" name="icon_image" class="form-control">
                @if($table->icon_image)
                    <p>Current Icon: <img src="{{ asset('storage/' . $table->icon_image) }}" alt="Icon" width="50"></p>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
        </div>
    </div>
</div>
@endsection

