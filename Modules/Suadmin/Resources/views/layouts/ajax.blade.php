{{-- <script>
    $(document).ready(function () {
        $(document).on('click','.studentedit',function(){
            var stud_id =  $(this).data('stud_id');//$(this).val();
            // alert(stud_id);
            $('#studentedit').modal('show');

            $.ajax({
                url: "{{url('get_student')}}",
                type: "POST",
                data: {
                    id: stud_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    $('#student_name_edit').val(response.student.name);
                    $('#stud_id').val(stud_id);
                    $('#subject_edit').val(response.student.subject);
                    $('#mark_edit').val(response.student.mark);
                }
            });
    });
});      
</script> --}}

<!--Vendor Details AJAX Purchase Page -->
<script>
    $(document).ready(function () {
        $('#vendor_id').on('change', function () {
            var vendor_sno = this.value;
            // alert(vendor_sno);

            $("#vendor_mobile").html('');
            $.ajax({
                url: "{{url('suadmin/purchase.fetch_vendor_details')}}",
                type: "POST",
                data: {
                    vendor_sno: vendor_sno,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) {
                    // console.log(response.vendor.vendor_gstin);
                    $('#vendor_mobile').val(response.vendor.vendor_mobile);
                    $('#vendor_name').val(response.vendor.vendor_name);
                    $('#vendor_gstin').val(response.vendor.vendor_gstin);
                    $('#vendor_address').val(response.vendor.vendor_address);
                }
            });
        });
    });
</script>
<!--Item Details AJAX Purchase Page -->
{{-- <script>
    $(document).ready(function () {
        $('.item_id').on('change', function () {
            var item_sno = this.value;
            alert(item_sno);

            $("#item_tax").html('');
            $.ajax({
                url: "{{url('suadmin/purchase.fetch_item_details')}}",
                type: "POST",
                data: {
                    item_sno: item_sno,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    // console.log(response.vendor.vendor_gstin);
                    $('.item_hsn').val(response.item.item_hsn);
                    $('.item_mrp').val(response.item.item_mrp);
                    $('.item_tax').val(response.item.item_tax);
                    $('.item_purchase').val(response.item.item_purchase_price);
                    // $('#vendor_gstin').val(response.vendor.vendor_gstin);
                }
            });
        });
    });
</script> --}}

<script>
    $(document).ready(function () {
            $('#itemTableBody').on('change', '.item_id', function () {
            var item_sno = this.value;
            var currentRow = $(this).closest('tr');

            $.ajax({
                url: "{{url('suadmin/purchase.fetch_item_details')}}",
                type: "POST",
                data: {
                    item_sno: item_sno,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) {
                    currentRow.find('.item_hsn').val(response.item.item_hsn);
                    currentRow.find('.item_mrp').val(response.item.item_mrp);
                    currentRow.find('.item_purchase').val(response.item.item_purchase_price);
                    currentRow.find('.item_total_amount').val(response.item.item_purchase_price);
                    currentRow.find('.item_name').val(response.item.item_name);
                    currentRow.find('.item_tax_percentage').val(response.item.item_tax);
                }
            });
        });
    });
</script>