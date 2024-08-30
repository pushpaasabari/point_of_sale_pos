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
                    <div class="row">
                        <div class="col-md-9">
                            {{-- <h5 class="mb-2">Info Box</h5> --}}
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
                                        <span class="info-box-icon bg-warning"><i class="far fa-list-alt"></i></span>

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
                                        <span class="info-box-icon bg-danger"><i class="fas fa-rupee-sign"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Sales</span>
                                            <span class="info-box-number">{{$total_amount}}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <h3 class="card-title">Products</h3>
                                            <div class="card-tools">
                                                <a href="#" class="btn btn-tool btn-sm">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                <a href="#" class="btn btn-tool btn-sm">
                                                    <i class="fas fa-bars"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-striped table-valign-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th>Sales</th>
                                                        <th>More</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="{{asset('assets/img/default-150x150.png')}}"
                                                                alt="Product 1" class="img-circle img-size-32 mr-2">
                                                            Some Product
                                                        </td>
                                                        <td>$13 USD</td>
                                                        <td>
                                                            <small class="text-success mr-1">
                                                                <i class="fas fa-arrow-up"></i>
                                                                12%
                                                            </small>
                                                            12,000 Sold
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-muted">
                                                                <i class="fas fa-search"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="{{asset('assets/img/default-150x150.png')}}"
                                                                alt="Product 1" class="img-circle img-size-32 mr-2">
                                                            Another Product
                                                        </td>
                                                        <td>$29 USD</td>
                                                        <td>
                                                            <small class="text-warning mr-1">
                                                                <i class="fas fa-arrow-down"></i>
                                                                0.5%
                                                            </small>
                                                            123,234 Sold
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-muted">
                                                                <i class="fas fa-search"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="{{asset('assets/img/default-150x150.png')}}"
                                                                alt="Product 1" class="img-circle img-size-32 mr-2">
                                                            Amazing Product
                                                        </td>
                                                        <td>$1,230 USD</td>
                                                        <td>
                                                            <small class="text-danger mr-1">
                                                                <i class="fas fa-arrow-down"></i>
                                                                3%
                                                            </small>
                                                            198 Sold
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-muted">
                                                                <i class="fas fa-search"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="{{asset('assets/img/default-150x150.png')}}"
                                                                alt="Product 1" class="img-circle img-size-32 mr-2">
                                                            Perfect Item
                                                            <span class="badge bg-danger">NEW</span>
                                                        </td>
                                                        <td>$199 USD</td>
                                                        <td>
                                                            <small class="text-success mr-1">
                                                                <i class="fas fa-arrow-up"></i>
                                                                63%
                                                            </small>
                                                            87 Sold
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-muted">
                                                                <i class="fas fa-search"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Draggable Events</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- the events -->
                                        <div id="external-events">
                                            <div class="external-event bg-success">Lunch</div>
                                            <div class="external-event bg-warning">Go home</div>
                                            <div class="external-event bg-info">Do homework</div>
                                            <div class="external-event bg-primary">Work on UI design</div>
                                            <div class="external-event bg-danger">Sleep tight</div>
                                            <div class="checkbox">
                                                <label for="drop-remove">
                                                    <input type="checkbox" id="drop-remove">
                                                    remove after drop
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Event</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                            <ul class="fc-color-picker" id="color-chooser">
                                                <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-success" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /btn-group -->
                                        <div class="input-group">
                                            <input id="new-event" type="text" class="form-control"
                                                placeholder="Event Title">

                                            <div class="input-group-append">
                                                <button id="add-new-event" type="button"
                                                    class="btn btn-primary">Add</button>
                                            </div>
                                            <!-- /btn-group -->
                                        </div>
                                        <!-- /input-group -->
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
</body>

</html>