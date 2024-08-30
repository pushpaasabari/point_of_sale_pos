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

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sale</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button> --}}
                        </div>
                    </div>
                    <form name="add_purchase" id="add_purchase" class="form-horizontal" method="Post"
                        action="{{ url('suadmin/purchase.add') }}" enctype="multipart/form-data" autocomplete="on">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-2 pb-2">
                                    <label for="vendor_name">Customer :</label>
                                    <select class=" select2" name="vendor_name" id="vendor_name"
                                        data-placeholder="Select Customer" style="width: 100%;">
                                        {{-- <option></option> --}}
                                        @if($customer->count() > 0)
                                        @foreach($customer as $value)
                                        <option value="{{$value->customer_sno}}">{{$value->customer_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-2 pb-2">
                                    <label for="vendor_list">Mobile :</label>
                                    <input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile"
                                        placeholder="Mobile">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 pb-2">
                                    <input type="text" class="form-control" name="purchase_bill_num"
                                        id="purchase_bill_num" placeholder="Bill No" value="{{$nextBillNumber}}"
                                        readonly>
                                </div>
                                <div class="col-sm-2 pb-2">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="sale_date"
                                            data-target="#reservationdate" placeholder="Date">
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item Table -->
                            {{-- <div class="table-responsive mb-3"> --}}
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1 pb-2">#</th>
                                            <th class="col-sm-2 pb-2">ITEM</th>
                                            <th class="col-sm-1 pb-2">QTY</th>
                                            <th class="col-sm-1 pb-2">UNIT</th>
                                            <th class="col-sm-1 pb-2">PRICE/UNIT</th>
                                            <th class="col-sm-2 pb-2 text-center">DISCOUNT</th>
                                            <th class="col-sm-2 pb-2 text-center">TAX</th>
                                            <th class="col-sm-1 pb-2">AMOUNT</th>
                                            <th class="col-sm-1 pb-2"></th>
                                        </tr>
                                        <hr>
                                        {{-- <div id="itemTableBody">
                                            <div class="row">
                                                <div class="col-sm-1 pb-2">1</div>
                                                <div class="col-sm-2 pb-2"><input type="text"
                                                        class="form-control form-control-sm" placeholder="Item"></div>
                                                <div class="col-sm-1 pb-2"><input type="number"
                                                        class="form-control form-control-sm" placeholder="Qty"></div>
                                                <div class="col-sm-1 pb-2">
                                                    <select class="form-control form-control-sm">
                                                        <option>NONE</option>
                                                        <!-- Add other units here -->
                                                    </select>
                                                </div>
                                                <div class="col-sm-1 pb-2"><input type="number"
                                                        class="form-control form-control-sm" placeholder="Price"></div>
                                                <div class="col-sm-2 pb-2">
                                                    <div class="row">
                                                        <div class="col-sm-6 pb-2">
                                                            <input type="number" class="form-control form-control-sm "
                                                                placeholder="%">
                                                        </div>
                                                        <div class="col-sm-6 pb-2">
                                                            <input type="number" class="form-control form-control-sm "
                                                                placeholder="Amount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 pb-2">
                                                    <div class="row">
                                                        <div class="col-sm-6 pb-2">
                                                            <select class="form-control form-control-sm">
                                                                <option>Select</option>
                                                                <!-- Add tax options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 pb-2">
                                                            <input type="number" class="form-control form-control-sm"
                                                                placeholder="Amount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 pb-2"><input type="number"
                                                        class="form-control form-control-sm" placeholder="Amount"
                                                        readonly>
                                                </div>
                                                <div class="col-sm-1 pb-2"><i class="remove-row far fa-trash-alt "></i>
                                                </div>
                                                <hr>
                                            </div>

                                        </div> --}}


                                    </thead>
                                    <tbody id="itemTableBody">
                                        <tr>
                                            <td class="col-sm-1 pb-2">1</td>
                                            <td class="col-sm-2 pb-2"><input type="text"
                                                    class="form-control form-control-sm" placeholder="Item">
                                            </td>
                                            <td class="col-sm-1 pb-2"><input type="number"
                                                    class="form-control form-control-sm" placeholder="Qty"></td>
                                            <td class="col-sm-1 pb-2">
                                                <select class="form-control form-control-sm">
                                                    <option>NONE</option>
                                                    <!-- Add other units here -->
                                                </select>
                                            </td>
                                            <td class="col-sm-1 pb-2"><input type="number"
                                                    class="form-control form-control-sm" placeholder="Price">
                                            </td>
                                            <td class="col-sm-2 pb-2">
                                                <div class="row">
                                                    <div class="col-sm-6 pb-2">
                                                        <input type="number" class="form-control form-control-sm"
                                                            placeholder="%">
                                                    </div>
                                                    <div class="col-sm-6 pb-2">
                                                        <input type="number" class="form-control form-control-sm"
                                                            placeholder="Amount">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 pb-2">
                                                <div class="row">
                                                    <div class="col-sm-6 pb-2">
                                                        <select class="form-control form-control-sm">
                                                            <option>Select</option>
                                                            <!-- Add tax options here -->
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 pb-2">
                                                        <input type="number" class="form-control form-control-sm"
                                                            placeholder="Amount">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 pb-2"><input type="number"
                                                    class="form-control form-control-sm" placeholder="Amount" readonly>
                                            </td>
                                            <td class="col-sm-1 pb-2"><i class="remove-row far fa-trash-alt "></i></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><button id="addRowButton" class="btn btn-primary">Add Row</button></td>
                                            <td colspan="6" class="text-right">TOTAL</td>
                                            <td><input type="number" class="form-control form-control-sm"
                                                    placeholder="Total" readonly>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                {{--
                            </div> --}}
                            <hr>
                            {{-- <button id="addRowButton" class="btn btn-primary">Add Row</button> --}}
                        </div>
                </div>

        </div>

        <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->
    </section>

    </div>
    @include('suadmin::layouts.footer')
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax')
</body>
<script>
    $(function () {
      $('.select2').select2()
    });

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    let rowIndex = 1;

    // Add row event
    document.querySelector('.btn-primary').addEventListener('click', function(e) {
        e.preventDefault();

        const tableBody = document.getElementById('itemTableBody');
        const newRow = tableBody.rows[0].cloneNode(true);

        newRow.querySelectorAll('input').forEach(input => {
            input.value = '';
        });

        // Update row number
        newRow.cells[0].innerText = ++rowIndex;

        // Append the new row to the table
        tableBody.appendChild(newRow);
    });

    // Remove row event
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-row')) {
            e.preventDefault();

            const row = e.target.closest('tr');
            const tableBody = document.getElementById('itemTableBody');

            // Check if there is more than one row
            if (tableBody.rows.length > 1) {
                row.remove();
                rowIndex--;

                // Re-number the rows after deletion
                for (let i = 0; i < tableBody.rows.length; i++) {
                    tableBody.rows[i].cells[0].innerText = i + 1;
                }
            } else {
                alert("At least one row is required.");
            }
        }
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('sale_date').setAttribute('value', today);
    });
</script>



</html>