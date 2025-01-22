@extends('layouts.backend')

@section('title', 'Create Purchase')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Purchase</h1>
        </div>
        <div class="card-body">
            <form name="purchaseForm" id="purchaseForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="odate" class="form-label">Date</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="odate" id="odate" value="2025-01-22" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tran_no" class="form-label">Tran No.</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="tran_no" id="tran_no" value="{{ $invoice_no }}" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="delivery_date" class="form-label">Delivery Date</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="delivery_date" id="delivery_date" value="2025-01-22" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vendor Section -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-light font-weight-bold d-flex justify-content-between align-items-center">
                                <span>Vendor:</span>
                                <input class="vendor_type" type="checkbox" checked data-toggle="toggle" data-on="Third Party" data-off="In House" data-onstyle="primary" data-offstyle="warning">
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="vendor_id" class="form-label">Select Vendor<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="vendor_id" id="vendor_id" required>
                                            <option selected disabled value="">Select Vendor</option>
                                            <!-- Vendor options will be dynamically populated -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item Type Section -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-light font-weight-bold">Select Item Type: </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="stock_item_type" id="ingredient_item" value="ingredient_item" required>
                                            <label class="form-check-label" for="ingredient_item">Ingredient Item</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="stock_item_type" id="menu_item" value="menu_item" required>
                                            <label class="form-check-label" for="menu_item">Menu Item</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Choose Item Section -->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header bg-light font-weight-bold">Choose Item</div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>Select Item<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="stock_item_list" id="stock_item_list" required>
                                            <option selected disabled value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Select Type (In/Out)<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" checked data-toggle="toggle" data-on="Stock In" data-off="Stock Out" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label>Remarks (If stock type 'Out')</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <select class="form-control" name="stock_remarks" id="stock_remarks" required>
                                            <option selected disabled value="">Select</option>
                                            <option value="purchase">Purchase</option>
                                            <option value="purchase_return">Purchase Return</option>
                                            <option value="expired">Expired</option>
                                            <option value="damaged">Damaged</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="inv_qty" class="form-label">Qty.</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" class="form-control" name="inv_qty" id="inv_qty" min="1" value="1" step="0.01" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="unit_price" class="form-label">Unit Price</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" name="unit_price" id="unit_price" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="uom_id" class="form-label">Unit Price Measurement</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="uom_id" id="uom_id" required>
                                            <option selected disabled value="">Select</option>
                                            @if($uoms)
                                                @foreach($uoms as $uom)
                                                    <option value="{{ $uom->id }}">{{ $uom->uom_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary" id="add_stock_btn">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Selected Items Table -->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header bg-light font-weight-bold">Selected Items</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="table-success">
                                            <tr>
                                                <th>Slno</th>
                                                <th>Item Name</th>
                                                <th>Tran Type (In/Out)</th>
                                                <th>Remarks</th>
                                                <th>Qty</th>
                                                <th>Unit Price</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="stockaddItems">
                                            <!-- Dynamic content goes here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- File Upload Section -->
                    <div class="col-md-6">
                        <label for="file_attach" class="form-label">Purchase Bill (Format: pdf, jpg, png allowed)</label>
                        <input type="file" class="form-control" name="file_attach" id="file_attach">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end mt-4">
                        <input type="submit" class="btn btn-success" name="subbtn" id="subbtn" value="Submit" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

