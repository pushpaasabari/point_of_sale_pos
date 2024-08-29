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
                    <form name="customer_edit" id="customer_edit" class="form-horizontal" method="Post"
                        action="{{ url('suadmin/customer.edit') }}" enctype="multipart/form-data" autocomplete="on">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Customer</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Name :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="customer_name"
                                                id="customer_name" placeholder="Name *"
                                                value="{{$customer_edit->customer_name}}" required>
                                            <input type="hidden" name="customer_sno" id="customer_sno"
                                                value="{{$customer_edit->customer_sno}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Mobile :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="customer_mobile"
                                                id="customer_mobile" placeholder="Mobile *"
                                                value="{{$customer_edit->customer_mobile}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">GSTIN :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="text" class="form-control" name="customer_gstin"
                                                id="customer_gstin" placeholder="GSTIN"
                                                value="{{$customer_edit->customer_gstin}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Email :</label>
                                        <div class="col-sm-3 pb-3">
                                            <input type="email" class="form-control" name="customer_email"
                                                id="customer_email" placeholder="E-Mail"
                                                value="{{$customer_edit->customer_email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="item" class="col-sm-2 col-form-label pb-3">Address :</label>
                                        <div class="col-sm-3 pb-3">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="customer_address"
                                                    id="customer_address"
                                                    placeholder="Enter Address...">{{$customer_edit->customer_address}}</textarea>
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