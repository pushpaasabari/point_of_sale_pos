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
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sale List</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 680px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Invoice</th>
                                                <th>Date</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th>Discount</th>
                                                <th>Tax</th>
                                                <th>Received</th>
                                                <th>Remaining</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($saleList->count() > 0)
                                            @foreach($saleList as $value)
                                            <tr>
                                                {{-- <td>{{$value->user_type}}</td> --}}
                                                <td>{{$value->customer_name}}</td>
                                                <td>{{$value->sale_bill}}</td>
                                                <td>{{$value->sale_date}}</td>
                                                <td>{{$value->totalQty}}</td>
                                                <td>{{$value->total_amount}}</td>
                                                <td>{{$value->item_totalDiscountAmount}}</td>
                                                <td>{{$value->item_totalTaxAmount}}</td>
                                                <td>{{$value->item_totalReceived}}</td>
                                                <td>{{$value->item_totalBalance}}</td>
                                                {{-- <td></td> --}}
                                            </tr>
                                            @endforeach @else
                                            <tr>
                                                <td colspan="5">No Records Found</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Expandable Table</h3>
                                </div>
                                <!-- ./card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>183</td>
                                                <td>John Doe</td>
                                                <td>11-7-2014</td>
                                                <td>Approved</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="true">
                                                <td>219</td>
                                                <td>Alexander Pierce</td>
                                                <td>11-7-2014</td>
                                                <td>Pending</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="true">
                                                <td>657</td>
                                                <td>Alexander Pierce</td>
                                                <td>11-7-2014</td>
                                                <td>Approved</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>175</td>
                                                <td>Mike Doe</td>
                                                <td>11-7-2014</td>
                                                <td>Denied</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>134</td>
                                                <td>Jim Doe</td>
                                                <td>11-7-2014</td>
                                                <td>Approved</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>494</td>
                                                <td>Victoria Doe</td>
                                                <td>11-7-2014</td>
                                                <td>Pending</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>832</td>
                                                <td>Michael Doe</td>
                                                <td>11-7-2014</td>
                                                <td>Approved</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>982</td>
                                                <td>Rocky Doe</td>
                                                <td>11-7-2014</td>
                                                <td>Denied</td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback
                                                    doner.</td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="5">
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley
                                                        of type and scrambled it to make a type specimen book. It has
                                                        survived not only five centuries, but also the leap into
                                                        electronic typesetting, remaining essentially unchanged. It was
                                                        popularised in the 1960s with the release of Letraset sheets
                                                        containing Lorem Ipsum passages, and more recently with desktop
                                                        publishing software like Aldus PageMaker including versions of
                                                        Lorem Ipsum.
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div> --}}
                    <!-- /.row -->

                </div>
            </section>
        </div>
        @include('suadmin::layouts.footer')
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax')
</body>

</html>