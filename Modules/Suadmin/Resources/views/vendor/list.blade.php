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
                        <div class="col-md-3">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Vendar List</h4>
                                    </div>
                                    {{-- <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <h4 class="card-title">Name</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="card-title float-right">Mobile</h4>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="card-body">
                                        <div class="card"> --}}
                                            {{-- <div class=""> --}}
                                                <table id="vendor_list" class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>NAME</th>
                                                            <th>MOBILE</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($vendor_list->count() > 0)
                                                        @foreach($vendor_list as $value)
                                                        <tr>
                                                            <td>{{$value->vendor_name}}</td>
                                                            <td>{{$value->vendor_mobile}}</td>
                                                            <td><i class="float-right fas fa-ellipsis-v"></i></td>

                                                        </tr>
                                                        @endforeach @else
                                                        <tr>
                                                            <td colspan="3">No Records Found</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                                {{--
                                            </div> --}}
                                            {{--
                                        </div> --}}


                                        {{-- @foreach($vendor_list as $value)
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <h4 class="card-title">{{$value->vendor_name}}</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="card-title">{{$value->vendor_mobile}}</h4>
                                            </div>
                                        </div>
                                        @endforeach --}}


                                        {{-- @foreach($vendor_list as $value)
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>{{$value->vendor_name}}</b> <a
                                                    class="float-right">{{$value->vendor_mobile}}</a>
                                            </li>
                                        </ul>
                                        @endforeach --}}
                                        {{-- @foreach($vendor_list as $value) --}}
                                        {{-- <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>{{$value->vendor_name}}</b> <a
                                                    class="float-right">{{$value->vendor_mobile}}</a>
                                            </li>
                                        </ul> --}}
                                        {{-- <strong>{{$value->vendor_name}}</strong>
                                        <strong class="float-right">{{$value->vendor_mobile}}</strong> --}}
                                        {{-- <i class="fas fa-map-marker-alt mr-1"></i> --}}
                                        {{-- <p class="text-muted">
                                            B.S. in Computer Science from the University of Tennessee at Knoxville
                                        </p> --}}
                                        {{--
                                        <hr>
                                        @endforeach --}}
                                        {{--
                                    </div> --}}
                                </div>
                                {{-- <div class="card">
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
                                </div> --}}
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
        @include('suadmin::layouts.footer')
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax')
</body>

</html>