<?php 
    $cart = isset($_SESSION["cart"])?$_SESSION["cart"]:[];
    require_once("./functions/dbp.php");
    $categories = select("select * from categories");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg fixed-top navbar-scroll shadow-0" style="background-color: #ffede7;">
  <div class="container">
    <a class="navbar-brand" href="index.php">Bronzx Luggage</a>
    <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
      aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="d-flex justify-content-start align-items-center">
        <i class="fas fa-bars"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php foreach($categories as $item):?>
        <li class="nav-item">
          <a class="nav-link" href="/category.php?id=<?php echo $item["id"];?>"><?php echo $item["NAME"];?></a>
        </li>
        <?php endforeach;?>
        <li class="nav-item">
          <a class="nav-link px-3" href="#!">New collection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="#!">About us</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link px-3" href="#!">Gender</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="#!">Contact us</a>
        </li>
      </ul>

      <ul class="navbar-nav flex-row">
        <li class="nav-item">
          <a class="nav-link pe-3" href="#!">
            <i class="fab fa-youtube"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="#!">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-3" href="#!">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
      </ul>
      <a href="/cartpro.php" class="btn btn-outline-dark ms-1">
        <i class="bi bi-cart"></i>
        <span class="badge rounded-pill text-bg-dark"><?php echo count($cart);?></span>
      </a>
    </div>
  </div>
</nav>