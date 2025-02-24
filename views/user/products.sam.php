<?php
use kibalanga\core\Redirect;
use kibalanga\core\Request;

$id = $_SESSION['token'];

$data = Request::read('users', ['token' => $id]);
if ($data['status'] == 'success') {
    $response = $data['data'];
    $name  = $response['username'];
} else {
    $name  = 'user';
}

$taarifa = Request::readAll('orders');
// echo json_encode($taarifa);
if ($taarifa['status'] == 'success') {
    $order = $taarifa['data'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - <?= htmlspecialchars(APP_NAME) ?></title>
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
                <a class="navbar-brand" href="">
                    <h1 class="tm-site-title mb-0">User Dashboard</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                      <li class="nav-item">
                        <a class="nav-link" href="/user/profile">
                          <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="products">
                          <i class="fas fa-shopping-cart"></i> Products
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="/">
                                <b>Home</b>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="/logout?out=true">
                                <i class="fa fa-sign-out"></i>
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
                    <p class="text-white mt-5 mb-5">Welcome back, <b><?= htmlspecialchars($name); ?></b></p>
                </div>
            </div>
            <div class="row tm-content-row">
                
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <?php if (!empty($order)) { ?>
                            <thead>
                                <tr>
                                    <th scope="col">ORDER NO.</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">START DATE</th>
                                    <th scope="col">EST DELIVERY DUE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr title="click to view Order">
                                    <th scope="row"><b>#122349</b></th>
                                    <td>
                                        <?php if ($order['status'] == 'moving') { ?>
                                        <div class="tm-status-circle moving">
                                        </div>
                                        <?= htmlspecialchars($order['status']); ?>
                                       <?php } elseif ($order['status'] == 'pending') { ?>
                                        <div class="tm-status-circle pending">
                                        </div>
                                        <?= htmlspecialchars($order['status']); ?>
                                        <?php } ?>
                                        <?php if ($order['status'] == 'cancelled') { ?>
                                        <div class="tm-status-circle cancelled">
                                        </div>
                                        <?= htmlspecialchars($order['status']); ?>
                                        <?php } ?>
                                    </td>
                                    <td><b><?= htmlspecialchars($order['location']); ?></b></td>
                                    <td><?= htmlspecialchars($order['start_date']); ?></td>
                                    <td><?= htmlspecialchars($order['delivery_date']); ?></td>
                                </tr>


                                <!-- <tr>
                                    <th scope="row"><b>#122348</b></th>
                                    <td>
                                        <div class="tm-status-circle pending">
                                        </div>Pending
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>11:00, 10 NOV 2018</td>
                                    <td>04:00, 14 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122347</b></th>
                                    <td>
                                        <div class="tm-status-circle cancelled">
                                        </div>Cancelled
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>12:00, 22 NOV 2018</td>
                                    <td>06:00, 28 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122346</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>15:00, 10 NOV 2018</td>
                                    <td>09:00, 14 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122345</b></th>
                                    <td>
                                        <div class="tm-status-circle pending">
                                        </div>Pending
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>15:00, 11 NOV 2018</td>
                                    <td>09:00, 17 NOV 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122344</b></th>
                                    <td>
                                        <div class="tm-status-circle pending">
                                        </div>Pending
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>18:00, 12 OCT 2018</td>
                                    <td>06:00, 18 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122343</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>12:00, 10 OCT 2018</td>
                                    <td>08:00, 18 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122342</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>15:30, 06 OCT 2018</td>
                                    <td>09:30, 16 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122341</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>11:00, 10 OCT 2018</td>
                                    <td>03:00, 14 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122340</b></th>
                                    <td>
                                        <div class="tm-status-circle cancelled">
                                        </div>Cancelled
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>17:30, 12 OCT 2018</td>
                                    <td>08:30, 22 OCT 2018</td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>#122339</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Moving
                                    </td>
                                    <td><b>London, UK</b></td>
                                    <td>15:00, 12 OCT 2018</td>
                                    <td>09:20, 26 OCT 2018</td>
                                </tr> -->


                            </tbody>
                            <?php } else { ?>
                            <div style="text-align:center; color: white;"><p>No order yet.</p></div>
                            <?php } ?>
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

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- <script src="/assets/js/jquery-3.3.1.min.js"></script> -->
    <!-- https://jquery.com/download/ -->
    <!-- <script src="/assets/js/moment.min.js"></script> -->
    <!-- https://momentjs.com/ -->
    <!-- <script src="/assets/js/Chart.min.js"></script> -->
    <!-- http://www.chartjs.org/docs/latest/ -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <!-- https://getbootstrap.com/ -->
    <!-- <script src="/assets/js/tooplate-scripts.js"></script> -->
    <!-- <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script> -->
</body>

</html>
