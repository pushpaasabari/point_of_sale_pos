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
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>HSN</th>
                                            <th>MRP</th>
                                            <th>Purchase Price</th>
                                            <th>Sale Price</th>
                                            <th>Tax</th>
                                            <th>Unit</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($item_list->count() > 0)
                                        @foreach($item_list as $value)
                                        <tr>
                                            {{-- <td>{{$value->user_type}}</td> --}}
                                            <td>{{$value->item_category}}</td>
                                            <td>{{$value->item_name}}</td>
                                            <td>{{$value->item_hsn}}</td>
                                            <td>{{$value->item_mrp}}</td>
                                            <td>{{$value->item_purchase_price}}</td>
                                            <td>{{$value->item_sale_price}}</td>
                                            <td>{{$value->item_tax}}</td>
                                            <td>{{$value->item_base_unit}}</td>
                                            <td>{{$value->item_stock}}</td>
                                            @if($value->item_status == 1)

                                            <td>
                                                <a href="item_status_change/{{$value->item_sno}}/{{$value->item_status}}"
                                                    class="btn btn-success btn-sm toastsDefaultSuccess">Active</a>
                                            </td>
                                            @elseif($value->item_status == 0)
                                            <td>
                                                <a href="item_status_change/{{$value->item_sno}}/{{$value->item_status}}"
                                                    class="btn btn-danger btn-sm toastsDefaultSuccess">Suspended</a>
                                            </td>
                                            @else
                                            <td>
                                                <a href="item_status_change/{{$value->item_sno}}/{{$value->item_status}}"
                                                    class="btn btn-warning btn-sm toastsDefaultSuccess">Unknown</a>
                                            </td>
                                            @endif
                                            <td>
                                                <a href="item.edit/{{$value->item_sno}}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="item.delete/{{$value->item_sno}}/{{$value->item_name}}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete {{$value->item_name}}?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach @else
                                        <tr>
                                            <td colspan="11">No Records Found</td>
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