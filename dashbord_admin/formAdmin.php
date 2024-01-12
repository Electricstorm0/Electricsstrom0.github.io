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

if(isset($_POST['submit'])){
    function tambah($data) {
    global $conn;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pass = mysqli_real_escape_string($conn, ($_POST['password']));
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $cpass = mysqli_real_escape_string($conn, ($_POST['cpassword']));

    $sql = "INSERT INTO admin (Id_daisy,nama,email, password) VALUES (1,'$name','$email', '$cpass')";
    mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
};
if( tambah($_POST) > 0 ) {
    echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'formAdmin.php';
			</script>
		";
}else{
    echo "
    <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'formAdmin.php';
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
    <title>Admin</title>
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
                        <a class="nav-link active" aria-current="page" href="formAdmin.php">ADMIN</a>
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
                        <span class="nav-link active text-uppercase ms-4 text-primary fw-bold text-italic ">
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
            <h3 class="text-center">ADMIN</h3>
            <!-- <input type="hidden" name="action" value="create"> -->
            <div class="mb-3">
                <input type="text" name="name" placeholder="Enter your name" required class="form-control">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Enter your email" required class="form-control">
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Enter your password" required class="form-control">
            </div>
            <div class="mb-3">
                <input type="password" name="cpassword" placeholder="Confirm your password" required
                    class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>

        <!-- Table Read -->
        <table class="table mt-5 ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM admin";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>" . $row["Id_admin"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td><a href='updateAdmin.php?Id_admin=" . $row["Id_admin"] . "'>Edit</a> | <a href='deleteAdmin.php?Id_admin=" . $row["Id_admin"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
                } else {
                echo "<tr>
                    <td colspan='4'>No admins found</td>
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