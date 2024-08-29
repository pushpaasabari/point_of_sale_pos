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
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>GSTIN</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customer_list->count() > 0)
                                        @foreach($customer_list as $value)
                                        <tr>
                                            {{-- <td>{{$value->user_type}}</td> --}}
                                            <td>{{$value->customer_name}}</td>
                                            <td>{{$value->customer_mobile}}</td>
                                            <td>{{$value->customer_gstin}}</td>
                                            <td>{{$value->customer_email}}</td>
                                            <td>{{$value->customer_address}}</td>
                                            @if($value->customer_status == 1)

                                            <td>
                                                <a href="customer_status_change/{{$value->customer_sno}}/{{$value->customer_status}}"
                                                    class="btn btn-success btn-sm toastsDefaultSuccess">Active</a>
                                            </td>
                                            @elseif($value->customer_status == 0)
                                            <td>
                                                <a href="customer_status_change/{{$value->customer_sno}}/{{$value->customer_status}}"
                                                    class="btn btn-danger btn-sm toastsDefaultSuccess">Suspended</a>
                                            </td>
                                            @else
                                            <td>
                                                <a href="customer_status_change/{{$value->customer_sno}}/{{$value->customer_status}}"
                                                    class="btn btn-warning btn-sm toastsDefaultSuccess">Unknown</a>
                                            </td>
                                            @endif
                                            <td>
                                                <a href="customer.edit/{{$value->customer_sno}}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="customer.delete/{{$value->customer_sno}}/{{$value->customer_name}}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete {{$value->customer_name}}?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach @else
                                        <tr>
                                            <td colspan="7">No Records Found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
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