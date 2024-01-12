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
    <title>Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body style="background-color:antiquewhite ;">
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
                        <a class="nav-link " aria-current="page" href="dashboardAdmin.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="formAdmin.php">ADMIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="formCust.php">CUSTOMER</a>
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
    <div class="container mt-5 bg-white shadow-sm p-4">
        <h3 class="text-center">DATA CUSTOMER</h3>
        <!-- Table Read -->
        <table class="table mt-5 ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis Layanan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM customer";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>" . $row["Id_cust"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["alamat"] . "</td>";
                    echo "<td>" . $row["no_hp"] . "</td>";
                    echo "<td>" . $row["jenis_layanan"] . "</td>";
                    echo "</tr>";
                }
                } else {
                echo "<tr>
                    <td colspan='4'>No customer found</td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>