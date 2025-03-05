<?php

use kibalanga\core\Request;

if (isset($_GET['token'])) {
  $token = htmlspecialchars($_GET['token']);
  
  $response = Request::ReadWhereToken('roles', $token);

  if ($response['status'] == 'success') {
    $data = $response['data'];
    $firstRecord = current($data);
    $role = $firstRecord['role']; 
  } else {
    $role = '';
  }
} else {
  $role = "";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register | <?php echo APP_NAME; ?></title>
    <!-- <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    /> -->
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 250px;
            padding: 12px;
            background-color: white;
            color: #757575;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            border: 1px solid #d1d1d1;
            transition: all 0.3s ease-in-out;
        }

        .google-btn:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        .google-btn img {
            width: 22px;
            height: 22px;
            margin-right: 10px;
        }

        .error-text {
          display: none;
          color: white;
          position: fixed;
          z-index: 100;
          top: 2rem;
          right: 3rem;
          padding: 1rem;
          border-bottom: 1px solid green;
          border-radius: 0.8rem;
          border-top-right-radius: 0;
          background-color: green;
        }
    </style>
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
              <div class="col-12 ingia">
                <form action="#" class="tm-login-form" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="role" value="<?php echo htmlspecialchars($role); ?>" id="role">
                  <p class="error-text" id="error"></p>
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
                  <?php if ($role == 'marchant') { ?>
                  <div class="form-group">
                    <label for="account">Account type</label>
                    <select name="account" id="account">
                        <option value="marchant">Choose</option>
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
                          <option value="China" selected>China</option>
                          <option value="Tanzania">Tanzania</option>
                          <option value="Kenya">Kenya</option>
                          <option value="DRC Congo">DRC Congo</option>
                          <option value="Congo">Congo</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Rwanda">Rwanda</option>
                          <option value="Uganda">Uganda</option>
                          <option value="Nouth Sudan">Nourth Sudan</option>
                          <option value="Sourth Sudan">Sourth Sudan</option>
                      </select>
                    </div>

                    <div class="form-group" id="id">
                      <label for="nida">National ID</label>
                      <input
                        name="nida"
                        type="number"
                        class="form-control validate"
                        id="nida"
                        value=""
                      />
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

                  </div>
                  <input type="hidden" name="lat" id="lat"><br>
                  <input type="hidden" name="long" id="long">
                  <?php } ?>

                  <?php if ($role == 'member') { ?>
                  <div class="form-group">
                    <label for="account">Account type</label>
                    <select name="account" id="account">
                        <option value="member">Choose</option>
                        <option value="member">Member</option>
                    </select>
                  </div>
                  <?php } ?>
                  <div class="g-recaptcha" data-sitekey="<?php echo htmlspecialchars("6LeHw-MqAAAAAAX1XdMJwfF_2SDLcdTBjSKxTSso"); ?>"></div>
                  <div class="form-group mt-4">
                    <button
                    type="submit"
                    name="submit"
                      id="sajili"
                      class="btn btn-primary btn-block text-uppercase sajili"
                    >
                      Register
                    </button>
                  </div>
                  <?php if ($role !== 'marchant') { ?>
                    <div class="form-group mt-4">
                    <p>Or</p>
                  </div>
                    <a href="/google+" class="google-btn">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADcAAAA4CAMAAABuU5ChAAAA+VBMVEX////pQjU0qFNChfT6uwU0f/O4zvs6gfSJr/j6twDoOisjePPoNSXpPjDrWU/oLRr+9vZ7pff/vAAUoUAkpEn0ran619b82pT7wgD+68j947H/+e7//PafvPm/0vuBw5Df7+P63tz3xcPxl5HnJQ7qUEXxj4n4z83zoJzqSz/vgXrucWrsY1r1tbHrSBPoOjbvcSr0kx74rRH80XntZC3xhSPmGRr86+r4sk/936EJcfPS3/yowvnbwVKjsTjx9f5urEjkuBu9tC+ErkJyvoRRpj2az6hWs23j6/0emX2z2btAiuI8k8AyqkE5nZU1pGxCiOxVmtHJ5M+PSt3WAAACGElEQVRIieWSa3fSQBCGk20CJRcW2AWKxgJtqCmieNdatV5SUtFq5f//GJeE7CXJJOT4TZ+PO+c58+7MaNr/SWd60mecTDs1pMFp28dODPZnZw/369TXseXqHNfCblDdte84krTDwUFFwnMnJyXm+bSsmZ/vlcb1+6A2x5C1xYeyPgIyJlhtYDjzjOYyZA3oFighLYxni8UMY6dCG/jy9KzTQfI8DXSnTNN0kcl1lNE9dlxYC8TnnEVmAJ02qHlPllyb58vgmQ2Np0tYgzGMo2ex6IKRihi1mPhcZyYuO8McL4yYl0vrrI6mJZpx9Or1mzqa10rFt8p7o5ArXh+lXutC8d6ZBdiXvH6PeyPFsw8KMBu8fsG9+3t473l9yD1vD+/BX3v1cgqv3lzE/8A9NCUK5sn33vugeN1DQTcVTbG/9M56H+lEAzg2d54t7iW5657xCdEx5PF+B9Lj9oO9z4hBgIZX6YyaXfmZaV9QQkU781h+Hra+7jQaFv6Or8RW3r1rhErES641D9XKigox8jJaQxyAfZOpIQm6kiuT6BvfujqVuEpkkY43u+d1RBBF35v55aVJidKSEBRFiJAk/+0PM3NjgjFFMLc/WVYzlzImLBPprzvzrlBjHUmZSH8DmqatS0QSZtcjTxUBWSlZw1bckhaYlISTcm1rIqKolJJxtRWnXUVscTFsjWFFwoy7WTM2+zX69/gDaLcy7SET9nsAAAAASUVORK5CYII=" alt="Google Logo">
                        Continue with Google
                    </a>
                  <?php } ?><br>
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
<script>
// alert("dsghsdi")

</script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/customer.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="assets/js/sajili.js"></script>

    <!-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->
    <!-- <script>
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            
            // Tumia 'value' kwa input fields
            document.getElementById("lat").value = lat;
            document.getElementById("long").value = lng;
            
            console.log("Latitude: " + lat + ", Longitude: " + lng);
          },
          function(error) {
            console.error("Kosa: " + error.message);
          },
          {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
          }
        );
      } else {
        alert("Geolocation haipatikani kwenye browser yako.");
      }
    </script> -->
  </body>
</html>
