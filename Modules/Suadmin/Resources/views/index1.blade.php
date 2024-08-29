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
            <section class="content">
                <div class="container-fluid">
                    <div class="col-12">
                        {{-- @include('suadmin::layouts.alert') --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Point Of Sale</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="mb-2">Info Box</h5>
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="fa fa-user-circle"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Users</span>
                                                <span class="info-box-number">{{$user}}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Customers</span>
                                                <span class="info-box-number">{{$customer}}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-warning"><i
                                                    class="far fa-list-alt"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Item</span>
                                                <span class="info-box-number">{{$item}}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Likes</span>
                                                <span class="info-box-number">93,139</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
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
</body>

</html>