@extends('layouts.backend')

@section('title', 'Create Item')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Item</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="item_code">Item Code</label>
                    <input type="text" name="item_code" id="item_code" class="form-control" value="{{ $item_code }}" readonly required>
                </div>
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="item_category_id">Category</label>
                    <select name="item_category_id" id="item_category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->item_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="uom_id">UOM</label>
                    <select name="uom_id" id="select_item_uom_id" class="form-control">
                        @foreach($uoms as $uom)
                            <option value="{{ $uom->id }}">{{ $uom->uom_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <!-- <label for="uom_name">UOM Name</label> -->
                    <input type="hidden" name="uom_name" id="select_item_uom_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

