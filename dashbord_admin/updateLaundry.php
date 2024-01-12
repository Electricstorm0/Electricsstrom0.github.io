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
$id = isset($_GET['Id_laundry']) ? $_GET['Id_laundry'] : 0;
$select_laundry = query("SELECT * FROM laundry WHERE Id_laundry = $id")[0];

if (isset($_POST['submit'])) {
    function update($data)
    {
        global $conn;
        $id = $_GET['Id_laundry']; // Ganti dengan cara mendapatkan Id dari URL
        $id_cust = $_POST['Id_cust'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $room_preference = $_POST['room_preference'];
        $jumlah_item = $_POST['jumlah'];
        $berat = mysqli_real_escape_string($conn, $_POST['berat']);
        $harga = $_POST['harga'];
        $tglMasuk = $_POST['laundry_masuk'];
        $tglSelesai = $_POST['laundry_selesai'];

        $sql = "UPDATE laundry SET Id_cust=?, nama=?, jenis_layanan=?,jumlah_item=?, berat=?, harga=?, tgl_masuk=?, tgl_selesai=? WHERE Id_laundry=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssdssii", $id_cust, $name, $room_preference, $jumlah_item,$berat, $harga, $tglMasuk, $tglSelesai, $id);
        $stmt->execute();
        $stmt->close();

        return mysqli_affected_rows($conn);
    }

    if (update($_POST) > 0) {
        echo "
        <script>
            alert('data gagal diupdate!');
            document.location.href = 'formLaundry.php';
        </script>
    ";
    } else {
        echo "
            <script>
                alert('data berhasil diupdate!');
                document.location.href = 'formLaundry.php';
            </script>
        ";
       
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry</title>
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
                        <a class="nav-link" href="formCust.php">CUSTOMER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="formLaundry.php">LAUNDRY</a>
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
        <!-- Form Create -->
        <form action="" method="post">
            <h3 class="text-center">DATA LAUNDRY</h3>
            <!-- <input type="hidden" name="action" value="create"> -->
            <div class="mb-3">
                <label class="fs-6" for="Id">ID Customer</label>
                <input type="number" name="Id_cust" placeholder="Enter your ID" required
                    value="<?= $select_laundry["Id_cust"]; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="fs-6" for="nama">Nama</label>
                <input type="text" name="name" placeholder="Enter your name" required
                    value="<?= $select_laundry["nama"]; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="fs-6" for="layanan">Jenis Layanan</label>
                <select class="form-select" id="room-selection" name="room_preference" required
                    value="<?= $select_laundry["jenis_layanan"]; ?>">
                    <option value="">Choose a Service from the List</option>
                    <option value="Kiloan">Laundry Kiloan</option>
                    <option value="Satuan">Laundry Satuan</option>
                    <option value="Boneka dan sepatu">Paket Boneka dan Sepatu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="fs-6" for="jumlah">Jumlah Item</label>
                <input type="number" name="jumlah" placeholder="Enter number of item" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="fs-6" for="berat">Berat</label>
                <input type="number" name="berat" placeholder="Enter the weight" required
                    value="<?= $select_laundry["berat"]; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="fs-6" for="harga">Harga</label>
                <input type="number" name="harga" placeholder="Enter the price" required
                    value="<?= $select_laundry["harga"]; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="fs-6" for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" name="laundry_masuk" required value="<?= $select_laundry["tgl_masuk"]; ?>"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label class="fs-6" for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" name="laundry_selesai" required value="<?= $select_laundry["tgl_selesai"]; ?>"
                    class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>

        <!-- Table Read -->
        <table class="table mt-5 ">
            <thead>
                <tr>
                    <th>ID Laundry</th>
                    <th>ID Customer</th>
                    <th>Nama Customer</th>
                    <th>Jenis Layanan</th>
                    <th>Jumlah Item</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM laundry";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>" . $row["Id_laundry"] . "</td>";
                    echo "<td>" . $row["Id_cust"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["jenis_layanan"] . "</td>";
                    echo "<td>" . $row["jumlah_item"] . "</td>";
                    echo "<td>" . $row["berat"] . "</td>";
                    echo "<td>" . $row["harga"] . "</td>";
                    echo "<td>" . $row["tgl_masuk"] . "</td>";
                    echo "<td>" . $row["tgl_selesai"] . "</td>";
                    echo "<td><a href='updateLaundry.php?Id_laundry=" . $row["Id_laundry"] . "'>Edit</a> | <a href='deleteLaundry.php?Id_laundry=" . $row["Id_laundry"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
                } else {
                echo "<tr>
                    <td colspan='4'>No laundry found</td>
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