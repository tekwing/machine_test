@extends('SuperAdmin.layout.app')
@section('title', 'Dashboard')
@section('css')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Left half of the page -->
                <div class="col-lg-6">
                    <div class="card">
                        <form id="myForm">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Longitude</label>
                                    <input type="text" name="longitude" class="form-control" id="lon" value="" placeholder="Enter Shop name" required>
                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">latitude</label>
                                    <input type="text" name="latitude" class="form-control" id="lat" value="" placeholder="Enter shop latitude" required>
                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                </div>
                                <div id="city"></div>
                                <div id="state"></div>
                                <div class="text-left mb-3">
                                    <button type="submit" id="submit-btn" class="btn btn-primary w-sm">Search Shop</button>
                                </div>
                            </div><!-- end card body -->
                        </form>
                    </div><!-- end card -->
                </div><!-- end col -->

                <!-- Right half of the page -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div style="width: 100%">
                                <iframe id="mapFrame" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ></iframe>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="row">
                    <div class="col-lg-6">
                        <div id="shopContainer">
                            <!-- Card will be appended here -->
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container-fluid -->
         
    </div>
            <!-- End Page-content -->
@endsection

@section('script')
    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('libs/prismjs/prism.js') }}"></script>

    <!-- Modal Js -->
    <script src="{{ asset('js/pages/modal.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        $(document).ready(function() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    
                    $('#lat').val(latitude);
                    $('#lon').val(longitude);

                    $.ajax({
                        url: "https://nominatim.openstreetmap.org/reverse",
                        data: {
                            format: "json",
                            lat: latitude,
                            lon: longitude
                        },
                        success: function(response) {
                            var city = response.address.city;
                            var state = response.address.state;
                            $('#city').text("City: " + city);
                            $('#state').text("State: " + state);
                        }
                    });

                });
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#myForm').submit(function(event){
                event.preventDefault();

                var latitude = $('#lat').val(); 
                var longitude = $('#lon').val(); 
                var mapUrl = 'https://maps.google.com/maps?q=' + latitude + ',' + longitude + '&z=14&output=embed';
                
                $('#mapFrame').attr('src', mapUrl);

                var formData = $(this).serialize();
                formData += '&_token={{ csrf_token() }}';
                $.ajax({
                    type: 'POST',
                    url: "{{route('search_shop')}}",
                    data: formData,
                    success: function(response){
                        console.log('AJAX request successful');
                        console.log(response);
                        $('#shopContainer').empty();

                        $.each(response, function(index, shop){
                            var cardHtml = '<div class="card">';
                            cardHtml += '<div class="card-body">';
                            cardHtml += '<h5 class="card-title">' + shop.name + '</h5>';
                            cardHtml += '<p class="card-text">Latitude: ' + shop.latitude + '</p>';
                            cardHtml += '<p class="card-text">Longitude: ' + shop.longitude + '</p>';
                            cardHtml += '<p class="card-text">Distance: ' + shop.distance + '</p>';
                            cardHtml += '</div></div>';

                            $('#shopContainer').append(cardHtml);
                        });
                    },
                    error: function(xhr, status, error){
                        console.error('AJAX request failed');
                        console.error(status + ': ' + error);
                    }
                });
            });
        });
    </script>
@endsection

