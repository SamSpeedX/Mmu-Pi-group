<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>About us | <?php echo APP_NAME; ?></title>
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
          <a class="navbar-brand" href="/"><h2><?php echo APP_NAME; ?> <em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products">Our Products</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="about">About Us
                  <span class="sr-only">(current)</span></a>
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

    <div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>about us</h4>
              <h2>our Platform</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Background</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Who we are &amp; What we do?</h4>
              <p>
                This Platform developed by Sam Technology Developer to simplify the online Bussness through online coins like Pi in TANZANIA Our plan is to make Digital TANZANIA. <br> <br> Our platform allow online payments We accept Pi, Card and Mobile network Payments.
              </p>
              <p>
                About Sam Technology is Group of Software Developer that work togather to perform Deferent Task as a Team Work. <br> <br> Current everyone work from home we don't have Office yet, We are looking for support. <a href="developersuport">Support Developer</a>
              </p>
              <P>
                <?php echo htmlspecialchars(APP_NAME); ?><?php echo htmlspecialchars('- '.SLOGAN); ?>
              </P>
              <ul class="social-icons">
                <li><a href="https://facebook.com/samochuu"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://wa.me/+255780771116"><i class="fa fa-whatsapp"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
                <li><a href="https://instagram.com/sam.ochu"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Team Members</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_03.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
                      <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
                      <!-- <li><a href="#"><i class="fa fa-behance"></i></a></li> -->
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Omenda</h4>
                <span>Founder</span>
                <p>
                  Hi is Founder of <?php echo htmlspecialchars(APP_NAME); ?> Platform.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/ceo1.jpg" height="250rem" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="https://facebook.com/samochuu"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="https://wa.me/+255780771116"><i class="fa fa-whatsapp"></i></a></li>
                      <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
                      <li><a href="https://instagram.com/sam.ochu"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>CHIKIRA</h4>
                <span>Software Developer</span>
                <p>
                  He is Halfstack developer from Dodoma TANZANIA.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_02.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="https://facebook.com/samochuu"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="https://instagram.com/sam.ochu"><i class="fa fa-instagram"></i></a></li>
                      <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
                      <li><a href="https://wa.me/+255780771116"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Lattifa</h4>
                <span>Secretary</span>
                <p>Our company Secretary She from Dodoma TANZANIA.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-gear"></i>
              </div>
              <div class="down-content">
                <h4>Product Management</h4>
                <p>Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.</p>
                <a href="#" class="filled-button">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-gear"></i>
              </div>
              <div class="down-content">
                <h4>Customer Relations</h4>
                <p>Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.</p>
                <a href="#" class="filled-button">Details</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-gear"></i>
              </div>
              <div class="down-content">
                <h4>Global Collection</h4>
                <p>Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.</p>
                <a href="#" class="filled-button">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->


    <!-- <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Happy Partners</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel">
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="1">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="2">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="3">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="4">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="5">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="6">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    
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
    </script>


  </body>

</html>
