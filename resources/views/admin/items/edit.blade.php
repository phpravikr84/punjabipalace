@extends('layouts.backend')

@section('title', 'Edit Menu Items')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Menu Items</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="item_code">Item Code</label>
                    <input type="text" name="item_code" id="item_code" class="form-control" value="{{ old('item_code', $item->item_code) }}" readonly required>
                </div>
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control" value="{{ old('item_name', $item->item_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="item_category_id">Category</label>
                    <select name="item_category_id" id="item_category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $item->item_category_id == $category->id ? 'selected' : '' }}>{{ $category->item_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="uom_id">UOM</label>
                    <select name="uom_id" id="uom_id" class="form-control">
                        @foreach($uoms as $uom)
                            <option value="{{ $uom->id }}" {{ $item->uom_id == $uom->id ? 'selected' : '' }}>{{ $uom->uom_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <!-- <label for="uom_name">UOM Name</label> -->
                    <input type="hidden" name="uom_name" id="uom_name" class="form-control" value="{{ old('uom_name', $item->uom_name) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection

