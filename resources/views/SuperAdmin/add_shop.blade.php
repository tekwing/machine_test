@extends('SuperAdmin.layout.app')
@section('title', 'Add Services')
@section('css')
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Create New Shop</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Add Shop</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <form id="createshop-form" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Shop Name</label>
                                            <input type="text" name="name" class="form-control" id="product-title-input" value="" placeholder="Enter Shop name" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">latitude</label>
                                            <input type="text" name="latitude" class="form-control" id="product-title-input" value="" placeholder="Enter shop latitude" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">longitude</label>
                                            <input type="text" name="longitude" class="form-control" id="product-title-input" value="" placeholder="Enter shop longitude" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="text-left mb-3">
                                    <button type="submit" id="submit-btn" class="btn btn-primary w-sm">Submit</button>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </form>

                </div>
                <!-- container-fluid -->
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

    <script src="{{ asset('js/app.js') }}"></script> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
    $('#createshop-form').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        formData += '&_token={{ csrf_token() }}';
        $.ajax({
            url: "{{ route('shop_upload') }}",
            type: "POST",
            data: formData,
            success: function(response){
                console.log(response);
                if(response.success){
                    alert(response.message);
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error){
                if (xhr.status === 403) {
                    alert('Unauthorized: ' + xhr.responseJSON.message);
                } else {
                    console.error(xhr.responseText);
                    alert('Error: Failed to submit form data');
                }
            }
        });
    });
});


</script>








    
@endsection

