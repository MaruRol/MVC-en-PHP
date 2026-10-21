<?php require __DIR__ . "/../header.php"; ?>
<?php require __DIR__ . "/../navbar.php"; ?>


<section>

  <div class="container">
    <div class="row ms-5">
      <div class="col-2"></div>
      <div class="col-8">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner">
            <div class="carousel-item active ms-md-3 mt-5 mb-0">
              <div class="ratio ratio-16x9">
              <img src="../public/imagenes/imagen1.jpg" class="d-block object-fit-cover" alt="imagen 1">
              </div>
              <div class="carousel-caption">
                <h2 class="text-white bg-secondary d-none d-md-block"><strong>OFERTAS DEL DÍA</strong></h2>
              </div>
            </div>

            <div class="carousel-item ms-md-3 mt-5 mb-0">
              <div class="ratio ratio-16x9">
              <img src="../public/imagenes/imagen2.jpg" class="d-block object-fit-cover" alt="imagen 2">
              </div>
              <div class="carousel-caption">
                <h2 class="text-white bg-secondary d-none d-md-block"><strong>OFERTAS DEL DÍA</strong></h2>
              </div>
            </div>


            <div class="carousel-item ms-md-3 mt-5 mb-0">
              <div class="ratio ratio-16x9">
              <img src="../public/imagenes/imagen3.jpg" class="d-block object-fit-cover" alt="imagen 3">
              </div>
              <div class="carousel-caption">
                <h2 class="text-white bg-secondary d-none d-md-block"><strong>OFERTAS DEL DÍA</strong></h2>
              </div>
            </div>

          </div>
          <button class="carousel-control-prev text-dark" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon text-primary" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

      </div>
      <div class="col-2"></div>
    </div>
  </div>

</section>

<?php require __DIR__ . "/../footer.php"; ?>