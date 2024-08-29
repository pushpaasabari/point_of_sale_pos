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
                <div class="mt-5 ">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Category Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form name="user_registration_edit" id="user_registration_edit" class="form-horizontal"
                            method="Post" action="{{ url('suadmin/user.user_edit') }}" enctype="multipart/form-data"
                            autocomplete="on">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">User Type</label>
                                    <div class="col-sm-8">
                                        <select name="user_type" id="user_type" class="form-control" required>
                                            <option value="{{$user->user_type}}">{{$user->user_type}}</option>
                                            <option value="">Select User Type</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="user_name" id="user_name" required
                                            value="{{$user->user_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">User ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="user_id" id="user_id" required
                                            value="{{$user->user_id}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">User Mail</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="user_email" id="user_email"
                                            placeholder="User E-Mail" required value="{{$user->user_email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="tel" class="form-control" name="user_mobile" id="user_mobile"
                                            placeholder="Mobile" required value="{{$user->user_mobile}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="user_address" id="user_address"
                                            placeholder="Address" required value="{{$user->user_address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">ID Proof</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="user_id_proof" id="user_id_proof"
                                            placeholder="ID Proof" required value="{{$user->user_id_proof}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputFile" class="col-sm-2 col-form-label">ID Proof Image</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="user_id_proof_image"
                                                id="exampleInputFile" accept="image/*">
                                            <input type="hidden" class="custom-file-input"
                                                name="old_user_id_proof_image" id="old_user_id_proof_image"
                                                value="{{$user->user_id_proof_image}}">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info float-right">Update</button>
                            </div>
                        </form>
                    </div>
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
      $('#exampleInputFile').on('change', function() {
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