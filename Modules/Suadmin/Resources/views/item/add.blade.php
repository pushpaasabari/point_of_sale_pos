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
            <div class="container">
                <div class="mt-0 pb-1">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Item</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form name="item_add" id="item_add" class="form-horizontal" method="Post"
                            action="{{ url('suadmin/item.add') }}" enctype="multipart/form-data" autocomplete="on">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="item" class="col-sm-2 col-form-label pb-3">Name</label>
                                    <div class="col-sm-3 pb-3">
                                        <input type="text" class="form-control" name="item_name" id="item_name"
                                            placeholder="Item Name *" required>
                                    </div>
                                    <div class="col-sm-3 pb-3">
                                        <input type="text" class="form-control" name="item_hsn" id="item_hsn"
                                            placeholder="Item HSN">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label pb-3">Category</label>
                                    <div class="col-sm-3 pb-3">
                                        <select name="item_category" id="item_category" class="form-control" required>
                                            <option>Category</option>
                                            <option value="Camera">Camera</option>
                                            <option value="HDD">Hard disk</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 pb-4">
                                        <input type="text" class="form-control" name="item_code" id="item_code"
                                            placeholder="Item Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label pb-3">Description</label>
                                    <div class="col-sm-6 pb-3">
                                        <input type="text" class="form-control" name="item_desc" id="item_desc"
                                            placeholder="Item Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="item" class="col-sm-2 col-form-label pb-3">Unit</label>
                                    <div class="col-sm-2 pb-3">
                                        <select name="item_base_unit" id="item_base_unit" class="form-control" required>
                                            <option>None</option>
                                            <option value="Nos">Nos</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 pb-3">
                                        <select name="item_secondary_unit" id="item_secondary_unit"
                                            class="form-control">
                                            <option>None</option>
                                            <option value="Nos">Nos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="item" class="col-sm-2 col-form-label pb-3">Taxes</label>
                                    <div class="col-sm-2 pb-3">
                                        <select name="item_tax" id="item_tax" class="form-control" required>
                                            <option>None</option>
                                            <option value="0">0 %</option>
                                            <option value="3">3 %</option>
                                            <option value="5">5 %</option>
                                            <option value="12">12 %</option>
                                            <option value="18">18 %</option>
                                            <option value="28">28 %</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="item" class="col-sm-2 col-form-label pb-3">Purchase</label>
                                    <div class="col-sm-2 pb-3">
                                        <input type="text" class="form-control" name="item_purchase_price"
                                            id="item_purchase_price" placeholder="Item Purchase Price *" required>
                                    </div>
                                    <div class="col-sm-2 pb-3">
                                        <select name="item_purchase_tax" id="item_purchase_tax" class="form-control"
                                            required>
                                            <option value="with tax">With Tax</option>
                                            <option value="without tax">Without Tax</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 pb-3">
                                        <input type="text" class="form-control" name="item_mrp" id="item_mrp"
                                            placeholder="Item MRP ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="item" class="col-sm-2 col-form-label pb-3">Sale</label>
                                    <div class="col-sm-2 pb-3">
                                        <input type="text" class="form-control" name="item_sale_price"
                                            id="item_sale_price" placeholder="Item Sale Price *" required>
                                    </div>
                                    <div class="col-sm-2 pb-3">
                                        <select name="item_sale_tax" id="item_sale_tax" class="form-control" required>
                                            <option value="with tax">With Tax</option>
                                            <option value="without tax">Without Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="item_image" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-3 pb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="item_image"
                                                id="item_image" accept="image/*">
                                            <label class="custom-file-label" for="item_image">Item Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('suadmin::layouts.footer')
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax')

</body>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
      $('#item_image').on('change', function() {
            var file = this.files[0];
            var fileType = file.type;
            var validFileTypes = ['image/jpeg', 'image/png'];
            
            if (!validFileTypes.includes(fileType)) {
                alert('Only JPG and PNG files are allowed.');
                $(this).val(''); // Clear the input
                $('.custom-file-label').text('Choose file');
            } else {
                // Show the selected file name
                $('.custom-file-label').text(file.name);
            }
        });
    });
</script>

</html>