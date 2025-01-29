@extends('template')

@section('content')
    <h1 style="text-align:center">Play with the boxes</h1>

    <button class="btn btn-primary" id="btn_reset">Reset</button>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="row">
            <div class="col-md-12">
                <table class="table text-center" style="width: auto;">
                    <tr>
                        <td data-box-number="box_1" id="box_1" class="box"></td>
                        <td data-box-number="box_2" id="box_2" class="box"></td>
                        <td data-box-number="box_3" id="box_3" class="box"></td>
                    </tr>
                    <tr>
                        <td data-box-number="box_4" id="box_4" class="box"></td>
                        <td data-box-number="box_5" id="box_5" class="box"></td>
                        <td data-box-number="box_6" id="box_6" class="box"></td>
                    </tr>
                    <tr>
                        <td data-box-number="box_7" id="box_7" class="box"></td>
                        <td data-box-number="box_8" id="box_8" class="box"></td>
                        <td data-box-number="box_9" id="box_9" class="box"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('screen3_generate_colour_box') }}',
                type: 'GET',
                success: function(data) {
                   update_box_colour(data);
                }
            });

            $('.box').click(function() {
                $.ajax({
                    url: '{{ route('screen3_click_box') }}',
                    type: 'GET',
                    data: { box_number: $(this).data('box-number')  },
                    success: function(data) {
                        update_box_colour(data);
                    }
                });
            });
        });

        function update_box_colour(data) {
            $('.box').each(function() {
                $(this).css('background-color', data[$(this).data('box-number')]['colour']);
            });
        }

        $('#btn_reset').click(function() {
            $.ajax({
                url: '{{ route('screen3_new_colour_box') }}',
                type: 'GET',
                success: function(data) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
