<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register | <?php echo APP_NAME; ?></title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to <?php echo APP_NAME; ?></h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="awali" method="post" class="tm-login-form">
                    <input type="hidden" name="key" value="<?php echo APP_KEY; ?>">
                 <div class="form-group">
                    <label for="username">username</label>
                    <input
                      name="username"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input
                      name="email"
                      type="email"
                      class="form-control validate"
                      id="email"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required
                    />
                  </div>

                  <div class="form-group">
                    <label for="address">Address</label>
                    <input
                      name="address"
                      type="text"
                      class="form-control validate"
                      id="address"
                      value=""
                      required
                    />
                  </div>
                  <!-- 
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input
                      name="address"
                      type="text"
                      class="form-control validate"
                      id="address"
                      value=""
                      required
                    />
                  </div>

                  <div class="form-group">
                    <label for="account">Account type</label>
                    <select name="account" id="account">
                        <option value="buyer">Buyer</option>
                        <option value="marchant">Marchant</option>
                    </select>
                  </div>

                  <div id="marchant">
                    <div class="form-group">
                      <label for="bname">bussness name</label>
                      <input
                        name="bname"
                        type="text"
                        class="form-control validate"
                        id="bname"
                        value=""
                      />
                    </div>

                    <div class="form-group">
                      <label for="account">Country</label>
                      <select name="country" id="country">
                          <option value="China">China</option>
                          <option value="Tanzania">Tanzania</option>
                          <option value="Kenya">Kenya</option>
                      </select>
                    </div>

                    <div class="form-group" id="nidaa">
                      <label for="nida">Nida</label>
                      <input
                        name="nida"
                        type="number"
                        class="form-control validate"
                        id="nida"
                        value=""
                      />
                    </div>

                    <div class="form-group" id="tini">
                      <label for="account">Tin number</label>
                      <input 
                      type="number" 
                      name="tin" 
                      class="form-control validate"
                      id="tin">
                    </div>

                  </div> -->
                  
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Register
                    </button>
                  </div>
                  <p>
                    You have Account? <a href="login">Login</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; 2025 <?php echo APP_NAME; ?> | Allright reseved.
        </p>
      </div>
    </footer>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/customer.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
