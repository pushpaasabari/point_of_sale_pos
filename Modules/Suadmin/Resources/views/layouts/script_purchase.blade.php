<!--Today date -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('purchase_date').setAttribute('value', today);
  });
</script>
{{-- Remove any non-numeric characters --}}
<script>
    function validateNumber(input) 
    {
        // Remove any non-numeric characters
        input.value = input.value.replace(/[^0-9\.]/g, '');

        // Retrieve the min and max values from the data attributes
        const min = parseInt(input.getAttribute('data-min'), 10);
        const max = parseInt(input.getAttribute('data-max'), 10);

        // Enforce min and max values
        if (input.value !== '') 
        {
            let value = parseInt(input.value);
            if (value > max) 
            {
                alert(`The maximum allowed number is ${max}.`);
                input.value = 0; // Set the value to 0 after the alert
            } 
            else if (value < min) 
            {
                input.value = min;
            }
        }
    }
</script>
<script>
    function validateGSTNumber(input) {
    // Convert input to uppercase to match GST format
    input.value = input.value.toUpperCase().replace(/[^0-9A-Z\.]/g, '');

    // Regular expression to validate GST number
    const gstRegex = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[A-Z0-9]{1}[Z]{1}[A-Z0-9]{1}$/;

    // Validate only when the input length is exactly 15 characters
    if (input.value.length === 15) {
        if (!gstRegex.test(input.value)) {
            alert('Invalid GST number format.');
            input.value = ''; // Clear the input field after the alert
        }
    } else if (input.value.length > 15) {
        alert('GST number should be exactly 15 characters.');
        input.value = ''; // Clear the input field if the length exceeds 15 characters
    }
}
</script>
{{-- Input Uppercase --}}
<script>
    document.getElementById('purchase_bill').addEventListener('input', function() {
    this.value = this.value.toUpperCase().replace(/[^A-Z0-9\/\-_]/g, '');
    });
</script>
{{-- Add/Delete Row --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let rowIndex = document.querySelectorAll('#itemTableBody tr').length;

        // Add Row Button Click Event
        document.querySelector('#addRowButton').addEventListener('click', function (e) {
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
        document.addEventListener('click', function (e) {
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
        document.addEventListener('change', function (e) {
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
<!-- Core Calculation -->
{{-- <script>
    $(document).ready(function () {
    // Function to calculate row total, discount, and tax
    function calculateRow(row) {
        let qty = parseFloat($(row).find('.item_qty').val()) || 0;
        let price = parseFloat($(row).find('.item_purchase').val()) || 0;
        let discountPercentage = parseFloat($(row).find('.item_discount_percentage').val()) || 0;
        let discountAmount = parseFloat($(row).find('.item_discount').val()) || 0;

        // Reset discount percentage and amount when quantity changes
        if ($(row).find('.item_qty').is(':focus')) {
            $(row).find('.item_discount_percentage').val('');
            $(row).find('.item_discount').val('');
            discountPercentage = 0;
            discountAmount = 0;
        }

        // Ensure discount percentage is between 0 and 100
        if (discountPercentage < 0 || discountPercentage > 100) {
            alert("Discount percentage must be between 0 and 100.");
            $(row).find('.item_discount_percentage').val('');
            $(row).find('.item_discount').val('');
            return;
        }

        // Calculate discount amount or percentage based on input
        if ($(row).find('.item_discount_percentage').is(':focus')) {
            if (qty <= 0) {
                alert("Please enter a valid quantity before applying a discount.");
                $(row).find('.item_discount_percentage').val('');
                $(row).find('.item_discount').val('');
                return;
            } else if (discountPercentage > 0) {
                discountAmount = (price * qty * discountPercentage) / 100;
                if (discountAmount > price * qty) {
                    alert("Discount amount cannot exceed the total price.");
                    discountAmount = price * qty;
                    $(row).find('.item_discount_percentage').val((discountAmount / (price * qty) * 100).toFixed(2));
                }
                $(row).find('.item_discount').val(discountAmount.toFixed(2));
            } else if (discountPercentage === 0 || isNaN(discountPercentage)) {
                $(row).find('.item_discount').val('');  // Clear discount amount if discount percentage is empty
            }
        } else if ($(row).find('.item_discount').is(':focus')) {
            if (qty <= 0) {
                alert("Please enter a valid quantity before applying a discount.");
                $(row).find('.item_discount_percentage').val('');
                $(row).find('.item_discount').val('');
                return;
            } else {
                if (discountAmount > price * qty) {
                    alert("Discount amount cannot exceed the total price.");
                    $(row).find('.item_discount').val('');
                    $(row).find('.item_discount_percentage').val('');
                    return;
                }
                discountPercentage = (discountAmount / (price * qty)) * 100;
                $(row).find('.item_discount_percentage').val(discountPercentage.toFixed(2));
            }
        }

        // Calculate the taxable amount
        let taxableAmount = price * qty - discountAmount;
        let taxPercentage = parseFloat($(row).find('.item_tax_percentage').val()) || 0;
        let taxAmount = (taxableAmount * taxPercentage) / 100;
        let totalTaxAmount = taxAmount;

        // Update the tax and amount fields
        $(row).find('.item_tax').val(totalTaxAmount.toFixed(2));
        $(row).find('.item_amount').val(taxableAmount.toFixed(2));

        // Calculate the overall total
        calculateTotal();
    }

    // Function to calculate the overall total
    function calculateTotal() {
        let totalAmount = 0;
        let totalDiscountAmount = 0;
        let item_totalTaxAmount = 0;
        let totalQty = 0;

        $('.item_amount').each(function () {
            let amount = parseFloat($(this).val()) || 0;
            totalAmount += amount;
        });
        $('#item_totalAmount').val(totalAmount.toFixed(2));

        $('.item_discount').each(function () {
            let discountAmount = parseFloat($(this).val()) || 0;
            totalDiscountAmount += discountAmount;
        });
        $('#item_totalDiscountAmount').val(totalDiscountAmount.toFixed(2));

        $('.item_tax').each(function () {
            let totalTaxAmount = parseFloat($(this).val()) || 0;
            item_totalTaxAmount += totalTaxAmount;
        });
        $('#item_totalTaxAmount').val(item_totalTaxAmount.toFixed(2));

        $('.item_qty').each(function () {
            let qty = parseFloat($(this).val()) || 0;
            totalQty += qty;               
        });
        $('#totalQty').val(totalQty);

        let cashReceived = parseFloat($('#item_totalReceived').val()) || 0;
        if (totalAmount < cashReceived) {
            alert("Cash Received cannot exceed the Total Amount. Total Amount: " + totalAmount);
            $('#item_totalReceived').val('');
            $('#item_totalBalance').val(totalAmount.toFixed(2));
            return;
        } else {
            let balance = Math.ceil(totalAmount - cashReceived);
            $('#item_totalBalance').val(balance.toFixed(2));
        }
    }

    // Event listeners for input changes
    $('#itemTableBody').on('input', '.item_qty, .item_purchase, .item_discount, .item_discount_percentage', function () {
        let row = $(this).closest('tr');
        calculateRow(row);
    });

    // Event listener for cash received
    $('#item_totalReceived').on('input', function () {
        calculateTotal();
    });

    // Initial calculation
    $('#itemTableBody tr').each(function () {
        calculateRow(this);
    });
});
</script> --}}

<script>
    $(document).ready(function () {
        // Function to calculate row total, discount, and tax
        function calculateRow(row) {
            let qty = parseFloat($(row).find('.item_qty').val()) || 0;
            let price = parseFloat($(row).find('.item_purchase').val()) || 0;
            let discountPercentage = parseFloat($(row).find('.item_discount_percentage').val()) || 0;
            let discountAmount = parseFloat($(row).find('.item_discount').val()) || 0;
    
            // Ensure discount percentage is between 0 and 100
            if (discountPercentage < 0 || discountPercentage > 100) {
                alert("Discount percentage must be between 0 and 100.");
                $(row).find('.item_discount_percentage').val('');
                $(row).find('.item_discount').val('');
                return;
            }
    
            // Reset discount percentage and amount when quantity or price changes
            if ($(row).find('.item_qty').is(':focus') || $(row).find('.item_purchase').is(':focus')) {
                $(row).find('.item_discount_percentage').val('');
                $(row).find('.item_discount').val('');
                discountPercentage = 0;
                discountAmount = 0;
            }
    
            // Calculate discount amount or percentage based on input
            if ($(row).find('.item_discount_percentage').is(':focus')) {
                if (qty <= 0) {
                    alert("Please enter a valid quantity before applying a discount.");
                    $(row).find('.item_discount_percentage').val('');
                    $(row).find('.item_discount').val('');
                    return;
                } else if (discountPercentage > 0) {
                    discountAmount = (price * qty * discountPercentage) / 100;
                    if (discountAmount > price * qty) {
                        alert("Discount amount cannot exceed the total price.");
                        discountAmount = price * qty;
                        $(row).find('.item_discount_percentage').val((discountAmount / (price * qty) * 100).toFixed(2));
                    }
                    $(row).find('.item_discount').val(discountAmount.toFixed(2));
                } else if (discountPercentage === 0 || isNaN(discountPercentage)) {
                    $(row).find('.item_discount').val('');  // Clear discount amount if discount percentage is empty
                }
            } else if ($(row).find('.item_discount').is(':focus')) {
                if (qty <= 0) {
                    alert("Please enter a valid quantity before applying a discount.");
                    $(row).find('.item_discount_percentage').val('');
                    $(row).find('.item_discount').val('');
                    return;
                } else {
                    if (discountAmount > price * qty) {
                        alert("Discount amount cannot exceed the total price.");
                        $(row).find('.item_discount').val('');
                        $(row).find('.item_discount_percentage').val('');
                        return;
                    }
                    discountPercentage = (discountAmount / (price * qty)) * 100;
                    $(row).find('.item_discount_percentage').val(discountPercentage.toFixed(2));
                }
            }
    
            // Recalculate discount if price changes
            if ($(row).find('.item_purchase').is(':focus')) {
                if (discountPercentage > 0) {
                    discountAmount = (price * qty * discountPercentage) / 100;
                    $(row).find('.item_discount').val(discountAmount.toFixed(2));
                }
            }
    
            // Calculate the taxable amount
            let taxableAmount = price * qty - discountAmount;
            let taxPercentage = parseFloat($(row).find('.item_tax_percentage').val()) || 0;
            let taxAmount = (taxableAmount * taxPercentage) / 100;
            let totalTaxAmount = taxAmount;
    
            // Update the tax and amount fields
            $(row).find('.item_tax').val(totalTaxAmount.toFixed(2));
            $(row).find('.item_amount').val(taxableAmount.toFixed(2));
    
            // Calculate the overall total
            calculateTotal();
        }
    
        // Function to calculate the overall total
        function calculateTotal() {
            let totalAmount = 0;
            let totalDiscountAmount = 0;
            let item_totalTaxAmount = 0;
            let totalQty = 0;
    
            $('.item_amount').each(function () {
                let amount = parseFloat($(this).val()) || 0;
                totalAmount += amount;
            });
            $('#item_totalAmount').val(totalAmount.toFixed(2));
    
            $('.item_discount').each(function () {
                let discountAmount = parseFloat($(this).val()) || 0;
                totalDiscountAmount += discountAmount;
            });
            $('#item_totalDiscountAmount').val(totalDiscountAmount.toFixed(2));
    
            $('.item_tax').each(function () {
                let totalTaxAmount = parseFloat($(this).val()) || 0;
                item_totalTaxAmount += totalTaxAmount;
            });
            $('#item_totalTaxAmount').val(item_totalTaxAmount.toFixed(2));
    
            $('.item_qty').each(function () {
                let qty = parseFloat($(this).val()) || 0;
                totalQty += qty;               
            });
            $('#totalQty').val(totalQty);
    
            let cashReceived = parseFloat($('#item_totalReceived').val()) || 0;
            if (totalAmount < cashReceived) {
                alert("Cash Received cannot exceed the Total Amount. Total Amount: " + totalAmount);
                $('#item_totalReceived').val('');
                $('#item_totalBalance').val(totalAmount.toFixed(2));
                return;
            } else {
                let balance = Math.ceil(totalAmount - cashReceived);
                $('#item_totalBalance').val(balance.toFixed(2));
            }
        }
    
        // Event listeners for input changes
        $('#itemTableBody').on('input', '.item_qty, .item_purchase, .item_discount, .item_discount_percentage', function () {
            let row = $(this).closest('tr');
            calculateRow(row);
        });
    
        // Event listener for cash received
        $('#item_totalReceived').on('input', function () {
            calculateTotal();
        });
    
        // Initial calculation
        $('#itemTableBody tr').each(function () {
            calculateRow(this);
        });
    });
</script>


<script>
    $(document).ready(function () {
    // Prevent Enter key from adding a new row
    $('#add_purchase').on('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent the default action
            return false; // Return false to stop further propagation
        }
    });

    // Existing code for adding rows and other functionalities
    $('#addRowButton').on('click', function (event) {
        event.preventDefault();
        // Your code to add a new row
        });
    });
</script>