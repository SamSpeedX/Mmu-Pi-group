<?php
use kibalanga\storage\Session;
use kibalanga\core\Request;

Session::Admin();
$response = Request::readAll("users");

if ($response['status'] == 'success') {
    $users =  $response['data'];
} else {
    $users = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management | <?= htmlspecialchars(APP_NAME) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="/assets/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="/boss">
                    <h1 class="tm-site-title mb-0">Admin Panel</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link" href="/boss">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/boss/products">
                                <i class="fas fa-shopping-cart"></i>
                                My Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/boss/accounts">
                                <i class="far fa-user"></i>
                                My Account
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="/boss/users">
                                <i class="fa fa-users"></i>
                                Manage user
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/boss/users">
                                <i class="fa fa-shopping-cart"></i>
                                Manage produts
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="invite_merchant">
                                <b>Invite Merchant</b>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="/">
                                <b>Go Market</b>
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Manage your users</p>
                </div>
            </div>
            <div class="row tm-content-row">
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Users List</h2>
                        <table class="table">
                            <thead>
                                <?php if ($users) { ?>
                                <tr>
                                    <th scope="col">NAME</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user) {?>
                                <tr>
                                    <th scope="row"><b><?php echo htmlspecialchars($user['username']); ?></b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div><?php echo htmlspecialchars($user['address']); ?>
                                    </td>
                                    <td><b><?php echo htmlspecialchars($user['role']); ?></b></td>
                                    <td class="text-center">
                                        <a href="edit_user?token=<?= htmlspecialchars($user['token']); ?>" class="tm-product-delete-link" title="click to Edit User account">
                                            <i class="far fa-edit tm-product-delete-icon"></i>
                                        </a>
                                      <a href="#" class="tm-product-delete-link" title="Click to Delete user account">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                      </a>
                                    </td>
                                </tr>
                                <?php } } else {?>
                                <p>No user yet boss!</p>
                                <?php } ?>
                            </tbody>
                        </table>
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
    <input type="hidden" id="token" value="<?php echo htmlspecialchars($_SESSION['token']); ?>">

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="/assets/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="/assets/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="/assets/js/tooplate-scripts.js"></script>
</body>

</html>
