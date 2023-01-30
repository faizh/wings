<div class="container">
  <div class="position-relative mt-3">
    <div class="text-center mb-5">
      <h3>My Cart</h3>
    </div>

    <?php 
    $total_price = 0;
      foreach ($carts as $cart) {
        $sub_total      = $cart->price * $cart->qty;
        $total_price    += $sub_total; 
    ?>

      <div class="row mt-1">
        <div class="card mb-3 col-md-12 ">
          <div class="row no-gutters">
            <div class="col-md-4 text-center">
              <img src="<?= base_url() . '/' . $cart->images ?>" class="card-img" alt="..." style="width: 180px;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $cart->product_name ?></h5>
                <p class="card-text">Price <b> <?= $cart->currency .' '. number_format($cart->price) ?></b></p>
                <input type="hidden" name="price" id="price-<?= $cart->product_code ?>" value=<?= $cart->price ?>>
                <p class="card-text">
                  <label>Quantity</label>
                  <input type="number" class="form-control col-md-2" name="qty" product-code="<?= $cart->product_code ?>" value="<?= $cart->qty ?>" min="1" onchange="updateQty(this)">
                </p>
                <p class="card-text">
                  <label>Sub Total</label>
                  <input type="text" class="form-control col-md-4" name="sub_total" id="sub-total-<?= $cart->product_code ?>" value="<?= $cart->currency . " " . number_format($sub_total) ?>" disabled>
                </p>
                <button class="btn btn-sm mt-1 btn-danger" onclick="deleteCart(<?= $cart->cart_id ?>)">Hapus</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="row mt-1">
        <div class="card mb-3 col-md-12 ">
          <div class="row no-gutters">
            <div class="col-md-4 text-center">
              Total
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <input type="text" name="total" value="<?= 'IDR' . ' ' . number_format($total_price) ?>" class="form-control col-md-5" disabled>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-center m-2">
        <button onclick="checkout()" class="btn btn-success">Checkout</button>
      </div>
    </div>
  </div>
</div>