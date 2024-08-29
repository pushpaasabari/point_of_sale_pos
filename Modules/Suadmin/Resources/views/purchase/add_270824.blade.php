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
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
                @endif
                <div class="col-lg-12">
                    <div class="card">
                        <form name="add_purchase" id="add_purchase" class="form-horizontal" method="Post"
                            action="{{ url('suadmin/purchase.add') }}" enctype="multipart/form-data" autocomplete="on">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4 class="card-title bold">Purchase</h4>
                            </div>
                            <div class="card-body" style="text-transform:uppercase">
                                <div class="basic-form form-group row">
                                    <div class="col-sm-4 pb-2">
                                        <div class="row">
                                            <div class="col-sm-6 pb-2">
                                                <label for="vendor_name">Vendor :</label>
                                                <select class="form-control form-control-sm" id="vendor_id"
                                                    name="vendor_id" required autofocus>
                                                    <option value="">Select Vendor</option>
                                                    @if($vendor->count() > 0)
                                                    @foreach($vendor as $value)
                                                    <option value="{{$value->vendor_sno}}">{{$value->vendor_name}}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-sm-6 pb-2">
                                                <label for="vendor_mobile">Mobile :</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="vendor_mobile" id="vendor_mobile" placeholder="Mobile"
                                                    required readonly>
                                                <input type="hidden" class="form-control " name="vendor_name"
                                                    id="vendor_name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2">
                                                <label for="vendor_gstin">GSTIN :</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="vendor_gstin" id="vendor_gstin" placeholder="GSTIN" readonly>
                                            </div>
                                            <div class="col-sm-6 pb-2">
                                                <label for="vendor_address">Address :</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="vendor_address" id="vendor_address" placeholder="Address">
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
                                                <label for="purchase_bill" class="form-label">Bill No
                                                    :</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="purchase_bill" name="purchase_bill" placeholder="Bill Number *"
                                                    required style="text-transform:uppercase">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2">
                                            </div>
                                            <div class="col-sm-6 pb-2">
                                                <label for="purchase_date" class="form-label">Bill Date
                                                    :</label>
                                                <input type="date" class="form-control form-control-sm mydatepicker"
                                                    name="purchase_date" id="purchase_date" placeholder="date" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                {{-- <div class="basic-form form-group row">
                                    <div class="col-sm-2 pb-2">
                                        <label for="vendor_name">Vendor :</label>
                                        <select class="form-control" id="vendor_id" name="vendor_id" required>
                                            <option value="">Select Vendor</option>
                                            @if($vendor->count() > 0)
                                            @foreach($vendor as $value)
                                            <option value="{{$value->vendor_sno}}">{{$value->vendor_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-2 pb-2">
                                        <label for="vendor_mobile">Mobile :</label>
                                        <input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile"
                                            placeholder="Mobile" required readonly>
                                        <input type="hidden" class="form-control" name="vendor_name" id="vendor_name"
                                            required>
                                    </div>
                                    <div class="col-sm-2 pb-2">
                                        <label for="vendor_gstin">GSTIN :</label>
                                        <input type="text" class="form-control" name="vendor_gstin" id="vendor_gstin"
                                            placeholder="GSTIN" required readonly>
                                    </div>
                                </div>
                                <div class="basic-form form-group row">
                                    <div class="col-sm-2 pb-2">
                                        <label for="purchase_bill">Bill No :</label>
                                        <input type="text" class="form-control" id="purchase_bill" name="purchase_bill"
                                            placeholder="Bill Number *" required style="text-transform:uppercase">
                                    </div>
                                    <div class="col-sm-2 pb-2">
                                        <label for="purchase_date">Bill Date :</label>
                                        <input type="date" class="form-control mydatepicker" name="purchase_date"
                                            id="purchase_date" placeholder="date" required>
                                    </div>
                                </div>
                                <hr> --}}
                                <div class="basic-form">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr class="text-center">
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
                                                            class="form-control form-control-sm item_mrp" min="0"
                                                            placeholder="MRP">
                                                    </td>
                                                    <td class="col-sm-1 pb-2"><input type="text" name="item_qty[]"
                                                            class="form-control form-control-sm item_qty" min="0"
                                                            placeholder="Qty" required>
                                                    </td>
                                                    <td class="col-sm-1 pb-2"><input type="text"
                                                            class="form-control form-control-sm item_purchase"
                                                            name="item_purchase[]" min="0" placeholder="Price">
                                                    </td>
                                                    <td class="col-sm-1 pb-2 ">
                                                        <div class="row">
                                                            <div class="col-md-5"><input type="text"
                                                                    class="form-control form-control-sm item_discount_percentage"
                                                                    name="item_discount_percentage[]"
                                                                    placeholder="Discount %">
                                                            </div>
                                                            <div class="col-md-7"><input type="text"
                                                                    class="form-control form-control-sm item_discount"
                                                                    name="item_discount[]"
                                                                    placeholder="Discount Amount">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="col-sm-1 pb-2 ">
                                                        <div class="row">
                                                            <div class="col-md-5"><input type="text"
                                                                    class="form-control form-control-sm item_tax_percentage"
                                                                    name="item_tax_percentage[]" placeholder="Tax %"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-md-7"><input type="text"
                                                                    class="form-control form-control-sm item_tax"
                                                                    name="item_tax[]" placeholder="Tax Amount" readonly>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="col-sm-1 pb-2"><input type="text" name="item_amount[]"
                                                            class="form-control form-control-sm item_amount" min="0"
                                                            placeholder="Amount" readonly>
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
                                                    <td colspan="7" class="text-right">TOTAL</td>
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
                                        {{-- <div class="row">
                                            <div class="pb-2 col-md-4 float-right"></div>
                                            <div class="pb-2 col-md-4 float-right"><label for="total">Total
                                                    :</label>
                                            </div>
                                            <div class="pb-2 col-md-4 float-right">

                                                <input type="number"
                                                    class="form-control form-control-sm item_totalAmount float-right"
                                                    name="item_totalAmount" id="item_totalAmount"
                                                    placeholder="Total Amount" readonly>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="pb-2 col-md-4 float-right"></div>
                                            <div class="pb-2 col-md-4 float-right"><label for="cash_received">Cash
                                                    Received
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
    @include('suadmin::layouts.ajax')

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



    {{-- <script>
        $('#addRowButton').on('click', function() {
    var newRow = `
        <tr>
            <td class="col-sm-1 pb-2">...</td>
            <td class="col-sm-2 pb-2">
                <select class="item_id select2 form-control form-control-sm" name="item_id[]" data-placeholder="" style="width: 100%;">
                    <option></option>
                    @if($item->count() > 0)
                    @foreach($item as $value)
                    <option value="{{$value->item_sno}}">{{$value->item_name}}</option>
                    @endforeach
                    @endif
                </select>
            </td>
            <td class="col-sm-1 pb-2"><input type="text" name="item_hsn[]" class="form-control form-control-sm item_hsn" placeholder="HSN"></td>
            <td class="col-sm-1 pb-2"><input type="text" name="item_mrp[]" class="form-control form-control-sm item_mrp" placeholder="MRP"></td>
            <td class="col-sm-1 pb-2"><input type="text" name="item_qty[]" class="form-control form-control-sm item_qty" placeholder="Qty"></td>
            <td class="col-sm-1 pb-2"><input type="text" class="form-control form-control-sm item_purchase" name="item_purchase[]" placeholder="Price"></td>
            <td>
                                                        <div class="row">
                                                            <div class="col-md-5"><input type="text"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Discount %">
                                                            </div>
                                                            <div class="col-md-7"><input type="text"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Discount Amount">
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-5"><input type="text"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Tax %">
                                                            </div>
                                                            <div class="col-md-7"><input type="text"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Tax Amount">
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="col-sm-1 pb-2"><input type="text" name="item_amount[]"
                                                            class="form-control form-control-sm item_amount" min="0"
                                                            placeholder="Amount" readonly>
                                                    </td>
            
            <td class="col-sm-1 pb-2"><i class="remove-row far fa-trash-alt"></i></td>
        </tr>`;
    $('#itemTableBody').append(newRow);

    $(document).on('click', '.remove-row', function() {
    $(this).closest('tr').remove();
});
});
    </script> --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            let rowIndex = document.querySelectorAll('#itemTableBody tr').length; 
        
            // Add Row Button Click Event
            document.querySelector('#addRowButton').addEventListener('click', function(e) {
                e.preventDefault();
        
                const container = document.getElementById('itemTableBody');
                const firstRow = container.querySelector('tr');
                const newRow = firstRow.cloneNode(true);
        
                // Clear the values of inputs and remove any IDs
                newRow.querySelectorAll('input').forEach(input => {
                    input.value = '';
                    input.removeAttribute('id');
                });
        
                // Reset select fields and remove any IDs
                newRow.querySelectorAll('select').forEach(select => {
                    select.selectedIndex = 0; 
                    select.removeAttribute('id');
                });
        
                // Update row index in the first cell
                newRow.querySelector('td:first-child').innerText = ++rowIndex;
        
                // Append the new row to the table body
                container.appendChild(newRow);
            });
        
            // Remove Row Click Event (using event delegation)
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-row')) {
                    e.preventDefault();
        
                    const row = e.target.closest('tr');
                    const container = document.getElementById('itemTableBody');
        
                    if (container.querySelectorAll('tr').length > 1) {
                        row.remove();
        
                        const rows = container.querySelectorAll('tr');
                        rowIndex = rows.length; 
        
                        // Update row indices after removal
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
        $(document).ready(function() {
    function updateTotalAmount() {
        let total = 0;
        $('.item_amount').each(function() {
            let amount = parseFloat($(this).val());
            amount = isNaN(amount) ? 0 : amount;
            total += amount;
        });
        $('#item_totalAmount').val(total.toFixed(2)); 
    }

    $('#itemTableBody').on('input', '.item_qty', function() {
        var currentRow = $(this).closest('tr'); 
        var qty = parseFloat($(this).val()); 
        var price = parseFloat(currentRow.find('.item_purchase').val()); 

        qty = isNaN(qty) ? 0 : qty;
        price = isNaN(price) ? 0 : price;

        var amount = qty * price; 
        currentRow.find('.item_amount').val(amount.toFixed(2)); 

        updateTotalAmount(); 
    });

    $('#itemTableBody').on('input', '.item_purchase', function() {
        var currentRow = $(this).closest('tr'); 
        var qty = parseFloat(currentRow.find('.item_qty').val());  
        var price = parseFloat($(this).val());  

        qty = isNaN(qty) ? 0 : qty;
        price = isNaN(price) ? 0 : price;

        var amount = qty * price;  
        currentRow.find('.item_amount').val(amount.toFixed(2));  

        updateTotalAmount();  
    });

     $('#itemTableBody').on('input', '.item_amount', function() {
        updateTotalAmount();  
    });

     $('#itemTableBody').on('click', '.remove-row', function() {
        $(this).closest('tr').remove();  
        updateTotalAmount();  
    });
});

    </script> --}}


    <script>
        document.addEventListener('DOMContentLoaded', function () {
    let rowIndex = document.querySelectorAll('#itemTableBody tr').length;

    // Add Row Button Click Event
    document.querySelector('#addRowButton').addEventListener('click', function(e) {
        e.preventDefault();

        const container = document.getElementById('itemTableBody');
        const firstRow = container.querySelector('tr');
        const newRow = firstRow.cloneNode(true);

        // Clear the values of inputs and remove any IDs
        newRow.querySelectorAll('input').forEach(input => {
            input.value = '';
            input.removeAttribute('id');  // Remove ID to avoid duplicates
        });

        // Reset select fields and remove any IDs
        newRow.querySelectorAll('select').forEach(select => {
            select.selectedIndex = 0;
            select.removeAttribute('id');  // Remove ID to avoid duplicates
        });

        // Update row index in the first cell
        newRow.querySelector('td:first-child').innerText = ++rowIndex;

        // Append the new row to the table body
        container.appendChild(newRow);
    });

    // Remove Row Click Event (using event delegation)
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-row')) {
            e.preventDefault();

            const row = e.target.closest('tr');
            const container = document.getElementById('itemTableBody');

            if (container.querySelectorAll('tr').length > 1) {
                row.remove();

                const rows = container.querySelectorAll('tr');
                rowIndex = rows.length;

                // Update row indices after removal
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').innerText = index + 1;
                });
            } else {
                alert("At least one row is required.");
            }
        }
    });

    // Example of adding a change event listener to dynamically added select elements
    document.addEventListener('change', function(e) {
        if (e.target && e.target.classList.contains('item_id')) {
            const selectedValue = e.target.value;
            const currentRow = e.target.closest('tr');

            // You can use selectedValue to make an AJAX call or manipulate the current row's inputs
            // Example:
            // fetchItemDetails(selectedValue, currentRow);

            console.log('Selected item ID:', selectedValue);
        }
    });

    // Sample function to handle item details fetching (AJAX could be used here)
    function fetchItemDetails(itemId, row) {
        // Perform your data fetching logic here, for example, using AJAX
        // Update the respective inputs in the 'row' with fetched data
    }
});

    </script>

    {{-- <script>
        $(document).ready(function() {
        function updateTotalAmount() {
            let total = 0;
            $('.item_amount').each(function() {
                let amount = parseFloat($(this).val());
                amount = isNaN(amount) ? 0 : amount;
                total += amount;
            });
            $('#item_totalAmount').val(total.toFixed(2)); 
            updateDiscounts(); // Update discount when total changes
        }

        function updateDiscounts() {
            let total = parseFloat($('#item_totalAmount').val());
            let discountPercentage = parseFloat($('.item_discount_percentage').val());
            let discountAmount = parseFloat($('.item_discount').val());

            discountPercentage = isNaN(discountPercentage) ? 0 : discountPercentage;
            discountAmount = isNaN(discountAmount) ? 0 : discountAmount;

            if ($(document.activeElement).attr('id') === 'item_discount_percentage') {
                discountAmount = (discountPercentage / 100) * total;
                $('#item_discount').val(discountAmount.toFixed(2));
            } else if ($(document.activeElement).attr('id') === 'discount') {
                discountPercentage = (discountAmount / total) * 100;
                $('#item_discount_percentage').val(discountPercentage.toFixed(2));
            }

            let totalAfterDiscount = total - discountAmount;
            $('#item_totalAfterDiscount').val(totalAfterDiscount.toFixed(2));
        }

        $('#itemTableBody').on('input', '.item_qty, .item_purchase', function() {
            var currentRow = $(this).closest('tr'); 
            var qty = parseFloat(currentRow.find('.item_qty').val()); 
            var price = parseFloat(currentRow.find('.item_purchase').val()); 

            qty = isNaN(qty) ? 0 : qty;
            price = isNaN(price) ? 0 : price;

            var amount = qty * price; 
            currentRow.find('.item_amount').val(amount.toFixed(2)); 

            updateTotalAmount(); 
        });

        $('#itemTableBody').on('input', '.item_amount', function() {
            updateTotalAmount();  
        });

        $('#itemTableBody').on('click', '.remove-row', function() {
            $(this).closest('tr').remove();  
            updateTotalAmount();  
        });

        $('#discount_percentage, #discount').on('input', function() {
            updateDiscounts();
        });
    });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            function updateTotalAmount() {
                let total = 0;
                $('.item_amount').each(function() {
                    let amount = parseFloat($(this).val());
                    amount = isNaN(amount) ? 0 : amount;
                    total += amount;
                });
                $('#item_totalAmount').val(total.toFixed(2)); 
            }
    
            function updateDiscount(currentRow) {
                let qty = parseFloat(currentRow.find('.item_qty').val());
                let price = parseFloat(currentRow.find('.item_purchase').val());
                let discountPercentage = parseFloat(currentRow.find('.item_discount_percentage').val());
                let discountAmount = parseFloat(currentRow.find('.item_discount').val());
    
                if (isNaN(qty) || qty === 0) {
                    alert('Please enter quantity before calculating discount.');
                    return;
                }
    
                price = isNaN(price) ? 0 : price;
                discountPercentage = isNaN(discountPercentage) ? 0 : discountPercentage;
                discountAmount = isNaN(discountAmount) ? 0 : discountAmount;
    
                let amount = qty * price;
                let discount = discountAmount || (amount * discountPercentage / 100);
    
                let finalAmount = amount - discount;
                currentRow.find('.item_amount').val(finalAmount.toFixed(2));
    
                updateTotalAmount();
            }
    
            $('#itemTableBody').on('input', '.item_qty, .item_purchase', function() {
                var currentRow = $(this).closest('tr');
                updateDiscount(currentRow);
            });
    
            $('#itemTableBody').on('input', '.item_discount_percentage, .item_discount', function() {
                var currentRow = $(this).closest('tr');
                updateDiscount(currentRow);
            });
    
            $('#itemTableBody').on('input', '.item_amount', function() {
                updateTotalAmount();  
            });
    
            $('#itemTableBody').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateTotalAmount();
            });
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            function updateTotalAmount() {
                let total = 0;
                $('.item_amount').each(function() {
                    let amount = parseFloat($(this).val());
                    amount = isNaN(amount) ? 0 : amount;
                    total += amount;
                });
                $('#item_totalAmount').val(total.toFixed(2));
            }
        
            function calculateDiscount() {
                $('#itemTableBody').find('tr').each(function() {
                    var row = $(this);
                    var qty = parseFloat(row.find('.item_qty').val());
                    var price = parseFloat(row.find('.item_purchase').val());
                    var amount = qty * price;
                    var discountPercentage = parseFloat(row.find('.item_discount_percentage').val());
                    var discountAmount = parseFloat(row.find('.item_discount').val());
        
                    if (isNaN(discountPercentage) && isNaN(discountAmount)) {
                        return; // No discount to apply
                    }
        
                    if (!isNaN(discountPercentage) && discountPercentage > 0) {
                        discountAmount = (amount * discountPercentage) / 100;
                        row.find('.item_discount').val(discountAmount.toFixed(2));
                    } else if (!isNaN(discountAmount) && discountAmount > 0) {
                        discountPercentage = (discountAmount / amount) * 100;
                        row.find('.item_discount_percentage').val(discountPercentage.toFixed(2));
                    }
        
                    // Update the amount after discount
                    var finalAmount = amount - discountAmount;
                    row.find('.item_amount').val(finalAmount.toFixed(2));
        
                    // Update the total amount
                    updateTotalAmount();
                });
            }
        
            $('#itemTableBody').on('input', '.item_qty, .item_purchase', function() {
                calculateDiscount();
            });
        
            $('#itemTableBody').on('input', '.item_discount_percentage, .item_discount', function() {
                calculateDiscount();
            });
        
            $('#itemTableBody').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateTotalAmount();
            });
        
            // Ensure discount calculation when discount percentage or amount is entered
            $('#itemTableBody').on('input', '.item_discount_percentage, .item_discount', function() {
                var row = $(this).closest('tr');
                var qty = parseFloat(row.find('.item_qty').val());
        
                if (isNaN(qty) || qty <= 0) {
                    alert("Please enter a quantity before calculating the discount.");
                    return;
                }
        
                calculateDiscount();
            });
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            function updateTotalAmount() {
                let total = 0;
                $('.item_amount').each(function() {
                    let amount = parseFloat($(this).val());
                    amount = isNaN(amount) ? 0 : amount;
                    total += amount;
                });
                $('#item_totalAmount').val(total.toFixed(2));
                updateBalance(); // Update balance whenever total amount changes
            }
        
            function updateBalance() {
                let totalAmount = parseFloat($('#item_totalAmount').val());
                let totalReceived = parseFloat($('#item_totalReceived').val());
        
                totalAmount = isNaN(totalAmount) ? 0 : totalAmount;
                totalReceived = isNaN(totalReceived) ? 0 : totalReceived;
        
                let balance = totalAmount - totalReceived;
                $('#item_totalBalance').val(balance.toFixed(2));
            }
        
            $('#itemTableBody').on('input', '.item_qty, .item_purchase', function() {
                var currentRow = $(this).closest('tr'); 
                var qty = parseFloat(currentRow.find('.item_qty').val()); 
                var price = parseFloat(currentRow.find('.item_purchase').val()); 
        
                qty = isNaN(qty) ? 0 : qty;
                price = isNaN(price) ? 0 : price;
        
                var amount = qty * price; 
                currentRow.find('.item_amount').val(amount.toFixed(2)); 
        
                updateTotalAmount(); 
            });
        
            $('#itemTableBody').on('input', '.item_amount', function() {
                updateTotalAmount();  
            });
        
            $('#item_totalReceived').on('input', function() {
                updateBalance();  
            });
        
            $('#itemTableBody').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();  
                updateTotalAmount();  
            });
        });
    </script> --}}

    {{-- working --}}
    {{-- <script>
        $(document).ready(function() {
            function updateTotalAmount() {
                let total = 0;
                $('.item_amount').each(function() {
                    let amount = parseFloat($(this).val());
                    amount = isNaN(amount) ? 0 : amount;
                    total += amount;
                });
                $('#item_totalAmount').val(total.toFixed(2));
                updateBalance(); // Update balance whenever total amount changes
            }
        
            function updateBalance() {
                let totalAmount = parseFloat($('#item_totalAmount').val());
                let totalReceived = parseFloat($('#item_totalReceived').val());
        
                totalAmount = isNaN(totalAmount) ? 0 : totalAmount;
                totalReceived = isNaN(totalReceived) ? 0 : totalReceived;
        
                if (totalReceived > totalAmount) {
                    // Ensure totalReceived does not exceed totalAmount
                    totalReceived = totalAmount;
                    $('#item_totalReceived').val(totalReceived.toFixed(2));
                }
        
                let balance = totalAmount - totalReceived; // Balance calculation
                $('#item_totalBalance').val(balance.toFixed(2));
            }
        
            $('#itemTableBody').on('input', '.item_qty, .item_purchase', function() {
                var currentRow = $(this).closest('tr'); 
                var qty = parseFloat(currentRow.find('.item_qty').val()); 
                var price = parseFloat(currentRow.find('.item_purchase').val()); 
        
                qty = isNaN(qty) ? 0 : qty;
                price = isNaN(price) ? 0 : price;
        
                var amount = qty * price; 
                currentRow.find('.item_amount').val(amount.toFixed(2)); 
        
                updateTotalAmount(); 
            });
        
            $('#itemTableBody').on('input', '.item_amount', function() {
                updateTotalAmount();  
            });
        
            $('#item_totalReceived').on('input', function() {
                updateBalance();  
            });
        
            $('#itemTableBody').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();  
                updateTotalAmount();  
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            function updateTotalAmount() {
                let total = 0;
                $('.item_amount').each(function() {
                    let amount = parseFloat($(this).val());
                    amount = isNaN(amount) ? 0 : amount;
                    total += amount;
                });
                $('#item_totalAmount').val(total.toFixed(2));
                updateBalance(); // Update balance whenever total amount changes
            }
        
            function updateBalance() {
                let totalAmount = parseFloat($('#item_totalAmount').val());
                let totalReceived = parseFloat($('#item_totalReceived').val());
        
                totalAmount = isNaN(totalAmount) ? 0 : totalAmount;
                totalReceived = isNaN(totalReceived) ? 0 : totalReceived;
        
                if (totalReceived > totalAmount) {
                    // Ensure totalReceived does not exceed totalAmount
                    alert("Cash Received is not exceed Total Amount. Total Amount :" + totalAmount );
                    totalReceived = 0;
                    $('#item_totalReceived').val(totalReceived.toFixed(2));
                }
        
                let balance = totalAmount - totalReceived; // Balance calculation
                $('#item_totalBalance').val(balance.toFixed(2));
            }
        
            function updateTax() {
                $('.item_tax').each(function() {
                    var currentRow = $(this).closest('tr');
                    var price = parseFloat(currentRow.find('.item_purchase').val()); 
                    var qty = parseFloat(currentRow.find('.item_qty').val());
                    var taxPercentage = parseFloat(currentRow.find('.item_tax_percentage').val());
        
                    price = isNaN(price) ? 0 : price;
                    qty = isNaN(qty) ? 0 : qty;
                    taxPercentage = isNaN(taxPercentage) ? 0 : taxPercentage;
        
                    var amount = qty * price;
                    var taxAmount = (amount * taxPercentage) / 100;
                    
                    currentRow.find('.item_amount').val(amount.toFixed(2));
                    currentRow.find('.item_tax').val(taxAmount.toFixed(2));
        
                    updateTotalAmount();
                });
            }
        
            $('#itemTableBody').on('input', '.item_qty, .item_purchase, .item_tax_percentage', function() {
                updateTax();
            });
        
            $('#item_totalReceived').on('input', function() {
                updateBalance();
            });
        
            $('#itemTableBody').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateTotalAmount();
            });
        });
    </script>
    @include('suadmin::layouts.footer')