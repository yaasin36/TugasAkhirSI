<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Marabunta Money</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/landingPage/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/landingPage/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/landingPage/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landingPage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landingPage/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landingPage/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landingPage/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/landingPage/css/style.css')}}" rel="stylesheet">
</head>

<body>

   <!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1><a href="#">Marabunta Money</a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link" href="#">Home</a></li>
                <li><a class="nav-link" href="#features">Features</a></li>
                <li><a class="nav-link" href="#information">Information</a></li>
                <li><a class="nav-link" href="#contact">Contact</a></li>
                <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section class="hero-section" id="hero">
    <div class="wave">
        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
                </g>
            </g>
        </svg>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 hero-text-image">
                <div class="row">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="animated-title" data-aos="fade-right">Website Pencatatan Keuangan</h1>
                        <p class="mb-5 animated-text" data-aos="fade-right" data-aos-delay="100">Marabunta Money adalah platform online ramah pengguna yang dirancang untuk membantu individu dan bisnis mengelola keuangan mereka secara efisien. Situs web ini menawarkan berbagai alat untuk penganggaran, pelacakan pengeluaran, dan perencanaan keuangan. Pengguna dapat dengan mudah mencatat dan mengkategorikan pendapatan dan pengeluaran mereka, menghasilkan laporan keuangan terperinci, dan menetapkan tujuan keuangan pribadi atau bisnis.</p>
                        <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="{{ route('register') }}" class="btn btn-primary btn-custom">Get started</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <main id="main">

        <!-- ======= Dashboard Section ======= -->
        <section class="section" id="features">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-6" data-aos="fade-up">
                        <h2 class="section-heading">Kelola Keuangan Anda dengan Marabunta Money</h2>
                        <p class="section-description">Website kami memudahkan untuk melacak pengeluaran, menganggarkan secara efektif, dan menganalisis keuangan Anda.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
                        <div class="feature-1 text-center shadow-sm p-4 rounded">
                            <div class="wrap-icon icon-trapezoid mb-4">
                                <i class="bi bi-bank display-4 text-primary"></i>
                            </div>
                            <h3 class="mb-3">Pelacakan Pengeluaran dan Pendapatan</h3>
                            <p class="text-muted">Catat transaksi harian dengan mudah untuk melacak pendapatan dan pengeluaran Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-1 text-center shadow-sm p-4 rounded">
                            <div class="wrap-icon icon-trapezoid mb-4">
                                <i class="bi bi-currency-dollar display-4 text-success"></i>
                            </div>
                            <h3 class="mb-3">Budgeting Tools</h3>
                            <p class="text-muted">Buat dan kelola anggaran untuk memantau pengeluaran Anda dan berhemat dengan lebih efisien.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-1 text-center shadow-sm p-4 rounded">
                            <div class="wrap-icon icon-trapezoid mb-4">
                                <i class="bi bi-bar-chart display-4 text-info"></i>
                            </div>
                            <h3 class="mb-3">Laporan keuangan</h3>
                            <p class="text-muted">Hasilkan laporan komprehensif untuk menganalisis kesehatan keuangan Anda dan membuat keputusan yang tepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <section class="section" id="information">
    <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade">
            <div class="col-md-6 mb-5">
                <img src="{{asset('assets/landingPage/img/pt2.png')}}" alt="Image" class="img-fluid rounded shadow">
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="step p-4 bg-light rounded shadow" data-aos="fade-up">
                    <div class="step-icon mb-3">
                        <span class="number">01</span>
                    </div>
                    <h3 class="mb-3">Sign Up</h3>
                    <p>Mulailah perjalanan Anda menuju pengelolaan keuangan yang lebih baik dengan mengklik tombol "Daftar". Masukkan email Anda, buat kata sandi kuat yang aman, dan konfirmasikan kata sandi untuk memulai.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="step p-4 bg-light rounded shadow" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-icon mb-3">
                        <span class="number">02</span>
                    </div>
                    <h3 class="mb-3">Create Profile</h3>
                    <p>Jika Anda belum memiliki akun, Anda akan diarahkan ke halaman pendaftaran. Isi informasi pribadi Anda seperti alamat email, dan kata sandi yang aman. Setelah itu, klik "Daftar" untuk membuat akun baru Anda.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="step p-4 bg-light rounded shadow" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-icon mb-3">
                        <span class="number">03</span>
                    </div>
                    <h3 class="mb-3">Enjoy the Website</h3>
                    <p>Setelah pendaftaran selesai, Anda bisa langsung menikmati semua fitur Marabunta Money. Nikmati pengalaman pengguna yang intuitif dan alat yang dirancang untuk membantu Anda mencapai tujuan keuangan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>


        <!-- ======= CTA Section ======= -->
        <section class="section cta-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
                        <h2>Mulai dengan Marabunta Money</h2>
                    </div>
                    <div class="col-md-5 text-center text-md-end">
                        <p><a href="{{ route('register') }}" class="btn d-inline-flex align-items-center"><i class="bi bi-person-plus"></i><span>Register</span></a> <a href="{{route('login')}}" class="btn d-inline-flex align-items-center"><i class="bi bi-box-arrow-in-right"></i><span>Login</span></a></p>
                    </div>
                </div>
            </div>
        </section><!-- End CTA Section -->
    </main>
    <!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer class="footer" role="contentinfo" id="contact">
            <div class="container">
                <div class="row">
                    <!-- About Section -->
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h3>Tentang Marabunta Money</h3>
                        <p>Marabunta Money adalah platform online ramah pengguna yang dirancang untuk membantu individu dan bisnis mengelola keuangan mereka secara efisien. Situs web ini menawarkan berbagai alat untuk penganggaran, pelacakan pengeluaran, dan perencanaan keuangan. Pengguna dapat dengan mudah mencatat dan mengkategorikan pendapatan dan pengeluaran mereka, menghasilkan laporan keuangan terperinci, dan menetapkan tujuan keuangan pribadi atau bisnis.</p>
                        <div class="social-icons">
                            <a href="#"><span class="bi bi-instagram"></span></a>
                        </div>
                    </div>
                    <!-- Navigation and Resources Section -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h3 class="text-center">Navigation</h3>
                                <ul class="navigation-links text-center">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#features">Features</a></li>
                                    <li><a href="#information">Information</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h3>Contact Us</h3>
                                <ul class="contact-details">
                                    <li><strong>Address:</strong><br>Semarang, Indonesia</li>
                                    <li><strong>Email:</strong> support@marabuntamoney.com</li>
                                    <li><strong>Phone:</strong> 085226428266</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


            <!-- Copyright Section -->
            <div class="row justify-content-center text-center mt-4">
                <div class="col-md-7">
                    <p class="copyright">&copy; Copyright Marabunta Money. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/landingPage/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/landingPage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/landingPage/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/landingPage/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('assets/landingPage/js/main.js')}}"></script>
</body>

</html>
