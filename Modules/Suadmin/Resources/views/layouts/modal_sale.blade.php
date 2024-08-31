<div class="modal fade" id="modal-add-customer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="add_customer_modal" id="add_customer_modal" class="form-horizontal" method="Post"
                    action="{{ url('suadmin/customer.add_modal') }}" enctype="multipart/form-data" autocomplete="on">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="item" class="col-sm-4 col-form-label pb-3">Name :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="customer_name" id="customer_name"
                                    placeholder="Name *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-4 col-form-label pb-3">Mobile :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="customer_mobile" id="customer_mobile"
                                    placeholder="Mobile *" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-4 col-form-label pb-3">GSTIN :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="text" class="form-control" name="customer_gstin" id="customer_gstin"
                                    placeholder="GSTIN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-4 col-form-label pb-3">Email :</label>
                            <div class="col-sm-8 pb-3">
                                <input type="email" class="form-control" name="customer_email" id="customer_email"
                                    placeholder="E-Mail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-4 col-form-label pb-3">Address :</label>
                            <div class="col-sm-8 pb-3">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="customer_address"
                                        id="customer_address" placeholder="Enter Address..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                {{-- <button type="submit" class="btn btn-info float-right">Save</button> --}}
            </div>
            </form>
        </div>
    </div>
</div>