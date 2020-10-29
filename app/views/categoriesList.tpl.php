
<section>
    <div class="container-fluid">
      <div class="row mx-0">

      <?php foreach($categoriesList as $key => $category): ?> 
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
        <?php endforeach; ?>

      </div>
    </div>
</section>