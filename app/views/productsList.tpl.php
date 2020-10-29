<?php if (!empty($theme)): ?>
<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active"><?= $theme[0]->name() ?></li>
      </ol>
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading"><?= $theme[0]->name() ?></h1>
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt.</p>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="products-grid">
    <div class="container-fluid">

      <header class="product-grid-header d-flex align-items-center justify-content-between">
        <div class="mr-3 mb-3">
       <?php if($count > 1): ?>
          Affichage <strong>1-<?= $count ?></strong> de <strong><?= $count ?></strong> résultats
        </div>
        <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a
            href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
        </div>
        <?php else : ?>
          Unique résultat 
        </div>
        <?php endif; ?>
        </div>
        
        <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Trier par</span>
          <select class="custom-select w-auto border-0">
            <option value="orderby_0">Defaut</option>
            <option value="orderby_1">Popularité</option>
            <option value="orderby_2">Vote</option>
            <option value="orderby_3">Nouveauté</option>
          </select>
        </div>
      </header>

      <div class="row">
        <!-- product-->
        <?php foreach($productsList as $key => $product) : ?>
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="<?php echo $this->router->generate('catalog-product', array('id' => $product->id())) ?>" class="product-hover-overlay-link">
              <img src="<?= $product->picture() ?>" alt="product" class="img-fluid">
            </a>
          </div>
          <div class="product-action-buttons">
            <a href="<?php echo $this->router->generate('catalog-product', array('id' => $product->id())) ?>" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
            <a href="<?php echo $this->router->generate('catalog-product', array('id' => $product->id())) ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1"><?= $theme[0]->name() ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?php echo $this->router->generate('catalog-product', array('id' => $product->id())) ?>" class="text-dark"><?= $product->name() ?></a></h3><span class="text-muted"><?= $product->price() .'€'?></span>
          </div>
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
        <?php endforeach; ?>
      </div>
  </div>
</section>
<?php else: ?>
         <p><i>-- Il n'y a pas de produits pour cette catégorie en ce moment --</i></p>
<?php endif; ?>