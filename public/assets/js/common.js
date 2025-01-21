$(document).ready(function () {
    let submenuIndex = 1;

    // Add submenu
    $('#add-submenu').on('click', function () {
        const newSubmenu = `
            <div class="submenu-item mb-3">
                <label for="submenus[${submenuIndex}][title]" class="form-label">Submenu Title</label>
                <input type="text" name="submenus[${submenuIndex}][title]" class="form-control" placeholder="Submenu Title">

                <label for="submenus[${submenuIndex}][description]" class="form-label mt-2">Description</label>
                <textarea name="submenus[${submenuIndex}][description]" class="form-control" placeholder="Submenu Description"></textarea>

                <label for="submenus[${submenuIndex}][status]" class="form-label mt-2">Status</label>
                <select name="submenus[${submenuIndex}][status]" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                <button type="button" class="btn btn-danger mt-3 remove-submenu">Remove</button>
            </div>
        `;
        $('#submenu-container').append(newSubmenu);
        submenuIndex++;
    });

    //Edit Submenu edit-submenu
    $('#edit-submenu').on('click', function () {
        let submenuLastIndex =  $('#editLastIndex').val();
        const newSubmenu = `
            <div class="submenu-item mb-3">
                <label for="submenus[${submenuLastIndex}][title]" class="form-label">Submenu Title</label>
                <input type="text" name="submenus[${submenuLastIndex}][title]" class="form-control" placeholder="Submenu Title">

                <label for="submenus[${submenuLastIndex}][description]" class="form-label mt-2">Description</label>
                <textarea name="submenus[${submenuLastIndex}][description]" class="form-control" placeholder="Submenu Description"></textarea>

                <label for="submenus[${submenuLastIndex}][status]" class="form-label mt-2">Status</label>
                <select name="submenus[${submenuLastIndex}][status]" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                <button type="button" class="btn btn-danger mt-3 remove-submenu">Remove</button>
            </div>
        `;
        $('#submenu-container').append(newSubmenu);
        submenuIndex++;
    });

    // Remove submenu
    $('#submenu-container').on('click', '.remove-submenu', function () {
        $(this).closest('.submenu-item').remove();
    });

    // Item Create & Edit form
    if (typeof $('#select_item_uom_id')[0] !== 'undefined') {

        $('#select_item_uom_id').on('change', function() {
            let uom_name = $(this).find('option:selected').text(); // Correctly get the selected option text
            
            // Check if the input element exists before updating its value
            if (typeof $('#select_item_uom_name')[0] !== 'undefined') {
                $('#select_item_uom_name').val(uom_name); // Set the value of the input field
            }
        });
    }


});