<?php
include '../config.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if(!isset($admin_id)){
header('location:../LoginAdmin/login_Admin.php');
}
$result = mysqli_query($conn, "SELECT nama FROM admin WHERE Id_admin = $admin_id");
$row = mysqli_fetch_assoc($result);
$nama = $row['nama'];

// Set the admin name in the session for later use
$_SESSION['admin_nama'] = $nama;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-body-tertiary">
    <!--navbar  -->
    <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
        <div class="container">
            <a class="text-decoration-none" href="#"><img src="../asset/Logo.png" alt="Daisy Laundry" /> <span
                    class="fw-bold text-black-50">CEPAT & EFISIEN</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboardAdmin.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="formAdmin.php">ADMIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formCust.php">CUSTOMER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formLaundry.php">LAUNDRY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../LoginAdmin/logout.php">LOGOUT</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link active text-uppercase ms-4 text-primary fw-bold ">
                            <?php echo $_SESSION['admin_nama']; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <div style="margin-top: 10%;" class="container-fluid pb-5 px-5">
        <h4 class="text-capitalize p-3">Welcome, <?php echo $_SESSION['admin_nama']; ?></h4>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-4 mb-3">
                <div class="card text-center ">
                    <img src="../asset/Customer.png" class="gambaradmin2  " alt="...">
                    <div class="card-body">
                        <h5 class="card-title">ADMIN</h5>
                        <?php 
                        $select_admins = mysqli_query($conn, "SELECT * FROM `admin` ") or die('query failed');
                         $number_of_admins = mysqli_num_rows($select_admins);
                        ?>
                        <h3><?php echo $number_of_admins; ?></h3>
                        <a href="formAdmin.php" class="text-decoration-none">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="card text-center">
                    <img src="../asset/Customer.png" class="gambarcust" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CUSTOMER</h5>
                        <?php 
                        $select_cust = mysqli_query($conn, "SELECT * FROM `customer` ") or die('query failed');
                         $number_of_cust = mysqli_num_rows($select_cust);
                        ?>
                        <h3><?php echo $number_of_cust; ?></h3>
                        <a href="formCust.php" class="text-decoration-none">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="card text-center">
                    <img src="../asset/Customer.png" class="gambarcust" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LAUNDRY</h5>
                        <?php 
                        $select_laundry = mysqli_query($conn, "SELECT * FROM `laundry` ") or die('query failed');
                         $number_of_laundry = mysqli_num_rows($select_laundry);
                        ?>
                        <h3><?php echo $number_of_laundry; ?></h3>
                        <a href="formLaundry.php" class="text-decoration-none">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
        <path fill="#212529" fill-opacity="1"
            d="M0,192L48,213.3C96,235,192,277,288,272C384,267,480,213,576,165.3C672,117,768,75,864,90.7C960,107,1056,181,1152,224C1248,267,1344,277,1392,282.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
    <footer class="bg-dark text-light">
        <div class="container ">
            <div class="row p-3">
                <div class="col-md-4">
                    <h3>About Us</h3>
                    <p style="text-align: justify">
                        Daisy Laundry: Cepat & Efisien! <br />
                        Daisy Laundry adalah pilihan terbaik untuk mencuci pakaian Anda dengan cepat dan hasil yang
                        bersih. Kami menggabungkan teknologi modern dengan layanan pelanggan yang ramah untuk
                        memberikan Anda pengalaman mencuci yang Cepat, efisien, dan selalu siap melayani kebutuhan Anda
                        .
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <address>
                        <p>Email: daisy_laundry@email.com</p>
                        <p>Phone: (021) 456-7890</p>
                    </address>
                </div>
                <div class="col-md-4">
                    <h3>Follow Us</h3>
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none" href="http://facebook.com">Facebook</a></li>
                        <li><a class="text-decoration-none" href="https://twitter.com/">Twitter</a></li>
                        <li><a class="text-decoration-none" href="https://instagram.com/">Instagram</a></li>
                        <li><a class="text-decoration-none" href="https://whatsapp.com/">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
            <p class="text-center text-light fw-light p-2">©DaisyLaundry2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>