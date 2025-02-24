<?php

use kibalanga\core\Request;

if (isset($_SESSION['token'])) {
  $id = $_SESSION['token'];
} else {
  $id = null;
}
$response = Request::read('carts', ['token' => $id]);

if ($response['status'] == 'fail') {
  $count_cart = 0;
} else {
  // echo json_encode($response);
  $data = $response['data'];
  $count_cart = $data['rows'];
}

$respo_cata = Request::productP(6);

if ($respo_cata['status'] == 'fail' || $respo_cata['status'] == 'error') {
  echo json_encode($respo_cata);
  $sam = "Develeper";
}

if ($respo_cata['status'] == 'success') {
  $product = $respo_cata['data']; 
  // echo json_encode($product);
} else {
  $product = '';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>welcome | <?php echo APP_NAME ?></title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--
TemplateMo 546 Sixteen Clothing
https://templatemo.com/tm-546-sixteen-clothing
-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>
  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href=""><h2><?php echo APP_NAME; ?> <em>Tz</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about">About Us</a>
              </li>
              <?php if (!isset($_SESSION['token'])) {?>
              <li class="nav-item">
                <a class="nav-link" href="login">Login</a>
              </li>
              <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="user/profile">profile</a>
              </li>
              <?php } ?>
            
              <li class="nav-item">
                <a class="nav-link" href="cart">Cart <span id="iterm-no"><?= htmlspecialchars($count_cart); ?></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout?out=true">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php if ($product) { foreach ($product as $b) { ?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="<?php echo htmlspecialchars($b['img']) ?>" alt=""></a>
              <div class="down-content">
                <a href="#"><h4><?php echo htmlspecialchars($b['name']) ?></h4></a>
                <h6>Pi <?php echo htmlspecialchars($b['price']) ?>/=</h6>
                <p>
                  <?php echo htmlspecialchars($b['description']) ?>
                </p>
                <button>Buy Now</button>
              </div>
            </div>
          </div>
          <?php } } else { ?>
            <p>No procuct yet boss wait please we will post soon.</p>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About <?php echo htmlspecialchars(APP_NAME); ?></h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4><?php echo htmlspecialchars(APP_NAME); ?> products</h4>
              <p><?php echo htmlspecialchars(APP_NAME); ?> is online platform that allow everyone to buy iterms online. Our platform allow online payments.</p>
              <p>Here are the best products our merchant are selling.</p>
              <ul class="featured-list">
                <li><a href="#">Clothes</a></li>
                <li><a href="#">furniture</a></li>
                <li><a href="#">Motorcycle</a></li>
                <li><a href="#">Electronics</a></li>
                <!-- <li><a href="#">Non cum id reprehenderit</a></li> -->
              </ul>
              <a href="about" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                <!-- &amp; -->
                  <h4>Register as <em><?php echo APP_NAME ?></em> Platform member</h4>
                  <p>
                    if you want to become <em><?= htmlspecialchars(APP_NAME); ?></em> Member you need to Register here make sure you read <a href="terms" style="color: blue;" target="_blank" rel="noopener noreferrer">Terms and privacy policy of servicess</a>
                  </p>
                </div>
                <div class="col-md-4">
                  <a href="mwanachama" class="filled-button">Register as Member</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div style="display: flex;">
                <p><a href="terms" style="color: blue;" target="_blank" rel="noopener noreferrer">Terms and privacy policy of servicess</a></p>
              </div>
              - Developed by: <a rel="nofollow noopener" href="https://SamSeedX.github.io/samtechnology" target="_blank"><?php echo DEV; ?></a></p>
              <p>Power by: Pius Omenda.</p>
              <p>Copyright &copy; 2025 <?php echo APP_NAME; ?> | Allright reseved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
