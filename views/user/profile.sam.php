<?php

use kibalanga\core\Redirect;
use kibalanga\core\Request;
use kibalanga\storage\Session;
// i

Session::profile();

$id = $_SESSION['token'];

$data = Request::read('users', ['token' => $id]);
// echo json_encode($data);
if ($data['status'] == 'fail' || $data['status'] == 'error') {
  Redirect::to('/login');
} else {
  $response = $data['data'];
  $name  = $response['username'];
  $email = $response['email'];
  $phone = $response['address'];
  // echo json_encode($response);
}

$ssd = Request::read('profiles', [':token' => $id]);
if ($ssd['status'] == 'fail' || $ssd['status'] == 'error') {
  $image = htmlspecialchars('public/profile/profile_user.jpg');
} else {
  $d = $ssd['data'];
  $image = htmlspecialchars($d['img']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Profile | <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700"/>
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="/assets/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['token']; ?>">
    <div class="" id="home">
      <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">Profile</h1>
          </a>
          <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars tm-nav-icon"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
              <li class="nav-item">
                <a class="nav-link" href="/user/profile">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products">
                  <i class="fas fa-shopping-cart"></i> Products
                </a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link d-block" href="/">
                 <b>home</b>
                </a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link d-block" href="/logout?out=true">
                 <b>Logout</b>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container mt-5">
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Change Avatar</h2>
              <div class="tm-avatar-container">
                <img
                  src="../<?= htmlspecialchars($image); ?>"
                  alt="Avatar"
                  class="tm-avatar img-fluid mb-4"
                />
                <a href="del_p?token=<?= htmlspecialchars($id); ?>" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <form action="edit_b_profile" method="post" enctype="multipart/form-data">
              <input type="file" src="/" alt="profile" name="file" required>
              <br><br>
              <button class="btn btn-primary btn-block text-uppercase">
                Upload New Photo
              </button>
              </form>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <form action="badili_data" class="tm-signup-form row" method="POST">
                <div class="form-group col-lg-6">
                  <label for="name">Account Name</label>
                  <input
                    id="name"
                    name="name"
                    type="text"
                    value="<?= htmlspecialchars($name); ?>"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    value="<?= htmlspecialchars($email); ?>"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Re-enter Password</label>
                  <input
                    id="password2"
                    name="password2"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="address">Address</label>
                  <input
                    id="address"
                    name="address"
                    type="text"
                    class="form-control validate"
                    value="<?= htmlspecialchars($phone); ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Update Your Profile
                  </button>
                </div>
                <div class="col-12">
                  <a href="delete_user?token=<?php echo $id; ?>">
                  <p
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Delete Your Account.
                  </p>
                  </a>
                </div>
              </form>
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
    </div>

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <!-- <script src="/assets/css/profile.js"></script> -->
  </body>
</html>
