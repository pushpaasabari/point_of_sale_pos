<!--Customer Details AJAX Purchase Page -->
<script>
    $(document).ready(function () {
        $('#customer_id').on('change', function () {
            var customer_sno = this.value;
            // alert(customer_sno);

            $("#vendor_mobile").html('');
            $.ajax({
                url: "{{url('suadmin/sale.fetch_customer_details')}}",
                type: "POST",
                data: {
                    customer_sno: customer_sno,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response.customer.customer_gstin);
                    $('#customer_mobile').val(response.customer.customer_mobile);
                    $('#customer_name').val(response.customer.customer_name);
                    $('#customer_gstin').val(response.customer.customer_gstin);
                    $('#customer_address').val(response.customer.customer_address);
                }
            });
        });
    });
</script>
<!--Item Details AJAX Purchase Page -->
<script>
    $(document).ready(function () {
            $('#itemTableBody').on('change', '.item_id', function () {
            var item_sno = this.value;
            var currentRow = $(this).closest('tr');

            $.ajax({
                url: "{{url('suadmin/sale.fetch_item_details')}}",
                type: "POST",
                data: {
                    item_sno: item_sno,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) {
                    currentRow.find('.item_hsn').val(response.item.item_hsn);
                    currentRow.find('.item_mrp').val(response.item.item_mrp);
                    currentRow.find('.item_sale').val(response.item.item_sale_price);
                    currentRow.find('.item_total_amount').val(response.item.item_purchase_price);
                    currentRow.find('.item_name').val(response.item.item_name);
                    currentRow.find('.item_name').val(response.item.item_name);
                    currentRow.find('.item_stock').val(response.item.item_stock);
                    currentRow.find('.item_tax_percentage').val(response.item.item_tax);
                }
            });
        });
    });
</script>