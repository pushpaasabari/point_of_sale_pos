<div class="modal fade" id="modal-add-vendor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="add_vendor" id="add_vendor" class="form-horizontal" method="Post"
                    action="{{ url('suadmin/vendor.add') }}" enctype="multipart/form-data" autocomplete="on">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="item" class="col-sm-3 col-form-label pb-3">Name</label>
                            <label for="item" class="col-sm-1 col-form-label pb-3">:</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="vendor_name" id="vendor_name"
                                    placeholder="Name *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3 col-form-label pb-3">Mobile </label>
                            <label for="item" class="col-sm-1 col-form-label pb-3">:</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile"
                                    oninput="validateNumber(this)" maxlength="10" placeholder="Mobile *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3 col-form-label pb-3">GSTIN</label>
                            <label for="item" class="col-sm-1 col-form-label pb-3">:</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="vendor_gstin" id="vendor_gstin"
                                    placeholder="GSTIN" oninput="validateGSTNumber(this)" maxlength="15"
                                    pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3 col-form-label pb-3">Email</label>
                            <label for="item" class="col-sm-1 col-form-label pb-3">:</label>
                            <div class="col-sm-8 pb-3">
                                <input type="email" class="form-control" name="vendor_email" id="vendor_email"
                                    placeholder="E-Mail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3 col-form-label pb-3">Address</label>
                            <label for="item" class="col-sm-1 col-form-label pb-3">:</label>
                            <div class="col-sm-8 pb-3">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="vendor_address" id="vendor_address"
                                        placeholder="Enter Address..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                                <select name="item_secondary_unit" id="item_secondary_unit" class="form-control">
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
                                <select name="item_purchase_tax" id="item_purchase_tax" class="form-control" required>
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
                                <input type="text" class="form-control" name="item_sale_price" id="item_sale_price"
                                    placeholder="Item Sale Price *" required>
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
                                    <input type="file" class="custom-file-input" name="item_image" id="item_image"
                                        accept="image/*">
                                    <label class="custom-file-label" for="item_image">Item Image</label>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>