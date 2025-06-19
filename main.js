// Document Ready
$(document).ready(function() {
    
    // Currency Formatter (ZAR)
    function formatZAR(amount) {
        return "R " + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    // Update all prices on page
    $('.price').each(function() {
        const rawPrice = parseFloat($(this).data('price'));
        $(this).text(formatZAR(rawPrice));
    });

    // Cart Functionality
    $('.add-to-cart').click(function() {
        const productId = $(this).data('id');
        alert(`Added product ${productId} to cart!`);
    });

    // Mobile Menu Toggle
    $('.navbar-toggler').click(function() {
        $('.navbar-collapse').toggleClass('show');
    });
});