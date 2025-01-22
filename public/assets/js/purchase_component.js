$(document).ready(function () {
    //On bage load Vendor list
    loadVendorList(); // Load Vendor list for "Third Party"
    // 1. Disable backdate selection on both calendars
    $("#odate, #delivery_date").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0, // Disable backdate
    });

    // 2. Toggle Vendor dropdown based on checkbox (Third Party or In-House)
     $('input.vendor_type[type="checkbox"][data-toggle="toggle"]').change(function () {
        const isChecked = $(this).prop("checked");
        if (isChecked) {
            loadVendorList(); // Load Vendor list for "Third Party"
        } else {
            loadRestaurantOwnerList(); // Load Restaurant owner list for "In-House"
        }
    });

    // Function to load vendor list
    function loadVendorList() {
        $('#vendor_id').empty().append('<option disabled selected value="">Select Vendor</option>');
        // Simulate an AJAX call to fetch vendor data (Replace with actual AJAX call to fetch vendors)
        $.ajax({
            url: window.Laravel.routes.getVendorsList,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            success: function (data) {
                // Assuming data is an array of objects with id and name
                data.forEach(function (vendor) {
                    $('#vendor_id').append(
                        `<option value="${vendor.id}">${vendor.name}</option>`
                    );
                });
            },
            error: function () {
                alert('Failed to load vendor list. Please try again.');
            },
        });
    }

    // Function to load restaurant owner list
    function loadRestaurantOwnerList() {
        $('#vendor_id').empty().append('<option disabled selected value="">Select Restaurant Owner</option>');
        // Simulate an AJAX call to fetch restaurant owner data (Replace with actual AJAX call to fetch owners)
        $.ajax({
            url: window.Laravel.routes.getOwnersList,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            success: function (data) {
                // Assuming data is an array of objects with id and name
                data.forEach(function (owner) {
                    $('#vendor_id').append(
                        `<option value="${owner.id}">${owner.name}</option>`
                    );
                });
            },
            error: function () {
                alert('Failed to load restaurant owner list. Please try again.');
            },
        });
    }

    // 3. Populate Ingredient item list
    function loadIngredientItems() {
        $.get("/items", function (data) {
            populateItemDropdown(data);
        });
    }

    // 4. Populate Menu item list
    function loadMenuItems() {
        $.get("/menu_items", function (data) {
            populateItemDropdown(data);
        });
    }

    // Populate item dropdown
    function populateItemDropdown(items) {
        const $dropdown = $("#stock_item_list");
        $dropdown.empty().append('<option selected disabled value="">Select</option>');
        items.forEach(item => {
            $dropdown.append(`<option value="${item.id}">${item.name}</option>`);
        });
    }

    // Handle Stock Item Type selection
    $('input[name="stock_item_type"]').change(function () {
        if (this.id === "ingredient_item") {
            loadIngredientItems();
        } else if (this.id === "menu_item") {
            loadMenuItems();
        }
        // Clear selected rows
        clearSelectedRows();
        Swal.fire("Notice", "All selected items have been cleared.", "info");
    });

    // 5 & 6. Update Remarks dropdown based on stock type
    $('input[data-toggle="toggle"]').change(function () {
        const isStockIn = $(this).prop("checked");
        const $remarks = $("#stock_remarks");
        $remarks.empty().append('<option selected disabled value="">Select</option>');
        if (isStockIn) {
            $remarks.append('<option value="purchase">Purchase</option>');
        } else {
            $remarks.append('<option value="purchase_return">Purchase Return</option>');
            $remarks.append('<option value="expired">Expired</option>');
            $remarks.append('<option value="damaged">Damaged</option>');
        }
        clearSelectedRows();
    });

    // 7. Add items to the selected row
    $("#add_stock_btn").click(function () {
        const itemName = $("#stock_item_list option:selected").text();
        const stockType = $('input[data-toggle="toggle"]').prop("checked") ? "In" : "Out";
        const remarks = $("#stock_remarks").val();
        const qty = parseFloat($("#inv_qty").val());
        const unitPrice = parseFloat($("#unit_price").val());
        const totalPrice = qty * unitPrice;

        const newRow = `
            <tr>
                <td>${$("#stockaddItems tr").length + 1}</td>
                <td>${itemName}</td>
                <td>${stockType}</td>
                <td>${remarks}</td>
                <td><input type="number" class="form-control qty-input" value="${qty}" /></td>
                <td>${unitPrice.toFixed(2)}</td>
                <td class="total-price">${totalPrice.toFixed(2)}</td>
                <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
            </tr>`;
        $("#stockaddItems").append(newRow);
    });

    // 8. Update total price when quantity changes
    $(document).on("input", ".qty-input", function () {
        const $row = $(this).closest("tr");
        const qty = parseFloat($(this).val());
        const unitPrice = parseFloat($row.find("td:eq(5)").text());
        $row.find(".total-price").text((qty * unitPrice).toFixed(2));
    });

    // Remove selected row
    $(document).on("click", ".remove-row", function () {
        $(this).closest("tr").remove();
    });

    // 9 & 10. Clear selected rows when stock type changes
    function clearSelectedRows() {
        $("#stockaddItems").empty();
    }
});
