<div class="position-relative overflow-hidden text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Welcome to Wings App</h1>
    <p class="lead font-weight-normal">Get your special product with special price.</p>
    <a class="btn btn-outline-primary" href="#product">Order Now</a>
  </div>
  <div class="product-device box-shadow d-none d-md-block"></div>
  <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
</div>

<div class="container">
  <div class="position-relative mt-5">
    <div class="text-center"  id="#product">
      <h3>Our Product</h3>
    </div>

    <div class="row">
      <?php foreach ($products as $product) { ?>
        <div class="col-sm-4 mt-3">
          <div class="card" style="width: 18rem;">
            <a href="<?= base_url() ?>index.php/product/product_details/<?= $product->product_code ?>">
              <img src="<?= base_url()."/".$product->images ?>" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h5><?= $product->product_name ?></h5>
              <p class="card-text"><?= $product->currency. " " . number_format($product->price) ?></p>
              <button class="btn btn-success" onclick="addCart('<?= $product->product_code ?>')">Add to Cart</button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
      
    </div>
  </div>
</div>