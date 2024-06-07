$(document).ready(function() {
    $('.select-button').click(function() {
        $('.ticket-details').toggleClass('hidden');
    });

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

    $('.plus').click(function(e) {
        e.preventDefault(); // Prevent form submission
        let quantity = $(this).siblings('.quantity');
        let newQuantity = parseInt(quantity.text()) + 1;
        quantity.text(newQuantity);
        updateTotals();
    });

    $('.minus').click(function(e) {
        e.preventDefault(); // Prevent form submission
        let quantity = $(this).siblings('.quantity');
        let newQuantity = Math.max(0, parseInt(quantity.text()) - 1);
        quantity.text(newQuantity);
        updateTotals();
    });

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

    $('.proceed-button').click(function() {
        $('#modal-date').text($('#select-date').val());
        let tickets = '';
        $('.ticket-row').each(function() {
            let name = $(this).find('.ticket-name').text();
            let quantity = $(this).find('.quantity').text();
            if (quantity > 0) {
                tickets += quantity + ' ' + name + '<br>';
            }
        });
        $('#modal-tickets').html(tickets);
        $('#modal-total').text($('.total-amount').text().replace('Total: ', ''));
        $('.modal').removeClass('hidden');
    });

    $('.close-button, .back-button').click(function() {
        $('.modal').addClass('hidden');
    });

    $('.continue-button').click(function() {
        if (!loggedIn) {
            window.location.href = 'login.php';
        } else {
            $('#bookingForm').submit(); 
        }
    });
});
