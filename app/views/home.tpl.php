
<section>
  
    <div class="container-fluid">
      <div class="row mx-0">
      <?php foreach($categoriesList as $category): ?>
       <?php if ($category->homeOrder() < 3): ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $category->picture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $category->name() ?></h2><a href="<?php echo $this->router->generate('catalog-productsList', array('id' => $category->id(), 'slug' => 'category'))?>" class="btn btn-light"><?= $category->subtitle() ?></a>
              </div>
            </div>
          </div>
        </div>
       <?php endif; ?>
      <?php endforeach; ?>
 
        <!-- <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="assets/images/categ2.jpeg"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"></h2><a href="category.html" class="btn btn-light">C'est parti</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mx-0"> -->
      <?php foreach($categoriesList as $category): ?> 
        <?php if ($category->homeOrder() > 2): ?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $category->picture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $category->name() ?></h2><a href="<?php echo $this->router->generate('catalog-productsList', array('id' => $category->id(), 'slug' => 'category')) ?>" class="btn btn-link text-white"><?= $category->subtitle() ?>
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
       <!--  <div class="col-lg-4">
            <div class="card border-0 text-center text-dark">
              <img src="assets/images/categ1.jpeg"
                alt="Card image" class="card-img">
              <div class="card-img-overlay d-flex align-items-center">
                <div class="w-100">
                  <h2 class="display-4 mb-4"></h2>
                  <a href="category.html" class="btn btn-link text-dark">Se faire plaisir
                    <i class="fa-arrow-right fa ml-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="assets/images/categ3.jpeg"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"></h2><a href="/catalog/category/3" class="btn btn-link text-white">Bien choisir <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div> -->
        
      </div>
    </div>
  </section>