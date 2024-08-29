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
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>ID Proof</th>
                                            <th>ID Proof IMG</th>
                                            <th>Address</th>
                                            <th>Created On</th>
                                            <th>Updated On</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($admin_list->count() > 0)
                                        @foreach($admin_list as $value)
                                        <tr>
                                            {{-- <td>{{$value->user_type}}</td> --}}
                                            <td>{{$value->user_name}}</td>
                                            <td>{{$value->user_id}}</td>
                                            <td>{{$value->user_email}}</td>
                                            <td>{{$value->user_mobile}}</td>
                                            <td>{{$value->user_id_proof}}</td>
                                            <td><img class="img-responsive" src="{{asset($value->user_id_proof_image)}}"
                                                    alt="" width="40" height="40"></td>
                                            <td>{{$value->user_address}}</td>
                                            <td>{{$value->user_created_on}}</td>
                                            <td>{{$value->user_updated_on}}</td>
                                            @if($value->user_status == 1)

                                            <td>
                                                <a href="user_status_change/{{$value->user_id}}/{{$value->user_status}}"
                                                    class="btn btn-success btn-sm toastsDefaultSuccess">Active</a>
                                            </td>
                                            @elseif($value->user_status == 0)
                                            <td>
                                                <a href="user_status_change/{{$value->user_id}}/{{$value->user_status}}"
                                                    class="btn btn-danger btn-sm toastsDefaultSuccess">Suspended</a>
                                            </td>
                                            @else
                                            <td>
                                                <a href="user_status_change/{{$value->user_id}}/{{$value->user_status}}"
                                                    class="btn btn-warning btn-sm toastsDefaultSuccess">Unknown</a>
                                            </td>
                                            @endif
                                            <td>
                                                <a href="user.user_edit/{{$value->user_id}}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="user_delete/{{$value->user_id}}/{{$value->user_name}}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete {{$value->user_name}}?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach @else
                                        <tr>
                                            <td colspan="5">No Records Found</td>
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