<div class="container">
  <div class="position-relative mt-3">
    <div class="text-center">
      <h3>Product Details</h3>
    </div>

    <div class="row mt-5">
      <div class="col-md-6">
        <img src="<?= base_url() .''. $data_product->images ?>" style="width: 400px;">
      </div>

      <div class="col-md-6">
        <h4><?= $data_product->product_name ?></h4>
        <b><span><?= $data_product->currency ?> <?= number_format($data_product->price) ?></span></b><br />
        <span>Dimension : <?= $data_product->dimension ?></span><br />
        <span>Price Unit : <?= $data_product->unit ?></span><br />

        <button class="btn btn-success mt-2" onclick="addCart('<?= $data_product->product_code ?>')">Add to Cart</button>
      </div>
    </div>
  </div>
</div>