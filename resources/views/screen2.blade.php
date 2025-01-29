@extends('template')

@section('content')
    <div class="container">
        <div class="row pt-5" >
            <div class="col-md-12 ">
                <h1 style="width: 100%;">
                    <span>Search</span>
                    <input style="width: 80%;" type="text" id="search" name="search" placeholder="Search">
                </h1>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-1 d-flex justify-content-center">
                <button class="btn btn-primary" id="prev-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                    </svg>
                </button>
            </div>
            <div class="col-md-10" style="text-align:center">
                <div id="loader" class="spinner-border text-primary" role="status" style="display: none;">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <img id="image" src="" alt="" style="height: 500px; display: none;">
            </div> 
            <div class="col-md-1 d-flex justify-content-center">
                <button class="btn btn-primary" id="next-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
        
        let currentPage = 1;
        let totalPages = 1;

        $('#search').on('keyup', function(event) {
            const searchValue = $(this).val();
            if (event.key === 'Enter') {
                currentPage = 1; // Reset to first page on new search
                get_images(searchValue, currentPage);
            }
        });

        $('#next-button').on('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                const searchValue = $('#search').val();
                get_images(searchValue, currentPage);
            }
        });

        $('#prev-button').on('click', function() {
            if (currentPage > 1) {
                currentPage--;
                const searchValue = $('#search').val();
                get_images(searchValue, currentPage);
            }
        });

        function get_images(search, page) {
            $('#loader').show();
            $('#image').hide();
            
            $.ajax({
                url: '{{ route('screen2_get_images') }}',
                type: 'GET',
                data: { keywords: search, page: page },
                success: function(response) {
                    totalPages = response.total_pages; // Update total pages
                    display_image(response);
                    update_buttons();
                },
                complete: function() {
                    $('#loader').hide();
                    $('#image').show();
                }
            });
        }

        function display_image(response) {
            $('#image').attr('src', response.url);
        }

        function update_buttons() {
            $('#prev-button').prop('disabled', currentPage === 1);
            $('#next-button').prop('disabled', currentPage === totalPages);
        }
    </script>
@endsection
