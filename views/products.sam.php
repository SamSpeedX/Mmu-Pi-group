<?php

use kibalanga\core\Request;
use kibalanga\storage\Session;

Session::check();

$get = $_GET['category'] ?? '';
if ($get && $get !== 'all') {
  $k = htmlspecialchars($_GET['category']);
  $jb = Request::FindWhereCategory('products', $k);

  if ($jb['status'] == 'success') {
    $product = $jb['data'];
  } else {
    $product = '';
    $message = "Sorry We dont have product yet for this category choose another category";
  }
} else {
  $respo_cata = Request::readAll('products');
  if ($respo_cata['status'] == 'success') {
    $product = $respo_cata['data']; 
  } else {
    $product = "";
  }
}

$ka = Request::readAll('categories');
// echo json_encode($ka);
if ($ka['status'] == 'success') {
  $kategori = $ka['data'];
} else {
  $kategori = "";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> -->
    <title>Products | <?php echo APP_NAME; ?></title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>
  <body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/"><h2><?php echo APP_NAME; ?>  <em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/">Home
                </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="products">Our Products
                  <span class="sr-only">(current)</span></a>
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
                <a class="nav-link" href="cart">Cart <span id="iterm-no">0</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout?out=true">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Available product today</h4>
              <h2><?php echo APP_NAME; ?> products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="products"   id="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                <li>Select Product Category</li><br>
                <select id="category" style="color: black; width: 20rem;">
                  <option value="all" selected>All Category</option>
                  <?php if ($kategori) { foreach ($kategori as $kategor) { ?>
                    <option value="<?php echo htmlspecialchars($kategor['name']); ?>"><?php echo htmlspecialchars($kategor['name']); ?></option>
                  <?php } }  ?>
                </select>
              </ul>
            </div>
          </div>

          <?php if ($product) { foreach ($product as $b) {?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="<?php echo htmlspecialchars($b['img']) ?>" alt="product" class="product123"></a>
              <div class="down-content kat">
                <a href="#"><h4><?php echo htmlspecialchars($b['name']) ?></h4></a>
                <h6>Pi <?php echo htmlspecialchars($b['price']) ?>/=</h6>
                <p>
                  <?php echo htmlspecialchars($b['description']) ?>
                </p>
                <form action="#" enctype="multipart/form-data" class="form" autocomplete="off">
                 <p class="error-text2" id="error"></p>
                  <input type="hidden" value="<?php echo htmlspecialchars($b['name']); ?>" name="name" id="name">
                  <input type="hidden" value="<?php echo htmlspecialchars($b['description']); ?>" name="description" id="description">
                  <input type="hidden" value="<?php echo htmlspecialchars($b['price']); ?>" name="price" class="product-price" id="price">
                  <input type="hidden" name="sellar" id="sellar" value="<?php echo htmlspecialchars($b['token']); ?>">
                <button type="submit" name="submit" class="btn-buy">Buy Now</button>
                </form>
              </div>
            </div>
          </div>
          <?php } } else { ?>
            <?php if (isset($message)) { ?>
              <p><?php echo htmlspecialchars($message); ?></p>
            <?php } else {?>
              <p>No procuct yet boss wait please we will post soon.</p>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>
              - Developed by: <a rel="nofollow noopener" href="" target="_blank"><?= htmlspecialchars(DEV); ?></a>
              </p>
              <p>Copyright &copy; <?= htmlspecialchars(date('Y'). " ". APP_NAME); ?>.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script>
      const category = document.getElementById("category");
      category.onchange = () => {
        if (category.value == 'all') {
          window.location.href=`products?#products`;
        }
        window.location.href=`products?category=${category.value}#products`;
      }
    </script>
    <!-- <script src="assets/js/addcart.js"></script> -->
    <script src="assets/js/cats.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
