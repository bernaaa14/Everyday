$(document).ready(function() {
    checkFormValidity();

    $('input[name="paymentOption"]').change(function() {
        checkFormValidity();
    });

    $('#terms').change(function() {
        checkFormValidity();
    });

    function checkFormValidity() {
        const isPaymentSelected = $('input[name="paymentOption"]:checked').length > 0;
        const isTermsAccepted = $('#terms').is(':checked');
        $('#place-order-button').prop('disabled', !(isPaymentSelected && isTermsAccepted));
    }

    $('#place-order-button').click(function() {
        $('.modal').removeClass('hidden');
    });

    $('.close-button, .back-button').click(function() {
        $('.modal').addClass('hidden');
    });

    $('.continue-button').click(function() {
        $("#bookingForm").submit();
    });

    $('#cancel-button').click(function() {
        window.location.href = 'booking.php';
    });

    // Guest navigation
    $(document).ready(function() {
        $(".guest-nav a").click(function(e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(".guest-form").removeClass("active");
            $(target).addClass("active");
        });
    });

    // Initially display the first guest form
    $('.guest-form').first().addClass('active');
});
