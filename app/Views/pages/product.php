
<?php foreach ($grouped_products as $id_kategori => $group) : ?>
<section id="portfolio" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
              <h2><?=$group['nama_kategori'];?></h2>
            </div>
          </div>
  
          <div class="container-fluid" style="max-width: 80%;">
            <div class="row no-gutters">
            <?php foreach ($group['products'] as $product) : ?>
              <div class="col-lg-3 col-md-4">
                <div class="portfolio-item wow fadeInUp">
                  <a href="<?=base_url('assets/')?>img/Product/<?=$product['img_product'];?>" class="portfolio-popup">
                    <img src="<?=base_url('assets/')?>img/Product/<?=$product['img_product'];?>" alt="" />
                    <div class="portfolio-overlay">
                      <div class="portfolio-info">
                        <h2 class="wow fadeInUp"><?=$product['nama_product'];?></h2>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <?php endforeach; ?>
  

            </div>    
          </div>
        </section>
        <?php endforeach; ?>
       