<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <!--navbar  -->
    <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
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
                        <a class="nav-link active" aria-current="page" href="../Beranda/Index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Tentang Kami/about.php">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Layanan/layanan.php">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../Pesanan/order.php">Pemesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- section home -->
    <section id="home">
        <div class="carousel">
            <div class="hero-section">
                <img class="img-fluid" src="../asset/laundry2.jpeg" alt="" />
                <div class="carousel-caption text-center">
                    <h2>Laundry Express Selesai Dalam 3 Jam</h2>
                    <p>Pick Up & Delivery, Cek Drive Online Terdekat Di Lokasi Anda GRATIS ONGKIR (6-10 am - 6-10 pm)
                    </p>
                </div>
            </div>
        </div>
        <!-- section about -->
        <div class="container-fluid pt-5 pb-5" style="background-color:antiquewhite ;">
            <h2 class="text-center">Tentang Kami</h2>
            <div class="row mt-3">
                <div class="col-lg-5">
                    <img class="h-100 w-100" src="../asset/laundry4.jpeg" alt="" />
                </div>
                <div class="col-lg-6">
                    <p style="text-align: justify">
                        Daisy Laundry adalah toko laundry yang telah menjadi pilihan utama bagi penduduk setempat untuk
                        kebutuhan pencucian mereka. Dengan lokasi strategis di pusat kota, toko ini telah menjalani
                        perjalanan panjang sejak didirikan.
                        <br />
                        Daisy Laundry dikenal luas karena berkomitmen untuk memberikan layanan pencucian terbaik dengan
                        kualitas yang tinggi. Toko ini didirikan dengan visi untuk menjawab kebutuhan masyarakat akan
                        layanan pencucian yang andal,
                        efisien, dan terjangkau. <br />
                        Dalam upaya mencapai tujuan ini, Daisy Laundry telah mengadopsi teknologi modern dalam proses
                        pencucian, yang menghasilkan pakaian yang bersih, harum, dan terawat dengan baik. Mesin-mesin
                        canggih dan produk pembersih ramah
                        lingkungan digunakan untuk memastikan pencucian yang efisien tanpa merusak lingkungan.
                    </p>
                    <a class="btn btn-primary" href="../Tentang Kami/about.php"> Selengkapnya</a>
                </div>
            </div>

        </div>
        <!-- layanan -->
        <!-- <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
            <path  fill="#000" fill-opacity="1"
                d="M0,96L48,90.7C96,85,192,75,288,90.7C384,107,480,149,576,170.7C672,192,768,192,864,160C960,128,1056,64,1152,64C1248,64,1344,128,1392,160L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg> -->
        <div class="container-fluid mt-5 pb-5 ">
            <h2 class="text-center pb-4">Layanan Kami</h2>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="card mb-2">
                        <div class="card-body ">
                            <h5 class="card-text text-center">Paket Laundry Kiloan</h5>
                            <p class="card-text">Dalam paket ini, Anda dapat dengan mudah mencuci pakaian sehari-hari
                                Anda dalam jumlah yang signifikan.</p>
                            <a href="../Layanan/layanan.php#Kilo" class="card-link text-decoration-none">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-text text-center">Paket Laundry Satuan</h5>
                            <p class="card-text">Untuk pakaian yang memerlukan perawatan khusus atau yang memiliki
                                instruksi pencucian yang spesifik</p>
                            <a href="../Layanan/layanan.php#Satuan" class="card-link text-decoration-none">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-text text-center">Paket Boneka & Sepatu</h5>
                            <p class="card-text">Layanan ini dirancang khusus untuk membersihkan, merawat, dan
                                memperbaiki boneka dan merestorasi sepatu Anda</p>
                            <a href="../Layanan/layanan.php#Boneka" class="card-link text-decoration-none">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
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
</body>

</html>