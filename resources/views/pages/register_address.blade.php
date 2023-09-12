@extends('layouts.master')
@section('content')
    @include('layouts.inc.nav')

    <section class="container-fluid">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-6">
                    <form class="form-container">

                        @csrf
                        <h2 class="text-center bg-dark p-2 text-white">Register Address</h2>
                        <input type="hidden" name="user_id" id="user_id" value="{{ $id }}">
                        <input type="hidden" id="url" name="url"
                            value="{{ isset($address['street']) ? '/update_address' : '/save_address' }}">

                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" name="street" class="form-control" id="street" placeholder="Street"
                                value="{{ isset($address['street']) ? $address['street'] : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text" name="number" class="form-control" id="number" placeholder="Number"
                                value="{{ isset($address['number']) ? $address['number'] : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="neighborhood">Neighborhood</label>
                            <input type="text" class="form-control" name="neighborhood" id="neighborhood"
                                placeholder="Neighborhood"
                                value="{{ isset($address['neighborhood']) ? $address['neighborhood'] : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="complement">Complement</label>
                            <input type="text" name="complement" class="form-control" id="complement"
                                placeholder="Complement"
                                value="{{ isset($address['complement']) ? $address['complement'] : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="Zip Code"
                                value="{{ isset($address['zip_code']) ? $address['zip_code'] : '' }}">
                        </div>

                        <button id="save_form" type="submit" class="btn btn-dark btn-block save_btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('javascript')
    <script>
        $(document).ready(function() {
            $('#save_form').on('click', function(e) {
                e.preventDefault();
                var street = $("#street").val();
                var number = $("#number").val();
                var neighborhood = $("#neighborhood").val();
                var complement = $("#complement").val();
                var zip_code = $("#zip_code").val();
                var url = $("#url").val();
                var user_id = $("#user_id").val();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': '<?= csrf_token() ?>',
                        street: street,
                        number: number,
                        neighborhood: neighborhood,
                        complement: complement,
                        zip_code: zip_code,
                        user_id: user_id
                    },
                    success: function(data) {
                        if (data.exists) {
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', 'red');
                            $('#notifDiv').text('Email already exists');
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 3000);
                        } else if (data.success) {
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', 'green');
                            $('#notifDiv').text(data.success);
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 3000);
                            // $('[name="street"]').val('');
                            // $('[name="number"]').val('');
                            // $('[name="neighborhood"]').val('');
                            // $('[name="complement"]').val('');
                            // $('[name="zip_code"]').val('');
                        } else {
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', 'red');
                            $('#notifDiv').text('An error occured. Please try later');
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 3000);
                        }
                        $(this).text('Save');
                        $(this).removeAttr('disabled');
                    }.bind($(this))

                });

            });
        });
    </script>
@endpush
