<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        routes: {
            getcountries: '{{ route('getCountries') }}', // Change this line
            getstates: '{{ url('getstates') }}',
            getallstates: ' {{ route('getAllStates') }}',
            getcities: '{{ url('getcities') }}',
            getcompanyedit :  '{{ url('getEditCompany') }}',
        }
    };
</script>
<?php
if (request()->routeIs('companies.edit')) {
    // The current named route is 'companies.edit'
    echo    '<script>
                var companyEditRoute = "companies.edit";
            </script>';
}
?>