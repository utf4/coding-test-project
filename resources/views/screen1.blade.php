@extends('template')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4">
                    <span>Search</span>
                    <input class="form-control" type="text" id="search" name="search" placeholder="Search">
                </h1>
            </div>
            <div class="col-md-12">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody id="table_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var search = $('#search').val();
            get_records(search);
        });

        let debounceTimer;
        $('#search').on('keyup', function(event) {
            clearTimeout(debounceTimer);
            const searchValue = $(this).val();

            if (event.key === 'Enter') {
                get_records(searchValue);
            } else {
                debounceTimer = setTimeout(function() {
                    if (searchValue === '') {
                        get_records(''); // Fetch one page of records if search is empty
                    } else {
                        get_records(searchValue);
                    }
                }, 300);
            }
        });

        function get_records(search) {
            $.ajax({
                url: '{{ route('screen1_get_records') }}',
                type: 'GET',
                data: { search: search },
                success: function(response) {
                    populate_table(response);
                }
            });
        }

        function populate_table(response) {
            $('#table_body').empty();
            response.forEach(function(item) {
                $('#table_body').append('<tr><td>' + item.id + '</td><td>' + item.title + '</td><td>' + item.status + '</td><td>' + item.notes + '</td></tr>');
            });
        }
    </script>
@endsection
