<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - FlexStart Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/land/assets/img/favicon.png" rel="icon">
    <link href="/land/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/land/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/land/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/land/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/land/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/land/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/land/assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="/dashboard/assets/img/logo.png" alt="">
                <h1 class="sitename">G-Rental</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dash') }}"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">Dashboard</a>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">Log
                                    in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}"
                                        class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">Register</a>
                                </li>
                            @endif
                            <div class="d-flex">
                            </div>
                        @endauth
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>


        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Kami Menyediakan Solusi Modern untuk Kebutuhan Transportasi Anda</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Kami adalah tim profesional yang menyediakan layanan
                            rental mobil terbaik untuk memenuhi kebutuhan perjalanan Anda</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="#about" class="btn-get-started">Mulai Sekarang <i
                                    class="bi bi-arrow-right"></i></a>
                            <a href="https://www.youtube.com/watch?v=Oxf8ULSB8yU"
                                class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                                    class="bi bi-play-circle"></i><span>Tonton Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="/land/assets/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->


        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Tentang Kami</h3>
                            <h2>Kami menyediakan layanan rental mobil yang terpercaya dan nyaman untuk memenuhi
                                kebutuhan transportasi Anda.</h2>
                            <p>
                                Kami berdedikasi untuk memberikan pengalaman sewa mobil terbaik dengan berbagai pilihan
                                kendaraan yang terawat dengan baik dan harga yang kompetitif. Kepercayaan dan kepuasan
                                pelanggan adalah prioritas utama kami.
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="/dash"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="/land/assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- /About Section -->


        <!-- Values Section -->
        <section id="values" class="values section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kendaraan Kami</h2>
                <p>Jelajahi berbagai kendaraan kami yang tersedia untuk dipesan.<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    @forelse ($kendaraan as $item)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <img src="{{ Storage::url($item->img) }}" class="card-img-top" width="300"
                                    height="300" alt="{{ $item->nama_kendaraan }}">
                                <div class="card-body">
                                    <h3>{{ $item->nama_kendaraan }}</h3>
                                    <p>{{ $item->deskripsi }}</p>
                                    <a href="/dash/user/kendaraan" class="btn btn-sm btn-primary">Booking
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="alert alert-warning" role="alert">
                                No vehicles available at the moment. Please check back later.
                            </div>
                        </div>
                    @endforelse
                    <!-- End Card Item -->

                </div>

            </div>

        </section><!-- /Values Section -->


        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $client }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Client Kami</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            {{-- <i class="bi bi-journal-richtext color-orange flex-shrink-0" style="color: #ee6c20;"></i> --}}
                            <i class="bi bi-car-front-fill"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $kendaraan->count() }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Kendaraan</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            {{-- <i class="bi bi-headset color-green flex-shrink-0" style="color: #15be56;"></i> --}}
                            <i class="bi bi-ticket-detailed"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $booking->count() }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Booking</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-people color-pink flex-shrink-0" style="color: #bb0852;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $user }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Pegawai Kami</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Our hard working team</p>
            </div><!-- End Section Title -->

            <div class="container justify-content-center">

                <div class="row gy-4">
                    @forelse ($admin as $item)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="team-member">
                                <div class="member-img">
                                    @if ($item->img == '')
                                        <img src="/land/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                                    @endif
                                    <img src="{{ Storage::url($item->img) }}" class="img-fluid" alt="">
                                    <div class="social">
                                        <a href="https://x.com/galsans12/" target="_blank"><i
                                                class="bi bi-twitter-x"></i></a>
                                        <a href="https://www.instagram.com/g4lihptra_/" target="_blank"><i
                                                class="bi bi-instagram"></i></a>
                                        <a href="https://github.com/Galsans" target="_blank"><i
                                                class="bi bi-github"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{ $item->name }}</h4>
                                    <span>CEO {{ $item->role }}</span>
                                    <p>{{ $item->about }}</p>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @empty
                    @endforelse

                </div>

            </div>

        </section><!-- /Team Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Jl. Kalibata Timur I No.5, RT.11/RW.4, Rawajati, Kec. Pancoran, Kota Jakarta
                                        Selatan, </p>
                                    <p>Daerah Khusus Ibukota Jakarta 12750</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>+62 881-024345979</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>galihputra2.441@gmail.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="500">
                                    <i class="bi bi-clock"></i>
                                    <h3>Open Hours</h3>
                                    <p>Monday - Friday</p>
                                    <p>9:00AM - 05:00PM</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>
                    <!-- End Page Title -->

                    <div class="col-lg-6">
                        <form action="{{ route('message.store') }}" method="post" data-aos="fade-up"
                            data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject"
                                            placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- End Contact Form -->


                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">Galsans</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Kalibata Timur I No.5, RT.11/RW.4, Rawajati, Kec. Pancoran, Kota Jakarta Selatan, </p>
                        <p>Daerah Khusus Ibukota Jakarta 12750</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+62 881-024345979</span></p>
                        <p><strong>Email:</strong> <span>galihputra2.441@gmail.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium deleniti quia asperiores ut
                        reiciendis at!</p>
                    <div class="social-links d-flex">
                        <a href="https://x.com/galsans12/" target="_blank"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.instagram.com/g4lihptra_/" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                        <a href="https://github.com/Galsans" target="_blank"><i class="bi bi-github"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Galsans</strong> <span>All Rights
                    Reserved</span></p>
        </div>

    </footer>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if there's a success message in the session
            const successMessage = '{{ session('success') }}';

            // If success message exists, display it using JavaScript alert
            if (successMessage) {
                alert(successMessage);
            }
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="/land/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/land/assets/vendor/php-email-form/validate.js"></script>
    <script src="/land/assets/vendor/aos/aos.js"></script>
    <script src="/land/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/land/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/land/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/land/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/land/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/land/assets/js/main.js"></script>

</body>

</html>
