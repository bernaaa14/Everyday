$(document).ready(function() {

    // Toggle ticket details visibility
    $('.select-button').click(function() {
        $('.ticket-details').toggleClass('hidden');
    });

    // Handle date selection
    $('#select-date').change(function() {
        if ($(this).val()) {
            $('.ticket-table').removeClass('hidden');
            $('.total-amount').removeClass('hidden');
            $('.proceed-button').removeClass('hidden');
        } else {
            $('.ticket-table').addClass('hidden');
            $('.total-amount').addClass('hidden');
            $('.proceed-button').addClass('hidden');
        }
    });

    // Increment quantity
    $('.plus').click(function(e) {
        e.preventDefault();
        let quantity = $(this).siblings('.quantity');
        let newQuantity = parseInt(quantity.text()) + 1;
        quantity.text(newQuantity);
        updateTotals();
    });

    // Decrement quantity
    $('.minus').click(function(e) {
        e.preventDefault();
        let quantity = $(this).siblings('.quantity');
        let newQuantity = Math.max(0, parseInt(quantity.text()) - 1);
        quantity.text(newQuantity);
        updateTotals();
    });

    // Calculate and update totals
    function updateTotals() {
        let total = 0;
        $('.ticket-row').each(function() {
            let price = parseInt($(this).find('.ticket-price').text().replace('₱', ''));
            let quantity = parseInt($(this).find('.quantity').text());
            let rowTotal = price * quantity;
            $(this).find('.ticket-total').text('₱' + rowTotal);
            total += rowTotal;
        });
        $('.total-amount').text('Total: ₱' + total);
    }

    // Proceed button click handler
    $('.proceed-button').click(function() {
        $('#modal-date').text($('#select-date').val());
        let tickets = '';
        $('.ticket-row').each(function() {
            let name = $(this).find('.ticket-name').text().trim();
            let quantity = parseInt($(this).find('.quantity').text());
            if (quantity > 0) {
                tickets += quantity + ' ' + name + '\n';
            }
        });
        $('#modal-tickets').text(tickets);
        $('#modal-total').text($('.total-amount').text().replace('Total: ', ''));
        $('.modal').removeClass('hidden');
    });

    // Close modal
    $('.close-button, .back-button').click(function() {
        $('.modal').addClass('hidden');
    });

    // Continue button click handler
    $('.continue-button').click(function(e) {
        e.preventDefault();
        $('#select_date').val($('#select-date').val());
        $('#student_qty_input').val($('#student_qty').text());
        $('#kiddie_qty_input').val($('#kiddie_qty').text());
        $('#all_day_qty_input').val($('#all_day_qty').text());
        $('#senior_qty_input').val($('#senior_qty').text());

        let formData = $('#bookingForm').serialize();
        console.log("Form data before submission:", formData);

        if (loggedIn) {
            $('#bookingForm').submit();
        }
    });

});
