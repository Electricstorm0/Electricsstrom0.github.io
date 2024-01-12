<?php

include '../config.php';




if(isset($_POST['book'])){

   $name = mysqli_real_escape_string($conn, $_POST['visitor_name']);
   $email = mysqli_real_escape_string($conn, $_POST['visitor_email']);
   $phone = $_POST['visitor_phone'];
   $Address = mysqli_real_escape_string($conn, $_POST['visitor_address']);
   $room_preference = $_POST ['room_preference'];
   $visitor_message = mysqli_real_escape_string($conn, $_POST['visitor_message']);



   $cust_booking = mysqli_query($conn, "SELECT * FROM `customer` WHERE LENGTH(nama)=50") or die('query failed');

//        $message[] = 'successfully!';

      
//   }

   if(mysqli_num_rows($cust_booking) > 0){
    $message[] = 'Pesanan anda gagal, silahkan input kembali!';
}else{
       mysqli_query($conn, "INSERT INTO `customer`(Id_daisy,nama, email, alamat,no_hp,Jenis_layanan,message) VALUES(1,'$name', '$email','$Address','$phone','$room_preference','$visitor_message')") or die('query failed');
       $message[] = 'successfully!';
       header('location:order.php');

   }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
            <div class="message text-center p-5 bg-primary  text-light fw-bold fs-5">
                <span>' . $message . '</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
    ?>
    <!--navbar  -->
    <nav class="navbar navbar-expand-lg shadow-sm sticky-top ">
        <div class="container">
            <a class="text-decoration-none" href="../Beranda/Index.php"><img src="../asset/Logo.png"
                    alt="Daisy Laundry" /> <span class="fw-bold text-black-50">CEPAT & EFISIEN</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../Beranda/Index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Tentang Kami/about.php">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Layanan/layanan.php">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../Pesanan/order.php">Pemesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <form class="booking-form" action=" " method="post">

        <div class="elem-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="visitor_name" placeholder="Masukkan Nama" pattern="[A-Za-z\s]{3,20}"
                required />
        </div>
        <div class="elem-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="visitor_email" placeholder="Masukkan Email" required />
        </div>
        <div class="elem-group">
            <label for="phone">Nomor Telepon</label>
            <input type="number" id="phone" name="visitor_phone" placeholder="08123456789" />
            <!-- pattern="(\\d{4})-?\\s?(\\d{4})-?\\s?(\\d{4})" required /> -->
        </div>
        <div class="elem-group">
            <label for="Address">Alamat</label>
            <input type="text" id="Address" name="visitor_address" placeholder="Masukkan Alamat" />
        </div>
        <hr />
        <div class="elem-group">
            <label for="room-selection">Layanan</label>
            <select id="room-selection" name="room_preference" required>
                <option value="">Pilih Layanan</option>
                <option value="Kiloan">Laundry Kiloan</option>
                <option value="Satuan">Laundry Satuan</option>
                <option value="Boneka dan sepatu">Paket Boneka dan Sepatu</option>
            </select>
        </div>
        <hr />
        <div class="elem-group">
            <label for="message">Pesan Lainnya</label>
            <textarea id="message" name="visitor_message" placeholder="Tambahkan Pesan" required></textarea>
        </div>
        <button type="submit" name="book">Pesan Laundry</button>

    </form>

    <!-- end section home -->
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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>