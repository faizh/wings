<footer>
    <div class="container footer pt-5 pb-2 text-center">
        <span>Copyright - Faiz Hermawan - 2023</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        function addCart(product_code) {
            $.ajax({
              data: {
                product_code: product_code
              },
              type: "POST",
              dataType: `json`,
              url: '<?= base_url().'index.php/cart/add_to_cart' ?>',
              cache: false,
              success: function(data){
                alert(data.message);
              }
            });
        }

        function updateQty(qty) {
            var update_qty      = qty.value;
            var product_code    = qty.getAttribute('product-code');
            var product_price   = document.getElementById('price-'+product_code).value;
            var update_price    = update_qty * product_price;

            document.getElementById('sub-total-'+product_code).value = "IDR " + update_price;
        }

        function deleteCart(cart_id) {
            $.ajax({
              data: {
                cart_id: cart_id
              },
              type: "POST",
              dataType: `json`,
              url: '<?= base_url().'index.php/cart/delete_cart' ?>',
              cache: false,
              success: function(data){
                alert(data.message);
                window.location.reload();
              }
            });
        }

        function checkout(argument) {
            $.ajax({
              type: "POST",
              dataType: `json`,
              url: '<?= base_url().'index.php/cart/checkout' ?>',
              cache: false,
              success: function(data){
                alert(data.message);
                window.location.reload();
              }
            });
        }
    </script>
</body>
</html>