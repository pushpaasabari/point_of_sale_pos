@include('suadmin::layouts.header')
<!-- CSS Start-->
@include('suadmin::layouts.css')
<!-- CSS End-->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('suadmin::layouts.top-navbar')
        @include('suadmin::layouts.left-navbar')
        <div class="content-wrapper">
            @include('suadmin::layouts.breadcrumb')
            <div class="container">
                <div class="mt-0 pb-1">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Vendor</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <form name="add_vendor" id="add_vendor" class="form-horizontal" method="Post"
                                action="{{ url('suadmin/vendor.add') }}" enctype="multipart/form-data"
                                autocomplete="on">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Name :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="vendor_name" id="vendor_name"
                                                placeholder="Name *" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Mobile :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="vendor_mobile"
                                                id="vendor_mobile" placeholder="Mobile *" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">GSTIN :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="vendor_gstin"
                                                id="vendor_gstin" placeholder="GSTIN">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Email :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="email" class="form-control" name="vendor_email"
                                                id="vendor_email" placeholder="E-Mail">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Address :</label>
                                        <div class="col-sm-3 pb-3">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="vendor_address"
                                                    id="vendor_address" placeholder="Enter Address..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info float-right">Save</button>
                        </div>
                        </form>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                    <!-- Horizontal Form -->
                    {{-- <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add vendor</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- <form name="add_vendor" id="add_vendor" class="form-horizontal" method="Post"
                            action="{{ url('suadmin/vendor.add') }}" enctype="multipart/form-data" autocomplete="on">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-3 pb-3">
                                        <input type="text" class="form-control" name="vendor_name" id="vendor_name"
                                            placeholder="Name *" required>
                                    </div>
                                    <div class="col-sm-3 pb-3">
                                        <input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile"
                                            placeholder="Mobile *" required>
                                    </div>
                                    <div class="col-sm-3 pb-3">
                                        <input type="text" class="form-control" name="vendor_gst" id="vendor_gst"
                                            placeholder="GSTN">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 pb-3">
                                        <input type="email" class="form-control" name="vendor_mail" id="vendor_mail"
                                            placeholder="Mail">
                                    </div>
                                    <div class="col-sm-3 pb-3">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="vendor_address"
                                                id="vendor_address" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </div>
                        </form> --}}
                        {{--
                    </div> --}}
                </div>
            </div>
        </div>
        @include('suadmin::layouts.footer')
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax')

</body>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
      $('#item_image').on('change', function() {
            var file = this.files[0];
            var fileType = file.type;
            var validFileTypes = ['image/jpeg', 'image/png'];
            
            if (!validFileTypes.includes(fileType)) {
                alert('Only JPG and PNG files are allowed.');
                $(this).val(''); // Clear the input
                $('.custom-file-label').text('Choose file');
            } else {
                // Show the selected file name
                $('.custom-file-label').text(file.name);
            }
        });
    });
</script>

</html>