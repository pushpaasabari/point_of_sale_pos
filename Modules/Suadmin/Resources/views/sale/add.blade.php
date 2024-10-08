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
                <div class="col-lg-12">
                    <div class="card">
                        <form name="add_sale" id="add_sale" class="form-horizontal" method="Post"
                            action="{{ url('suadmin/sale.add') }}" enctype="multipart/form-data" autocomplete="on">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4 class="card-title">Sale</h4>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal"
                                        data-target="#modal-add-customer">Add
                                        Customer</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="basic-form form-group row">
                                    <div class="col-sm-4 pb-2">
                                        <div class="row">
                                            <div class="col-sm-6 pb-2">
                                                <label for="customer_name">Customer :</label>
                                                <select class="form-control form-control-sm" id="customer_id"
                                                    name="customer_id" required autofocus>
                                                    <option value="">Select Customer</option>
                                                    @if($customer->count() > 0)
                                                    @foreach($customer as $value)
                                                    <option value="{{$value->customer_sno}}">{{$value->customer_name}}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-sm-6 pb-2">
                                                <label for="customer_mobile">Mobile :</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="customer_mobile" id="customer_mobile" placeholder="Mobile"
                                                    required readonly>
                                                <input type="hidden" class="form-control " name="customer_name"
                                                    id="customer_name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2">
                                                <label for="customer_gstin">GSTIN :</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="customer_gstin" id="customer_gstin" placeholder="GSTIN"
                                                    readonly>
                                            </div>
                                            <div class="col-sm-6 pb-2">
                                                <label for="customer_address">Address :</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="customer_address" id="customer_address" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pb-2">
                                    </div>
                                    <div class="col-sm-4 pb-2 float-right">
                                        <div class="row">
                                            <div class="col-sm-6 pb-2">
                                            </div>
                                            <div class="col-sm-6 pb-2">
                                                <label for="sale_bill" class="form-label">Sale Bill No
                                                    :</label>
                                                <input type="text" class="form-control form-control-sm" id="sale_bill"
                                                    name="sale_bill" placeholder="Bill Number *" maxlength="25"
                                                    value="{{$nextBillNumber}}" readonly required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2">
                                            </div>
                                            <div class="col-sm-6 pb-2">
                                                <label for="sale_date" class="form-label">Bill Date
                                                    :</label>
                                                <input type="date" class="form-control form-control-sm mydatepicker"
                                                    name="sale_date" id="sale_date" placeholder="date" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="basic-form">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="col-sm-1 pb-2">#</th>
                                                    <th class="col-sm-2 pb-2">ITEM</th>
                                                    <th class="col-sm-1 pb-2">HSN</th>
                                                    <th class="col-sm-1 pb-2">MRP</th>
                                                    <th class="col-sm-1 pb-2">STOCK</th>
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
                                                        <select class="item_id form-control form-control-sm"
                                                            name="item_id[]" style="width: 100%;" required>
                                                            <option></option>
                                                            @if($item->count() > 0)
                                                            @foreach($item as $value)
                                                            <option value="{{$value->item_sno}}">{{$value->item_name}}
                                                            </option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td class="col-sm-1 pb-2 "><input type="text" name="item_hsn[]"
                                                            class="form-control form-control-sm item_hsn" min="0"
                                                            placeholder="HSN" readonly>
                                                        <input type="hidden" name="item_name[]"
                                                            class="form-control form-control-sm item_name">
                                                    </td>
                                                    <td class="col-sm-1 pb-2 "><input type="text" name="item_mrp[]"
                                                            class="form-control form-control-sm item_mrp" data-min="1"
                                                            data-max="99999999" oninput="validateNumber(this)"
                                                            placeholder="MRP">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="item_stock[]" id="item_stock"
                                                            class="form-control form-control-sm item_stock" min="0"
                                                            placeholder="Stock" readonly>
                                                    </td>
                                                    <td class="col-sm-1 pb-2"><input type="text" name="item_qty[]"
                                                            class="form-control form-control-sm item_qty" id="item_qty"
                                                            data-min="1" data-max="99999999"
                                                            oninput="validateNumber(this)" placeholder="Qty" required>

                                                    </td>
                                                    <td class="col-sm-1 pb-2">
                                                        <input type="text"
                                                            class="form-control form-control-sm item_sale"
                                                            name="item_sale[]" id="item_sale" data-min="1"
                                                            data-max="99999999" oninput="validateNumber(this)"
                                                            placeholder="Price">
                                                    </td>
                                                    <td class="col-sm-1 pb-2 ">
                                                        <div class="row">
                                                            <div class="col-md-5"><input type="text"
                                                                    class="form-control form-control-sm item_discount_percentage"
                                                                    name="item_discount_percentage[]"
                                                                    id="item_discount_percentage" data-min="1"
                                                                    data-max="100" oninput="validateNumber(this)"
                                                                    placeholder="Discount %">
                                                            </div>
                                                            <div class="col-md-7"><input type="text"
                                                                    class="form-control form-control-sm item_discount"
                                                                    name="item_discount[]" id="item_discount"
                                                                    data-min="1" data-max="99999999"
                                                                    oninput="validateNumber(this)"
                                                                    placeholder="Discount Amount">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="col-sm-1 pb-2 ">
                                                        <div class="row">
                                                            <div class="col-md-5"><input type="text"
                                                                    class="form-control form-control-sm item_tax_percentage"
                                                                    name="item_tax_percentage[]" data-min="1"
                                                                    data-max="100" oninput="validateNumber(this)"
                                                                    placeholder="Tax %" readonly>
                                                            </div>
                                                            <div class="col-md-7"><input type="text"
                                                                    class="form-control form-control-sm item_tax"
                                                                    name="item_tax[]" placeholder="Tax Amount"
                                                                    data-min="1" data-max="99999999"
                                                                    oninput="validateNumber(this)" readonly>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="col-sm-1 pb-2"><input type="text" name="item_amount[]"
                                                            class="form-control form-control-sm item_amount"
                                                            data-min="1" data-max="99999999"
                                                            oninput="validateNumber(this)" placeholder="Amount"
                                                            readonly>
                                                    </td>
                                                    <td class="col-sm-1 pb-2"><i
                                                            class="remove-row far fa-trash-alt "></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td><button id="addRowButton" class="btn btn-primary">Add</button>
                                                    </td>
                                                    <td colspan="4" class="text-right">TOTAL</td>
                                                    <td><input type="number"
                                                            class="form-control form-control-sm totalQty"
                                                            name="totalQty" id="totalQty" placeholder="Qty" readonly>
                                                    </td>
                                                    <td></td>
                                                    <td><input type="number"
                                                            class="form-control form-control-sm item_totalDiscountAmount"
                                                            name="item_totalDiscountAmount"
                                                            id="item_totalDiscountAmount" placeholder="Discount"
                                                            readonly>
                                                    </td>
                                                    <td><input type="number"
                                                            class="form-control form-control-sm item_totalTaxAmount"
                                                            name="item_totalTaxAmount" id="item_totalTaxAmount"
                                                            placeholder="Tax" readonly>
                                                    </td>
                                                    <td><input type="number"
                                                            class="form-control form-control-sm item_totalAmount"
                                                            name="item_totalAmount" id="item_totalAmount"
                                                            placeholder="Total" readonly>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4 pb-2"></div>
                                    <div class="col-md-4 pb-2"></div>
                                    <div class="col-md-4 pb-2">
                                        <div class="row">
                                            <div class="pb-2 col-md-4 float-right"></div>
                                            <div class="pb-2 col-md-4 float-right"><label for="cash_received">Cash
                                                    Paid
                                                    :</label></div>
                                            <div class="pb-2 col-md-4 float-right">
                                                <input type="text"
                                                    class="form-control form-control-sm item_totalReceived float-right"
                                                    name="item_totalReceived" id="item_totalReceived"
                                                    placeholder="Cash Paid">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="pb-2 col-md-4 float-right"></div>
                                            <div class="pb-2 col-md-4 float-right"><label for="balance">Balance
                                                    :</label>
                                            </div>
                                            <div class="pb-2 col-md-4 float-right">

                                                <input type="number"
                                                    class="form-control form-control-sm item_totalBalance float-right"
                                                    name="item_totalBalance" id="item_totalBalance"
                                                    placeholder="Total Balance" readonly>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax_sale')
    @include('suadmin::layouts.script_sale')
    @include('suadmin::layouts.modal_sale')
    @include('suadmin::layouts.footer')