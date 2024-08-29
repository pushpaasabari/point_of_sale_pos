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
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
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
                                        data-placeholder="Select Vendor *" style="width: 100%;">
                                        <option></option>
                                        @if($vendor->count() > 0)
                                        @foreach($vendor as $value)
                                        <option value="{{$value->vendor_sno}}">{{$value->vendor_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-2 pb-2">
                                    <label for="vendor_list">Mobile :</label>
                                    <input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile"
                                        placeholder="Mobile" readonly>
                                </div>
                                <div class="col-sm-2 pb-2">
                                    <label for="vendor_gstin">GSTIN :</label>
                                    <input type="text" class="form-control" name="vendor_gstin" id="vendor_gstin"
                                        placeholder="GSTIN" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 pb-2">
                                    <input type="text" class="form-control form-control-border" name="purchase_bill_num"
                                        id="purchase_bill_num" placeholder="Bill No">
                                </div>
                                <div class="col-sm-2 pb-2">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="purchase_date"
                                            data-target="#reservationdate" placeholder="Date">
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-sm-1 pb-2">#</th>
                                        <th class="col-sm-2 pb-2">ITEM</th>
                                        <th class="col-sm-1 pb-2">HSN</th>
                                        <th class="col-sm-1 pb-2">MRP</th>
                                        <th class="col-sm-1 pb-2">QTY</th>
                                        <th class="col-sm-1 pb-2">PRICE/UNIT</th>
                                        <th class="col-sm-1 pb-2 text-center">DISCOUNT</th>
                                        <th class="col-sm-1 pb-2 text-center">TAX</th>
                                        <th class="col-sm-1 pb-2">AMOUNT</th>
                                        <th class="col-sm-1 pb-2"></th>
                                    </tr>
                                </thead>
                                <tbody id="itemTableBody">
                                    <tr>
                                        <td class="col-sm-1 pb-2">1</td>
                                        <td class="col-sm-2 pb-2">
                                            <select class=" select2 form-control form-control-sm" name="item_name"
                                                id="item_name" data-placeholder="" style="width: 100%;">
                                                <option></option>
                                                @if($item->count() > 0)
                                                @foreach($item as $value)
                                                <option value="{{$value->item_sno}}">{{$value->item_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td class="col-sm-1 pb-2"><input type="text" name="item_hsn" id="item_hsn"
                                                class="form-control form-control-sm" oninput="validateNumber(this)"
                                                placeholder="HSN" data-min="1" data-max="99999999"></td>
                                        <td class="col-sm-1 pb-2"><input type="text" name="item_mrp" id="item_mrp"
                                                class="form-control form-control-sm" oninput="validateNumber(this)"
                                                placeholder="MRP"></td>
                                        <td class="col-sm-1 pb-2">
                                            <input type="text" id="item_qty" name="item_qty"
                                                oninput="validateNumber(this)" class="form-control form-control-sm"
                                                placeholder="Qty">
                                        </td>

                                        <td class="col-sm-1 pb-2"><input type="text"
                                                class="form-control form-control-sm" placeholder="Price"
                                                oninput="validateNumber(this)">
                                        </td>
                                        <td class="col-sm-1 pb-2">
                                            <div class="row">
                                                <div class="col-sm-5 pb-2">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="%" oninput="validateNumber(this)">
                                                </div>
                                                <div class="col-sm-7 pb-2">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Amount" oninput="validateNumber(this)">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 pb-2">
                                            <div class="row">
                                                <div class="col-sm-5 pb-2">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="item_tax" id="item_tax" oninput="validateNumber(this)"
                                                        data-min="0" data-max="28">
                                                </div>
                                                <div class="col-sm-7 pb-2">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Amount" oninput="validateNumber(this)">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 pb-2"><input type="text"
                                                class="form-control form-control-sm" placeholder="Amount"
                                                oninput="validateNumber(this)">
                                        </td>
                                        <td class="col-sm-1 pb-2"><i class="remove-row far fa-trash-alt "></i></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><button id="addRowButton" class="btn btn-primary">Add Row</button></td>
                                        <td colspan="7" class="text-right">TOTAL</td>
                                        <td><input type="number" class="form-control form-control-sm"
                                                placeholder="Total">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <hr> --}}
                            <div class="basic-form">
                                {{-- <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1 pb-2">#</th>
                                            <th class="col-sm-2 pb-2">ITEM</th>
                                            <th class="col-sm-1 pb-2">HSN</th>
                                            <th class="col-sm-1 pb-2">MRP</th>
                                            <th class="col-sm-1 pb-2">QTY</th>
                                            <th class="col-sm-1 pb-2">PRICE</th>
                                            <th class="col-sm-1 pb-2">DISCOUNT</th>
                                            <th class="col-sm-1 pb-2">TAX</th>
                                            <th class="col-sm-1 pb-2">AMOUNT</th>
                                            <th class="col-sm-1 pb-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemTableBody">
                                        <tr rowid='1'>
                                            <td class="col-sm-1 pb-2">1</td>
                                            <td class="col-sm-2 pb-2">
                                                <select class="item_id select2 form-control form-control-sm"
                                                    name="item_id[]" id="item_id" data-placeholder=""
                                                    style="width: 100%;">
                                                    <option></option>
                                                    @if($item->count() > 0)
                                                    @foreach($item as $value)
                                                    <option value="{{$value->item_sno}}">{{$value->item_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                            <td class="col-sm-1 pb-2 ">
                                                <input type="text" name="item_hsn[]" id="item_hsn"
                                                    class="form-control form-control-sm" oninput="validateNumber(this)"
                                                    data-min="0" data-max="99999999" placeholder="HSN Code">
                                                <input type="hidden" name="item_name[]" id="item_name"
                                                    class="form-control form-control-sm">
                                            </td>
                                            <td class="col-sm-1 pb-2 ">
                                                <input type="text" name="item_mrp[]" id="item_mrp"
                                                    class="form-control form-control-sm" oninput="validateNumber(this)"
                                                    data-min="0" data-max="99999999" placeholder="MRP">
                                            </td>
                                            <td class="col-sm-1 pb-2">
                                                <input type="text" name="item_qty[]" id="item_qty"
                                                    class="form-control form-control-sm" oninput="validateNumber(this)"
                                                    data-min="0" data-max="99999999" placeholder="Qty">
                                            </td>
                                            <td class="col-sm-1 pb-2">
                                                <input type="text" name="item_purchase[]" id="item_purchase"
                                                    class="form-control form-control-sm" oninput="validateNumber(this)"
                                                    data-min="0" data-max="99999999" placeholder="Price">
                                            </td>
                                            <td class="col-sm-1 pb-2">
                                                <div class="row">
                                                    <div class="col-sm-5 pb-2">
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="%" oninput="validateNumber(this)">
                                                    </div>
                                                    <div class="col-sm-7 pb-2">
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Amount" oninput="validateNumber(this)">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 pb-2">
                                                <div class="row">
                                                    <div class="col-sm-5 pb-2">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="item_tax" id="item_tax" oninput="validateNumber(this)"
                                                            data-min="0" data-max="28">
                                                    </div>
                                                    <div class="col-sm-7 pb-2">
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Amount" oninput="validateNumber(this)">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 pb-2">
                                                <input type="text" name="item_amount[]" name="item_amount"
                                                    class="form-control form-control-sm " oninput="validateNumber(this)"
                                                    data-min="0" data-max="99999999" placeholder="Amount" readonly>
                                            </td>
                                            <td class="col-sm-1 pb-2"><i class="remove-row far fa-trash-alt "></i></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><button id="addRowButton" class="btn btn-primary">Add Row</button></td>
                                            <td colspan="3" class="text-right">TOTAL</td>
                                            <td><input type="number" class="form-control form-control-sm item_totalQty"
                                                    name="item_totalQty" id="item_totalQty" placeholder="Total Qty"
                                                    readonly>
                                            </td>
                                            <td><input type="number"
                                                    class="form-control form-control-sm item_totalPrice"
                                                    name="item_totalPrice" id="item_totalPrice"
                                                    placeholder="Total Price" readonly>
                                            </td>
                                            <td><input type="number"
                                                    class="form-control form-control-sm item_totalDiscount"
                                                    name="item_totalDiscount" id="item_totalDiscount"
                                                    placeholder="Total Discount" readonly>
                                            </td>
                                            <td><input type="number" class="form-control form-control-sm item_totalTax"
                                                    name="item_totalTax" id="item_totalTax" placeholder="Total Tax"
                                                    readonly>
                                            </td>
                                            <td><input type="number"
                                                    class="form-control form-control-sm item_totalAmount"
                                                    name="item_totalAmount" id="item_totalAmount"
                                                    placeholder="Total Amount" readonly>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table> --}}
                                <!-- Updated Table Structure -->
                                {{-- <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ITEM</th>
                                            <th>HSN</th>
                                            <th>MRP</th>
                                            <th>QTY</th>
                                            <th>PRICE</th>
                                            <th>DISCOUNT (%)</th>
                                            <th>DISCOUNT (Amount)</th>
                                            <th>TAX (%)</th>
                                            <th>TAX (Amount)</th>
                                            <th>AMOUNT</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemTableBody">
                                        <tr data-row-id="1">
                                            <td class="row-index">1</td>
                                            <td>
                                                <select class="form-control form-control-sm item-select">
                                                    <option value="">Select Item</option>
                                                    @if($item->count() > 0)
                                                    @foreach($item as $value)
                                                    <option value="{{ $value->item_sno }}">{{ $value->item_name }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-sm item-hsn"
                                                    name="item-hsn" id="item-hsn" placeholder="HSN Code">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm item-mrp"
                                                    name="item-mrp" id="item-mrp" placeholder="MRP">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm item-qty"
                                                    placeholder="Qty">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm item-price"
                                                    name="item-price" id="item-price" placeholder="Price">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="form-control form-control-sm item-discount-percentage"
                                                    placeholder="Discount %">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="form-control form-control-sm item-discount-amount"
                                                    placeholder="Discount Amount" readonly>
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="form-control form-control-sm item-tax-percentage"
                                                    placeholder="Tax %">
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="form-control form-control-sm item-tax-amount"
                                                    placeholder="Tax Amount" readonly>
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="form-control form-control-sm item-total-amount"
                                                    placeholder="Total Amount" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <button id="addRowButton" class="btn btn-primary btn-sm">Add
                                                    Row</button>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" id="total-qty"
                                                    placeholder="Total Qty" readonly>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm"
                                                    id="total-price" placeholder="Total Price" readonly>
                                            </td>
                                            <td colspan="2">
                                                <input type="number" class="form-control form-control-sm"
                                                    id="total-discount" placeholder="Total Discount" readonly>
                                            </td>
                                            <td colspan="2">
                                                <input type="number" class="form-control form-control-sm" id="total-tax"
                                                    placeholder="Total Tax" readonly>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm"
                                                    id="grand-total" placeholder="Grand Total" readonly>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table> --}}
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1 pb-2">#</th>
                                            <th class="col-sm-2 pb-2">ITEM</th>
                                            <th class="col-sm-1 pb-2">HSN</th>
                                            <th class="col-sm-1 pb-2">MRP</th>
                                            <th class="col-sm-1 pb-2">QTY</th>
                                            <th class="col-sm-1 pb-2">PRICE</th>
                                            <th class="col-sm-1 pb-2">DISCOUNT</th>
                                            <th class="col-sm-1 pb-2">TAX</th>
                                            <th class="col-sm-1 pb-2">AMOUNT</th>
                                            <th class="col-sm-1 pb-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemTableBody">
                                        <tr data-row-id="1">
                                            <td class="row-index">1</td>
                                            <td>
                                                <select class="item_id select2 form-control form-control-sm"
                                                    name="item_id[]" id="item_id" data-placeholder=""
                                                    style="width: 100%;">
                                                    <option></option>
                                                    @if($item->count() > 0)
                                                    @foreach($item as $value)
                                                    <option value="{{$value->item_sno}}">{{$value->item_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-sm item-hsn"
                                                    name="item-hsn[]" id="item-hsn" placeholder="HSN Code">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm item-mrp"
                                                    name="item-mrp[]" id="item-mrp" placeholder="MRP">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm item-qty"
                                                    placeholder="Qty">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm item-price"
                                                    name="item-price[]" id="item-price" placeholder="Price">
                                            </td>
                                            <td>
                                                <div class="cal-md-6"><input type="number"
                                                        class="form-control form-control-sm item-discount-percentage"
                                                        placeholder="Discount %"></div>
                                                <div class="cal-md-6"><input type="number"
                                                        class="form-control form-control-sm item-discount-amount"
                                                        placeholder="Discount Amount" readonly></div>

                                            </td>

                                            <td>
                                                <input type="number"
                                                    class="form-control form-control-sm item-tax-percentage"
                                                    placeholder="Tax %"><input type="number"
                                                    class="form-control form-control-sm item-tax-amount"
                                                    placeholder="Tax Amount" readonly>
                                            </td>

                                            <td>
                                                <input type="number"
                                                    class="form-control form-control-sm item-total-amount"
                                                    placeholder="Total Amount" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <button id="addRowButton" class="btn btn-primary btn-sm">Add
                                                    Row</button>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" id="total-qty"
                                                    placeholder="Total Qty" readonly>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm"
                                                    id="total-price" placeholder="Total Price" readonly>
                                            </td>
                                            <td colspan="2">
                                                <input type="number" class="form-control form-control-sm"
                                                    id="total-discount" placeholder="Total Discount" readonly>
                                            </td>
                                            <td colspan="2">
                                                <input type="number" class="form-control form-control-sm" id="total-tax"
                                                    placeholder="Total Tax" readonly>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm"
                                                    id="grand-total" placeholder="Grand Total" readonly>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>


                            </div>

                            {{--
                        </div> --}}
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-4 pb-2"></div>
                            <div class="col-md-4 pb-2"></div>
                            <div class="col-md-4 pb-2">
                                <div class="row">
                                    <div class="pb-2 col-md-4 float-right"></div>
                                    <div class="pb-2 col-md-4 float-right"><label for="vendor_mobile">Total :</label>
                                    </div>
                                    <div class="pb-2 col-md-4 float-right">

                                        <input type="number"
                                            class="form-control form-control-sm item_totalAmount float-right"
                                            name="item_totalAmount" id="item_totalAmount" placeholder="Total Amount"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="pb-2 col-md-4 float-right"></div>
                                    <div class="pb-2 col-md-4 float-right"><label for="vendor_mobile">Cash Received
                                            :</label></div>
                                    <div class="pb-2 col-md-4 float-right">
                                        <input type="text"
                                            class="form-control form-control-sm item_totalReceived float-right"
                                            name="item_totalReceived" id="item_totalReceived"
                                            placeholder="Cash Received">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="pb-2 col-md-4 float-right"></div>
                                    <div class="pb-2 col-md-4 float-right"><label for="vendor_mobile">Balance :</label>
                                    </div>
                                    <div class="pb-2 col-md-4 float-right">

                                        <input type="number"
                                            class="form-control form-control-sm item_totalBalance float-right"
                                            name="item_totalBalance" id="item_totalBalance" placeholder="Total Balance"
                                            readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- <button id="addRowButton" class="btn btn-primary">Add Row</button> --}}

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Save</button>
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
<!-- Datalist select -->
<script>
    $(function () {
      $('.select2').select2()
    });

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
<!-- Add Row script -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        let rowIndex = document.querySelectorAll('#itemTableBody tr').length; // Initialize rowIndex based on the number of rows

        // Add row event
        document.querySelector('#addRowButton').addEventListener('click', function(e) {
            e.preventDefault();

            const container = document.getElementById('itemTableBody');
            const firstRow = container.querySelector('tr');
            const newRow = firstRow.cloneNode(true);

            // Clear input values and remove IDs to avoid duplicates
            newRow.querySelectorAll('input').forEach(input => {
                input.value = '';
                input.removeAttribute('id');
            });

            // Clear select fields and remove IDs
            newRow.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0; // Reset select fields
                select.removeAttribute('id');
            });

            // Update row number
            newRow.querySelector('td:first-child').innerText = ++rowIndex;

            // Append the new row to the container
            container.appendChild(newRow);
        });

        // Remove row event
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.preventDefault();

                const row = e.target.closest('tr');
                const container = document.getElementById('itemTableBody');

                // Check if there is more than one row
                if (container.querySelectorAll('tr').length > 1) {
                    row.remove();

                    // Re-number the rows after deletion
                    const rows = container.querySelectorAll('tr');
                    rowIndex = rows.length; // Update rowIndex to reflect the current number of rows

                    rows.forEach((row, index) => {
                        row.querySelector('td:first-child').innerText = index + 1;
                    });
                } else {
                    alert("At least one row is required.");
                }
            }
        });
    });
</script> --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        let rowIndex = document.querySelectorAll('#itemTableBody tr').length; 

        document.querySelector('#addRowButton').addEventListener('click', function(e) {
            e.preventDefault();

            const container = document.getElementById('itemTableBody');
            const firstRow = container.querySelector('tr');
            const newRow = firstRow.cloneNode(true);

            newRow.querySelectorAll('input').forEach(input => {
                input.value = '';
                input.removeAttribute('id');
            });

            newRow.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0; 
                select.removeAttribute('id');
            });

            newRow.querySelector('td:first-child').innerText = ++rowIndex;

            container.appendChild(newRow);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.preventDefault();

                const row = e.target.closest('tr');
                const container = document.getElementById('itemTableBody');

                if (container.querySelectorAll('tr').length > 1) {
                    row.remove();

                    const rows = container.querySelectorAll('tr');
                    rowIndex = rows.length; 

                    rows.forEach((row, index) => {
                        row.querySelector('td:first-child').innerText = index + 1;
                    });
                } else {
                    alert("At least one row is required.");
                }
            }
        });
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let rowIndex = 1;

        // Initialize Select2 for the first row
        initializeSelect2($('.item-select'));

        // Add new row
        document.querySelector('#addRowButton').addEventListener('click', function (e) {
            e.preventDefault();
            addNewRow();
        });

        // Function to add new row
        function addNewRow() {
            rowIndex++;
            const tableBody = document.getElementById('itemTableBody');
            const newRow = tableBody.querySelector('tr').cloneNode(true);

            // Clear input values
            $(newRow).find('input').val('');
            $(newRow).find('.row-index').text(rowIndex);
            $(newRow).attr('data-row-id', rowIndex);

            // Initialize Select2 for new select
            initializeSelect2($(newRow).find('.item-select'));

            // Append new row
            tableBody.appendChild(newRow);
        }

        // Initialize Select2
        function initializeSelect2(element) {
            element.select2({
                placeholder: 'Select Item',
                allowClear: true,
                width: '100%'
            });
        }

        // Remove row
        $(document).on('click', '.remove-row', function () {
            if ($('#itemTableBody tr').length > 1) {
                $(this).closest('tr').remove();
                updateRowIndices();
                calculateTotals();
            } else {
                alert('At least one row is required.');
            }
        });

        // Update row indices after deletion
        function updateRowIndices() {
            rowIndex = 0;
            $('#itemTableBody tr').each(function () {
                rowIndex++;
                $(this).find('.row-index').text(rowIndex);
                $(this).attr('data-row-id', rowIndex);
            });
        }

        // Event delegation for input changes
        $(document).on('input change', '.item-qty, .item-price, .item-discount-percentage, .item-tax-percentage', function () {
            const row = $(this).closest('tr');
            calculateRow(row);
            calculateTotals();
        });

        // Calculate individual row
        function calculateRow(row) {
            const qty = parseFloat(row.find('.item-qty').val()) || 0;
            const price = parseFloat(row.find('.item-price').val()) || 0;
            const discountPercent = parseFloat(row.find('.item-discount-percentage').val()) || 0;
            const taxPercent = parseFloat(row.find('.item-tax-percentage').val()) || 0;

            const amount = qty * price;
            const discountAmount = (amount * discountPercent) / 100;
            const taxableAmount = amount - discountAmount;
            const taxAmount = (taxableAmount * taxPercent) / 100;
            const totalAmount = taxableAmount + taxAmount;

            row.find('.item-discount-amount').val(discountAmount.toFixed(2));
            row.find('.item-tax-amount').val(taxAmount.toFixed(2));
            row.find('.item-total-amount').val(totalAmount.toFixed(2));
        }

        // Calculate totals
        function calculateTotals() {
            let totalQty = 0;
            let totalPrice = 0;
            let totalDiscount = 0;
            let totalTax = 0;
            let grandTotal = 0;

            $('#itemTableBody tr').each(function () {
                totalQty += parseFloat($(this).find('.item-qty').val()) || 0;
                totalPrice += parseFloat($(this).find('.item-price').val()) || 0;
                totalDiscount += parseFloat($(this).find('.item-discount-amount').val()) || 0;
                totalTax += parseFloat($(this).find('.item-tax-amount').val()) || 0;
                grandTotal += parseFloat($(this).find('.item-total-amount').val()) || 0;
            });

            $('#total-qty').val(totalQty);
            $('#total-price').val(totalPrice.toFixed(2));
            $('#total-discount').val(totalDiscount.toFixed(2));
            $('#total-tax').val(totalTax.toFixed(2));
            $('#grand-total').val(grandTotal.toFixed(2));
        }

        // Initial calculation for the first row
        calculateRow($('#itemTableBody tr'));
        calculateTotals();
    });
</script>

<!-- Today Date -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    
    // Define the date format as YYYY-MM-DD
    var year = today.getFullYear();
    var month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based, so +1
    var day = String(today.getDate()).padStart(2, '0');
    
    var formattedDate = month + '/' + day + '/' + year;
    
    document.getElementById('purchase_date').setAttribute('value', formattedDate);
});
</script>
<!-- Number Validation -->
<script>
    function validateNumber(input) {
      // Remove any non-numeric characters
      input.value = input.value.replace(/[^0-9]/g, '');

    // Retrieve the min and max values from the data attributes
  const min = parseInt(input.getAttribute('data-min'), 10);
  const max = parseInt(input.getAttribute('data-max'), 10);

      // Enforce min and max values
  if (input.value !== '') {
    let value = parseInt(input.value);
    if (value > max) {
      alert(`The maximum allowed number is ${max}.`);
      input.value = 0; // Set the value to 0 after the alert
    } else if (value < min) {
      input.value = min;
    }
  }
    }
</script>

</html>