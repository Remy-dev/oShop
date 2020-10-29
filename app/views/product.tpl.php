
<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active"><?= $category->name() ?></li>
      </ol>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <a href="detail.html" class="product-hover-overlay-link">
              <img src="<?= $product->picture() ?>" alt="product" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
            <h3 class="h3 text-uppercase mb-1"><?= $product->name() ?></h3>
            <div class="text-muted">by <em><?= $brand->name() ?></em></div>
            <div>
                
            <?php for($i=0; $i<$product->rate(); $i++){

                echo '<i class="fa fa-star"></i>';
            }
            $rate = 5 - $product->rate();
            if ($rate != 0)
            {
                for ($i=0; $i<$rate; $i++)
                {
                    echo '<i class="fa fa-star-o"></i>';
                }
            }
            ?>
              
              <!--<i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i> -->
              
            </div>
          </div>
          <div class="my-2">
            <div class="text-muted"><span class="h4"><?= $product->price() .' €'?></span> TTC</div>
          </div>
          <div class="product-action-buttons">
            <form action="" method="post">
              <input type="hidden" name="productId" value="<?= $product->id() ?>">
              <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
            </form>
          </div>
          <div class="mt-5">
            <p>
              <?= $product->description() ?>
            </p>
          </div>
        </div>
        <!-- /product-->
      </div>
      
    </div>
  </section>