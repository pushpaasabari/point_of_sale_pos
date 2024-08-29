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
                    <form name="vendor_edit" id="vendor_edit" class="form-horizontal" method="Post"
                        action="{{ url('suadmin/vendor.edit') }}" enctype="multipart/form-data" autocomplete="on">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Vendor</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Name :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="vendor_name" id="vendor_name"
                                                placeholder="Name *" value="{{$vendor_edit->vendor_name}}" required>
                                            <input type="hidden" name="vendor_sno" id="vendor_sno"
                                                value="{{$vendor_edit->vendor_sno}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Mobile :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="vendor_mobile"
                                                id="vendor_mobile" placeholder="Mobile *"
                                                value="{{$vendor_edit->vendor_mobile}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">GSTIN :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="vendor_gstin"
                                                id="vendor_gstin" placeholder="GSTIN"
                                                value="{{$vendor_edit->vendor_gstin}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Email :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="email" class="form-control" name="vendor_email"
                                                id="vendor_email" placeholder="E-Mail"
                                                value="{{$vendor_edit->vendor_email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Address :</label>
                                        <div class="col-sm-3 pb-3">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="vendor_address"
                                                    id="vendor_address"
                                                    placeholder="Enter Address...">{{$vendor_edit->vendor_address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </div>
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

</html>