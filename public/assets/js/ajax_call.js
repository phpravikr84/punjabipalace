$(document).ready(function () {
    //When Company Edit page loading
    if(typeof companyEditRoute !== 'undefined'){
        console.log( companyEditRoute );
        if(companyEditRoute == 'companies.edit'){
            //Get all States
            let editCompanyId = $('#edit_company_id').val();
            console.log('companyid' + editCompanyId);
            if(editCompanyId > 0){

                $.ajax({
                    url: window.Laravel.routes.getcompanyedit + '/' + editCompanyId,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken
                    },
                    success: function (response) {
                        console.log('Response: ' + JSON.stringify(response));
                        console.log('state Name: '+ response.company.state);
                        let stateId = response.company.state;
                        let cityId =  response.company.city;
                       
                        if(response.company.country && response.company.country > 0) {

                           // Fetch states based on the selected country
                            $.ajax({
                                url: window.Laravel.routes.getstates + '/' + response.company.country,
                                type: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': window.Laravel.csrfToken
                                },
                                success: function (response) {
                                   
                                    let stateOptions = '<option value="">Select State</option>';
                                    if (response.states && response.states.length > 0) {
                                        response.states.forEach(function (state) {
                                            stateOptions += `<option value="${state.id}"  ${state.id == stateId ? 'selected' : ''}>${state.name}</option>`;
                                        });
                                    }
                                    $('#select_company_state').html(stateOptions);
                                    //$('#select_company_city').html('<option value="">Select City</option>'); // Reset cities

                                    //Check if State Id available
                                    if (!stateId) {
                                        // Clear city dropdown if no state is selected
                                        $('#select_company_city').html('<option value="">Select City</option>');
                                        return;
                                    }
                            
                                    // Fetch cities based on the selected state
                                    $.ajax({
                                        url: window.Laravel.routes.getcities + '/' + stateId,
                                        type: 'GET',
                                        headers: {
                                            'X-CSRF-TOKEN': window.Laravel.csrfToken
                                        },
                                        success: function (response) {
                                            let cityOptions = '<option value="">Select City</option>';
                                            if (response.cities && response.cities.length > 0) {
                                                response.cities.forEach(function (city) {
                                                    cityOptions += `<option value="${city.id}" ${city.id == cityId ? 'selected' : ''}>${city.name}</option>`;
                                                });
                                            }
                                            $('#select_company_city').html(cityOptions);
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            console.error("Error fetching cities:", textStatus, errorThrown);
                                        }
                                    });
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.error("Error fetching states:", textStatus, errorThrown);
                                }
                            });

                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error("Error fetching states:", textStatus, errorThrown);
                    }
                });

            }

        }
    }

    // When a country is selected
    $(document).on('change', '#select_company_country', function () {
        let countryId = $(this).val();

        if (!countryId) {
            // Clear state and city dropdowns if no country is selected
            $('#select_company_state').html('<option value="">Select State</option>');
            $('#select_company_city').html('<option value="">Select City</option>');
            return;
        }

        // Fetch states based on the selected country
        $.ajax({
            url: window.Laravel.routes.getstates + '/' + countryId,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            success: function (response) {
                let stateOptions = '<option value="">Select State</option>';
                if (response.states && response.states.length > 0) {
                    response.states.forEach(function (state) {
                        stateOptions += `<option value="${state.id}">${state.name}</option>`;
                    });
                }
                $('#select_company_state').html(stateOptions);
                $('#select_company_city').html('<option value="">Select City</option>'); // Reset cities
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error fetching states:", textStatus, errorThrown);
            }
        });
    });

    // When a state is selected
    $(document).on('change', '#select_company_state', function () {
        let stateId = $(this).val();
        console.log('State Id: '+ stateId);

        if (!stateId) {
            // Clear city dropdown if no state is selected
            $('#select_company_city').html('<option value="">Select City</option>');
            return;
        }

        // Fetch cities based on the selected state
        $.ajax({
            url: window.Laravel.routes.getcities + '/' + stateId,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            success: function (response) {
                let cityOptions = '<option value="">Select City</option>';
                if (response.cities && response.cities.length > 0) {
                    response.cities.forEach(function (city) {
                        cityOptions += `<option value="${city.id}">${city.name}</option>`;
                    });
                }
                $('#select_company_city').html(cityOptions);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error fetching cities:", textStatus, errorThrown);
            }
        });
    });
});
