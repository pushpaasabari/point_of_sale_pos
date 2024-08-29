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
                        <h3 class="card-title">Purchase</h3>
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
                                    <label for="vendor_name">Vendor :</label>
                                    <select class=" select2" name="vendor_name" id="vendor_name"
                                        data-placeholder="Select Vendor" style="width: 100%;">
                                        <option></option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
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
                                    <input type="text" class="form-control form-control-border" name="purchase_bill_num"
                                        id="purchase_bill_num" placeholder="Bill No">
                                </div>
                                <div class="col-sm-2 pb-2">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control form-control-border datetimepicker-input"
                                            data-target="#reservationdate" placeholder="Date">
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- Item Table -->
                            {{-- <div class="table-responsive mb-3"> --}}
                                <div class="row">
                                    <div class="col-sm-1 pb-2">#</div>
                                    <div class="col-sm-2 pb-2">ITEM</div>
                                    <div class="col-sm-1 pb-2">QTY</div>
                                    <div class="col-sm-1 pb-2">UNIT</div>
                                    <div class="col-sm-1 pb-2">PRICE/UNIT</div>
                                    <div class="col-sm-2 pb-2 text-center">DISCOUNT</div>
                                    <div class="col-sm-2 pb-2 text-center">TAX</div>
                                    <div class="col-sm-1 pb-2">AMOUNT</div>
                                    <div class="col-sm-1 pb-2"></div>
                                </div>
                                <hr>
                                <div id="itemTableBody">
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
                                                class="form-control form-control-sm" placeholder="Amount" readonly>
                                        </div>
                                        <div class="col-sm-1 pb-2"><i class="remove-row far fa-trash-alt "></i></div>
                                        <hr>
                                    </div>

                                </div>

                                <button id="addRowButton" class="btn btn-primary">Add Row</button>

                                {{-- <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1">#</th>
                                            <th class="col-sm-2">ITEM</th>
                                            <th class="col-sm-1">QTY</th>
                                            <th class="col-sm-1">UNIT</th>
                                            <th class="col-sm-1">PRICE/UNIT</th>
                                            <th class="col-sm-1">DISCOUNT</th>
                                            <th class="col-sm-1">TAX</th>
                                            <th class="col-sm-1">AMOUNT</th>
                                            <th class="col-sm-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_itemTableBody">
                                        <tr>
                                            <td>1</td>

                                            <td class="col-sm-2"><input type="text" class="form-control form-control-sm"
                                                    placeholder="Item"></td>
                                            <td class="col-sm-1"><input type="number"
                                                    class="form-control form-control-sm" placeholder="Qty"></td>
                                            <td class="col-sm-1">
                                                <select class="form-control form-control-sm">
                                                    <option>NONE</option>
                                                    <!-- Add other units here -->
                                                </select>
                                            </td>
                                            <td class="col-sm-1"><input type="number"
                                                    class="form-control form-control-sm" placeholder="Price"></td>
                                            <td class="col-sm-1">
                                                <input type="number" class="form-control form-control-sm"
                                                    placeholder="%">
                                                <input type="number" class="form-control form-control-sm"
                                                    placeholder="Amount">
                                            </td>
                                            <td class="col-sm-1">
                                                <select class="form-control form-control-sm">
                                                    <option>Select</option>
                                                    <!-- Add tax options here -->
                                                </select>
                                                <input type="number" class="form-control form-control-sm"
                                                    placeholder="Amount">
                                            </td>
                                            <td class="col-sm-1"><input type="number"
                                                    class="form-control form-control-sm" placeholder="Amount" readonly>
                                            </td>
                                            <td><i class="remove-row far fa-trash-alt "></i></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td colspan="2" class="text-right">TOTAL</td>
                                            <td><input type="number" class="form-control form-control-sm"
                                                    placeholder="Total" readonly>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table> --}}

                                {{--
                            </div> --}}
                            <hr>
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
{{--
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let rowIndex = 1;

        // Add row event
        document.querySelector('.btn-primary').addEventListener('click', function (e) {
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
        document.addEventListener('click', function (e) {
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
</script> --}}
{{--
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let rowIndex = 1;

        // Add row event
        document.querySelector('.btn-primary').addEventListener('click', function (e) {
            e.preventDefault();

            const container = document.getElementById('itemTableBody');
            const firstRow = container.querySelector('.row');
            const newRow = firstRow.cloneNode(true);

            // Clear input values
            newRow.querySelectorAll('input').forEach(input => {
                input.value = '';
            });

            // Update row number
            newRow.querySelector('div.col-sm-1').innerText = ++rowIndex;

            // Append the new row to the container
            container.appendChild(newRow);
        });

        // Remove row event
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.preventDefault();

                const row = e.target.closest('.row');
                const container = document.getElementById('itemTableBody');

                // Check if there is more than one row
                if (container.querySelectorAll('.row').length > 1) {
                    row.remove();
                    rowIndex--;

                    // Re-number the rows after deletion
                    const rows = container.querySelectorAll('.row');
                    rows.forEach((row, index) => {
                        row.querySelector('div.col-sm-1').innerText = index + 1;
                    });
                } else {
                    alert("At least one row is required.");
                }
            }
        });
    });
</script> --}}
{{--
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('itemTableBody');
        let rowIndex = container.querySelectorAll('.row').length;

        // Function to add a new row
        function addRow() {
            const firstRow = container.querySelector('.row');
            const newRow = firstRow.cloneNode(true);

            // Clear input values
            newRow.querySelectorAll('input').forEach(input => {
                input.value = '';
            });

            // Reset select options
            newRow.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0;
            });

            // Update row number
            newRow.querySelector('div.col-sm-1').innerText = ++rowIndex;

            // Add remove event listener to the new row's trash icon
            newRow.querySelector('.remove-row').addEventListener('click', removeRow);

            // Append the new row to the container
            container.appendChild(newRow);
        }

        // Function to remove a row
        function removeRow(event) {
            const row = event.target.closest('.row');

            // Ensure at least one row remains
            if (container.querySelectorAll('.row').length > 1) {
                row.remove();
                rowIndex--;

                // Re-number the rows after deletion
                const rows = container.querySelectorAll('.row');
                rows.forEach((row, index) => {
                    row.querySelector('div.col-sm-1').innerText = index + 1;
                });
            } else {
                alert("At least one row is required.");
            }
        }

        // Add initial remove event listener to existing row
        container.querySelector('.remove-row').addEventListener('click', removeRow);

        // Add row event listener
        document.getElementById('addRowButton').addEventListener('click', addRow);
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let rowIndex = 1;

        // Add row event
        document.querySelector('.btn-primary').addEventListener('click', function (e) {
            e.preventDefault();

            const container = document.getElementById('itemTableBody');
            const firstRow = container.querySelector('.row');
            const newRow = firstRow.cloneNode(true);

            // Clear input values
            newRow.querySelectorAll('input').forEach(input => {
                input.value = '';
            });

            // Update row number
            newRow.querySelector('div.col-sm-1').innerText = ++rowIndex;

            // Append the new row to the container
            container.appendChild(newRow);
        });

        // Remove row event
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.preventDefault();

                const row = e.target.closest('.row');
                const container = document.getElementById('itemTableBody');

                // Check if there is more than one row
                if (container.querySelectorAll('.row').length > 1) {
                    row.remove();
                    rowIndex--;

                    // Re-number the rows after deletion
                    const rows = container.querySelectorAll('.row');
                    rows.forEach((row, index) => {
                        row.querySelector('div.col-sm-1').innerText = index + 1;
                    });
                } else {
                    alert("At least one row is required.");
                }
            }
        });
    });
</script>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h2>Purchase</h2>
            <div class="form-group row">
                <div class="col-sm-2 pb-2">
                    <label for="vendor_name">Vendor :</label>
                    <select class=" select2" name="vendor_name" id="vendor_name" data-placeholder="Select Vendor"
                        style="width: 100%;">
                        <option></option>
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
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
                    <input type="text" class="form-control form-control-border" name="purchase_bill_num"
                        id="purchase_bill_num" placeholder="Bill No">
                </div>
                <div class="col-sm-2 pb-2">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control form-control-border datetimepicker-input"
                            data-target="#reservationdate" placeholder="Date">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Item Table -->
            <div class="table-responsive mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ITEM</th>
                            <th>QTY</th>
                            <th>UNIT</th>
                            <th>PRICE/UNIT</th>
                            <th>DISCOUNT</th>
                            <th>TAX</th>
                            <th>AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody id="itemTableBody">
                        <tr>
                            <td>1</td>
                            <td><input type="text" class="form-control" placeholder="Item"></td>
                            <td><input type="number" class="form-control" placeholder="Qty"></td>
                            <td>
                                <select class="form-control">
                                    <option>NONE</option>
                                    <!-- Add other units here -->
                                </select>
                            </td>
                            <td><input type="number" class="form-control" placeholder="Price"></td>
                            <td>
                                <input type="number" class="form-control" placeholder="%">
                                <input type="number" class="form-control" placeholder="Amount">
                            </td>
                            <td>
                                <select class="form-control">
                                    <option>Select</option>
                                    <!-- Add tax options here -->
                                </select>
                                <input type="number" class="form-control" placeholder="Amount">
                            </td>
                            <td><input type="number" class="form-control" placeholder="Amount" readonly></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5"></td>
                            <td colspan="2" class="text-right">TOTAL</td>
                            <td><input type="number" class="form-control" placeholder="Total" readonly></td>
                        </tr>
                    </tfoot>
                </table>
                <button class="btn btn-primary">Add Row</button>
            </div>
            <!-- Payment Type, Round Off, and Total -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="paymentType">Payment Type</label>
                        <select class="form-control" id="paymentType">
                            <option>Cash</option>
                            <!-- Add more payment types here -->
                        </select>
                        <a href="#" class="d-block mt-2">+ Add Payment type</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-secondary btn-block" disabled>ADD DESCRIPTION</button>
                    <button class="btn btn-secondary btn-block mt-2" disabled>ADD IMAGE</button>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="roundOff">Round Off</label>
                        <input type="number" class="form-control" id="roundOff" placeholder="0">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="totalAmount">Total</label>
                        <input type="number" class="form-control" id="totalAmount" placeholder="Total" readonly>
                    </div>
                </div>
            </div>
            <!-- Footer Actions -->
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Share</button>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </section>
</div>

</html>