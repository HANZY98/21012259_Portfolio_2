</div>
		<!-- /row -->
</div>
	<!-- /container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- custom script will be here -->
<script>
    $(document).ready(function() {
        // update quantity button listener
        $('.update-quantity-form').on('submit', function() {
            // get basic information for updating the cart
            var id = $(this).find('.product-id').val();
            var quantity = $(this).find('.cart-quantity').val();
            // redirect to update_quantity.php, with parameter values to process the request
            window.location.href = "update_quantity.php?id=" + id + "&amount=" + amount;
            return false;
        });
        // image hover js will be here
    });
</script>
</body>
</html>