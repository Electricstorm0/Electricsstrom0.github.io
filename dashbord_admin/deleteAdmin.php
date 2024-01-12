<?php
include '../config.php';
$id = $_GET['Id_admin'];

function hapus($id) {
	global $conn;
	// Menggunakan parameterized query untuk mencegah SQL injection
	$stmt = $conn->prepare("DELETE FROM admin WHERE Id_admin = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->close();
	return mysqli_affected_rows($conn);
}

if (hapus($id) > 0) {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'formAdmin.php';
		</script>
	";
} else {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'formAdmin.php';
        </script>
    ";
}
?>