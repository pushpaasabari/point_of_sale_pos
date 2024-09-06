@include('suadmin::layouts.header')
<!-- CSS Start-->
@include('suadmin::layouts.css')
<style>
    /* Circular button on top right of the image */
    .btn-light {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .btn-light:hover {
        background-color: #e2e6ea;
    }

    #thumbUpload02+label {
        cursor: pointer;
    }

    #profileImagePreview {
        object-fit: cover;
    }
</style>
<!-- CSS End-->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('suadmin::layouts.top-navbar')
        @include('suadmin::layouts.left-navbar')
        <div class="content-wrapper">
            @include('suadmin::layouts.breadcrumb')
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Business Details</h4>
                                        <div class="card-tools">
                                            {{-- <button type="button" class="btn btn-sm bg-gradient-primary"
                                                data-toggle="modal" data-target="#modal-edit-business">Edit business
                                            </button> --}}
                                            <button type="button" class="btn btn-tool" data-toggle="modal"
                                                data-target="#modal-edit-business-basic">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-4 pb-3 ">
                                                <label for="exampleInputBorder">Name :</label>
                                            </div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'business Name'}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 col-form-label pb-3"><label
                                                    for="exampleInputBorder">GSTIN</label>
                                                :</div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'business GSTIN'}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 col-form-label pb-3"><label
                                                    for="exampleInputBorder">CIN</label>
                                                :</div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'CIN Number'}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 col-form-label pb-3"><label
                                                    for="exampleInputBorder">E-Mail</label>
                                                :</div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'E-Mail'}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 col-form-label pb-3"><label
                                                    for="exampleInputBorder">Mobile</label>
                                                :</div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'Mobile'}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Business Address</h4>
                                        <div class="card-tools">
                                            {{-- <button type="button" class="btn btn-sm bg-gradient-primary"
                                                data-toggle="modal" data-target="#modal-edit-business">Edit business
                                            </button> --}}

                                            <button type="button" class="btn btn-tool" data-toggle="modal"
                                                data-target="#modal-edit-business-address">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-4 pb-3 ">
                                                <label for="exampleInputBorder">Address :</label>
                                            </div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'Business Address'}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 pb-3 ">
                                            </div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'Business Address'}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 pb-3 ">
                                            </div>
                                            <div class="col-sm-8 col-form-label pb-3">
                                                {{'Business Address'}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Logo</h4>
                                        <div class="card-tools">
                                            {{-- <button type="button" class="btn btn-tool" data-toggle="modal"
                                                data-target="#modal-edit-business-basic">
                                                <i class="fas fa-edit"></i>
                                            </button> --}}
                                            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button> --}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="text-center mx-auto">
                                                <div class="position-relative d-inline-block">
                                                    <img src="{{asset('assets/img/1.jpg')}}" alt="Profile Picture"
                                                        id="profileImagePreview" class="rounded-circle img-thumbnail"
                                                        style="width: 150px; height: 150px;">
                                                    <div class="position-absolute" style="top: 0; right: 0;">
                                                        <label for="thumbUpload02" class="">
                                                            <!--shadow-sm rounded-circle p-0 btn btn-light -->
                                                            <i class="far fa-edit"></i>
                                                        </label>
                                                        <input type="file" id="thumbUpload02" class="d-none"
                                                            accept=".png, .jpg, .jpeg">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            {{-- <div class="row">
                                                <div class="ec-vendor-block-img space-bottom-30">
                                                    <div class="ec-vendor-block-detail">
                                                        <div class="thumb-upload">
                                                            <div class="thumb-edit">
                                                                <input type='file' id="thumbUpload02"
                                                                    class="ec-image-upload"
                                                                    accept=".png, .jpg, .jpeg" />
                                                                <label><i class="fi-rr-edit"></i></label>
                                                            </div>
                                                            <div class="thumb-preview ec-preview">
                                                                <div class="image-thumb-preview">
                                                                    <img class="image-thumb-preview ec-image-preview v-img"
                                                                        src="" alt="edit" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Default - Prefix</h4>
                                    <div class="card-tools">
                                        {{-- <button type="button" class="btn btn-sm bg-gradient-primary"
                                            data-toggle="modal" data-target="#modal-edit-business">Edit business
                                        </button> --}}
                                        <button type="button" class="btn btn-tool" data-toggle="modal"
                                            data-target="#modal-edit-business-default-prefix">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-4 pb-3 ">
                                            <label for="exampleInputBorder">Invoice* :</label>
                                        </div>
                                        <div class="col-sm-8 col-form-label pb-3">
                                            {{'Invoive'}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-form-label pb-3">
                                            <label for="exampleInputBorder">Estimate :</label>
                                        </div>
                                        <div class="col-sm-8 col-form-label pb-3">
                                            {{'Estimate'}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-form-label pb-3">
                                            <label for="exampleInputBorder">Payment IN :</label>
                                        </div>
                                        <div class="col-sm-8 col-form-label pb-3">
                                            {{'Payment_In'}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-form-label pb-3">
                                            <label for="exampleInputBorder">Payment Out :</label>
                                        </div>
                                        <div class="col-sm-8 col-form-label pb-3">
                                            {{'Payment_out'}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-form-label pb-3">
                                            <label for="exampleInputBorder">Credit Note :</label>
                                        </div>
                                        <div class="col-sm-8 col-form-label pb-3">
                                            {{'Credit_Note'}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('suadmin::layouts.footer')
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax')
    @include('suadmin::layouts.modal_business')
</body>

</html>