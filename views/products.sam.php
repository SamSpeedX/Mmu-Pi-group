<?php

use kibalanga\core\Request;

$respo_cata = Request::readAll('products');

if ($respo_cata['status'] == 'fail' || $respo_cata['status'] == 'error') {
  // echo json_encode($respo_cata);
  $sam = "Develeper";
}

if ($respo_cata['status'] == 'success') {
  $product = $respo_cata['data']; 
  // echo json_encode($product);
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

    <title><?php echo APP_NAME; ?></title>

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
          <a class="navbar-brand" href="/"><h2><?php echo APP_NAME; ?>  <em>Tz</em></h2></a>
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
    <!-- Page Content -->
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
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".gra">Last Minute</li>
              </ul>
            </div>
          </div>

          <?php if ($product) { foreach ($product as $b) {?>
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


          <!-- <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">

                <?php if (!empty($product)) { 
  foreach ($product as $pro) { ?>
    <div class="col-lg-4 col-md-4 all des product-item" data-id="<?= htmlspecialchars($pro['id']); ?>">
      <div class="product-content">
        <a href="#"><img src="<?= htmlspecialchars($pro['img']); ?>" alt=""></a>
        <div class="down-content">
          <a href="#"><h4><?= htmlspecialchars($pro['name']); ?></h4></a>
          <h6>Pi <span class="product-price"><?= htmlspecialchars($pro['price']); ?></span></h6>
          <p><?= htmlspecialchars($pro['description']); ?></p>
          <button class="btn-buy">Buy Now</button>
        </div>
      </div>
    </div>
<?php } } else { ?>
  <div>No product yet!</div>
<?php } ?>




                  <?php if (!empty($product)) { 
                  foreach ($product as $pro) { ?>
                    <!-- <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a href="#"><img src="<?= htmlspecialchars($pro['img']); ?>" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4><?= htmlspecialchars($pro['name']); ?></h4></a>
                          <h6>Pi <?= htmlspecialchars($pro['price']); ?></h6>
                          <p><?= htmlspecialchars($pro['description']); ?></p>
                          <form action="#" class="form"><input type="text" name="" value="<?= htmlspecialchars($pro['img']); ?>" id="<?= htmlspecialchars($pro['img']); ?>">
                          <button onclick="add();" type="submit">Buy now</button></form>
                        </div>
                      </div>
                    </div> -->
                    <?php } } else { ?>
                      <div>No product yet!</div>
                    <?php }  ?> 
                    <!-- <div class="col-lg-4 col-md-4 all dev">
                      <div class="product-item">
                        <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>Tittle goes here</h4></a>
                          <h6>$16.75</h6>
                          <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                          <button>Buy now</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 all gra">
                      <div class="product-item">
                        <a href="#"><img src="assets/images/product_03.jpg" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>Tittle goes here</h4></a>
                          <h6>$32.50</h6>
                          <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                          <button>Buy now</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 all gra">
                      <div class="product-item">
                        <a href="#"><img src="assets/images/product_04.jpg" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>Tittle goes here</h4></a>
                          <h6>$24.60</h6>
                          <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                          <button>Buy now</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 all dev">
                      <div class="product-item">
                        <a href="#"><img src="assets/images/product_05.jpg" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>Tittle goes here</h4></a>
                          <h6>$18.75</h6>
                          <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                          <button>Buy now</button>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a href="#"><img src="assets/images/product_06.jpg" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>Tittle goes here</h4></a>
                          <h6>$12.50</h6>
                          <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                          <button>Buy now</button>
                        </div>
                      </div>
                    </div> -->

                </div>
            </div>
          </div> 
          <!-- <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div> -->


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

      // const form = document.querySelector(".form");
      // form.addEventListener(() => {
      //   e.preventDefault();
      //   alert('prevented')
      // });

      document.addEventListener("DOMContentLoaded", function () {
    let cartCountElement = document.getElementById("iterm-no");

    document.querySelectorAll(".btn-buy").forEach((button) => {
        button.addEventListener("click", function () {
            let product = this.closest(".col-lg-4"); // Adjusted selector
            if (!product) return; // Safety check

            let productData = {
                id: product.getAttribute("data-id"),
                img: product.querySelector("img").src,
                name: product.querySelector("h4").textContent.trim(),
                price: parseFloat(product.querySelector(".product-price").textContent) || 0,
                quantity: 1 // Always add 1 item
            };

            // Send AJAX request to add product to cart
            fetch("views/add_to_cart.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(productData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert("✅ " + productData.name + " added to cart!");

                    // Update cart count dynamically
                    if (cartCountElement) {
                        let currentCount = parseInt(cartCountElement.textContent) || 0;
                        cartCountElement.textContent = currentCount + 1;
                    }
                } else {
                    alert("❌ Failed to add product to cart.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});


//       document.addEventListener("DOMContentLoaded", function () {
//     // Select all product containers
//     document.querySelectorAll(".product-item").forEach((product) => {
//         let priceElement = product.querySelector(".product-price");
//         let quantityInput = product.querySelector(".product-quantity");
//         let totalElement = product.querySelector(".price");

//         // Increase Quantity
//         product.querySelector(".btn-increase").addEventListener("click", function () {
//             quantityInput.value = parseInt(quantityInput.value) + 1;
//             updatePrice();
//         });

//         // Decrease Quantity
//         product.querySelector(".btn-decrease").addEventListener("click", function () {
//             if (quantityInput.value > 1) {
//                 quantityInput.value = parseInt(quantityInput.value) - 1;
//                 updatePrice();
//             }
//         });

//         // Update Price Function
//         function updatePrice() {
//             let unitPrice = parseFloat(priceElement.textContent);
//             let quantity = parseInt(quantityInput.value);
//             let newTotal = unitPrice * quantity;
//             totalElement.textContent = newTotal;
//         }

//         // AJAX "Buy Now" Button
//         product.querySelector(".btn-buy").addEventListener("click", function () {
//             let productData = {
//                 id: product.getAttribute("data-id"),
//                 img: product.querySelector("img").src,
//                 name: product.querySelector("h4").textContent,
//                 price: totalElement.textContent,
//                 quantity: quantityInput.value
//             };

//             // Send AJAX Request
//             let xhr = new XMLHttpRequest();
//             xhr.open("POST", "add_to_cart.php", true);
//             xhr.setRequestHeader("Content-Type", "application/json");
            
//             xhr.onreadystatechange = function () {
//                 if (xhr.readyState === 4 && xhr.status === 200) {
//                     alert("Added to cart: " + productData.name);
//                 }
//             };

//             xhr.send(JSON.stringify(productData));
//         });
//     });
// });

</script>

  </body>

</html>
