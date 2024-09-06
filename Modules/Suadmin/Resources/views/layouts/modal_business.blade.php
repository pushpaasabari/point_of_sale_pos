<div class="modal fade" id="modal-edit-business-basic">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Business Basic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="edit_business" id="edit_business" class="form-horizontal" method="Post"
                    action="{{ url('suadmin/business.edit') }}" enctype="multipart/form-data" autocomplete="on">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="business_name" class="col-sm-3 col-form-label pb-3">Name :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_name" id="business_name"
                                    placeholder="Name *" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_gstin" class="col-sm-3 col-form-label pb-3">GSTIN :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_gstin" id="business_gstin"
                                    placeholder="GSTIN" oninput="validateGSTNumber(this)" maxlength="15"
                                    pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="business_cin" class="col-sm-3 col-form-label pb-3">CIN :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_cin" id="business_cin"
                                    oninput="validateNumber(this)" maxlength="10" placeholder="CIN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="business_mobile" class="col-sm-3 col-form-label pb-3">Mobile :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_mobile" id="business_mobile"
                                    oninput="validateNumber(this)" maxlength="10" placeholder="Mobile *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="business_email" class="col-sm-3 col-form-label pb-3">Email :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="email" class="form-control" name="business_email" id="business_email"
                                    placeholder="E-Mail">
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
<div class="modal fade" id="modal-edit-business-address">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Business Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="edit_business_address" id="edit_business_address" class="form-horizontal" method="Post"
                    action="{{ url('suadmin/business.edit_address') }}" enctype="multipart/form-data" autocomplete="on">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="business_street" class="col-sm-3 col-form-label pb-3">No & Street :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_street" id="business_street"
                                    placeholder="Street *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="business_landmark" class="col-sm-3 col-form-label pb-3">Landmark :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_landmark" id="business_landmark"
                                    placeholder="Landmark *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="business_city" class="col-sm-3 col-form-label pb-3">City :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_city" id="business_city"
                                    placeholder="City *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="business_pincode" class="col-sm-3 col-form-label pb-3">Pincode :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_pincode" id="business_pincode"
                                    placeholder="Pincode *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="business_country" class="col-sm-3 col-form-label pb-3">Country :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="business_country" id="business_country"
                                    placeholder="Country *" required>
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
<div class="modal fade" id="modal-edit-business-default-prefix">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Business Default Prefix</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="edit_business_default_prefix" id="edit_business_default_prefix" class="form-horizontal"
                    method="Post" action="{{ url('suadmin/business.edit_default') }}" enctype="multipart/form-data"
                    autocomplete="on">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="prefix_invoice" class="col-sm-4 col-form-label pb-3">Invoice :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="prefix_invoice" id="prefix_invoice"
                                    placeholder="Invoice *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prefix_estmate" class="col-sm-4 col-form-label pb-3">Estimate :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="prefix_estmate" id="prefix_estmate"
                                    placeholder="Estimate *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prefix_paymentIn" class="col-sm-4 col-form-label pb-3">Payment In :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="prefix_paymentIn" id="prefix_paymentIn"
                                    placeholder="Payment In *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prefix_paymentOut" class="col-sm-4 col-form-label pb-3">Payment Out :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="prefix_paymentOut" id="prefix_paymentOut"
                                    placeholder="Payment Out *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prefix_creditNote" class="col-sm-4 col-form-label pb-3">Credit Note :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="prefix_creditNote" id="prefix_creditNote"
                                    placeholder="Credit Note *" required>
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