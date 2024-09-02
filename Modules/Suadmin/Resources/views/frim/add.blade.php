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



                    {{-- <div class="form-container">
                        <div class="form-header">Edit Firm</div>

                        <div class="form-row">
                            <div class="logo-placeholder">
                                Add Logo
                            </div>
                            <div style="flex: 2;">
                                <div class="form-group">
                                    <label for="business-name">Business Name *</label>
                                    <input type="text" id="business-name" placeholder="Enter business name" required>
                                </div>
                                <div class="form-group">
                                    <label for="gstin">GSTIN</label>
                                    <input type="text" id="gstin" placeholder="Enter GSTIN">
                                    <a href="#" style="font-size: 12px; color: #007bff;">Get GST registration at
                                        exclusive prices!</a>
                                </div>
                                <div class="form-group form-row">
                                    <div class="form-group">
                                        <label for="phone">Phone No.</label>
                                        <input type="text" id="phone" maxlength="30" placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email ID</label>
                                        <input type="email" id="email" placeholder="Enter email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-header" style="font-size: 18px; margin-top: 20px;">Business Details</div>
                        <div class="form-group">
                            <label for="address">Business Address</label>
                            <textarea id="address" placeholder="Enter business address" rows="3"></textarea>
                        </div>
                        <div class="form-group form-row">
                            <div class="form-group">
                                <label for="pincode">Pincode</label>
                                <input type="text" id="pincode" placeholder="Enter pincode">
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select id="state">
                                    <option value="none">None</option>
                                    <!-- Add more states here -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="form-group">
                                <label for="business-type">Business Type</label>
                                <select id="business-type">
                                    <option value="none">None</option>
                                    <!-- Add more business types here -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Business Category</label>
                                <input type="text" id="category" placeholder="Enter business category">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Business Description</label>
                            <textarea id="description" placeholder="Enter business description" rows="3"></textarea>
                        </div>
                        <div class="add-signature">
                            Add Signature
                        </div>

                        <button type="submit" class="btn-save">Save</button>
                    </div> --}}


                </div>
            </section>
        </div>
        @include('suadmin::layouts.footer')
    </div>
    @include('suadmin::layouts.jslinks')
    @include('suadmin::layouts.ajax')
</body>

</html>