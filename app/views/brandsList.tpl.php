
<section>
    <div class="container-fluid">
      <div class="row mx-0">

      <?php foreach($brandsList as $brand): ?> 
        
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $brand['picture'] ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $brand['name'] ?></h2><a href="<?= $this->router->generate('catalog-productsList', array('id' => $brand['brandId'], 'slug' => 'brand')) ?>" class="btn btn-link text-white"><?= $brand['subtitle'] ?>
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
       
       <?php endforeach; ?>

      </div>
    </div>
</section>