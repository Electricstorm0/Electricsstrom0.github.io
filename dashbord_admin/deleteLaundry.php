<?php
include '../config.php';
$id = $_GET['Id_laundry'];

function hapus($id) {
	global $conn;
	// Menggunakan parameterized query untuk mencegah SQL injection
	$stmt = $conn->prepare("DELETE FROM laundry WHERE Id_laundry = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->close();
	return mysqli_affected_rows($conn);
}

if (hapus($id) > 0) {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'formLaundry.php';
		</script>
	";
} else {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'formLaundry.php';
        </script>
    ";
}
?>