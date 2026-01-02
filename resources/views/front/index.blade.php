<!DOCTYPE html>
<html lang="en">

@include('front.header')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Header Start -->
    <div class="container-fluid p-0">
        @include('front.navbar')

        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/back1.jpeg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="title mx-5 px-5 animated slideInDown">
                            <div class="title-center">
                                <h5>Welcome</h5>
                                <h1 class="display-1">Warsup Media</h1>
                            </div>
                        </div>
                        <p class="fs-5 mb-5" style="width: 80%;">Warsup Media provide article management and services to support the growth of brands, businesses, and communities in the digital world.</p>
                        <a href="#about" class="btn btn-outline-primary border-2 py-3 px-5 smoothscroll">Explore
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Article Start -->
    <div class="container-fluid bg-secondary" id="about">
        <div class="container">
            <div class="row g-3 align-items-stretch p-4">
                <div class="text-center">
                    <div class="title wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 0px;">
                        <div class="title-center">
                            <h5>Article</h5>
                            <h1>Trending</h1>
                        </div>
                    </div>
                </div>
                <!-- LEFT BIG CARD -->
                <div class="col-lg-8">
                    <div class="news-card">
                        <!-- BACKGROUND IMAGE -->
                        <div class="news-card-bg" style="background-image:url('img/imgonline.jpg')"></div>
                        <!-- CONTENT -->
                        <div class="news-overlay">
                            <h3>Mahfud MD: Perpol 10/2025 Langgar Putusan MK dan Konstitusi</h3>
                            <span class="mt-2">1 jam lalu</span>
                            <p class="mt-2 mb-0">
                                Mahfud MD menilai peraturan tersebut bertentangan dengan putusan MK.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- RIGHT SMALL CARDS (SAME HEIGHT) -->
                <div class="col-lg-4 d-flex flex-column gap-3">
                    <div class="small-card flex-fill">
                        <div class="small-card-bg" style="background-image:url('img/imgonline.jpg')"></div>
                        <div class="small-card-content">
                            <h6>Enam Rekomendasi Gizi Terkait Kemasan Produk</h6>
                            <span>2 jam lalu</span>
                        </div>
                    </div>

                    <div class="small-card flex-fill">
                        <div class="small-card-bg" style="background-image:url('img/imgonline.jpg')"></div>
                        <div class="small-card-content">
                            <h6>Sukses SEA Games 2025, Tim Canoe Indonesia</h6>
                            <span>3 jam lalu</span>
                        </div>
                    </div>

                    <div class="small-card flex-fill">
                        <div class="small-card-bg" style="background-image:url('img/imgonline.jpg')"></div>
                        <div class="small-card-content">
                            <h6>Pasar Kerja Makin Ketat, Ini Tantangannya</h6>
                            <span>4 jam lalu</span>
                        </div>
                    </div>
                </div>
                <a href="article.html" class="btn btn-outline-primary border-2 py-3 px-5">More Article</a>
            </div>
            
        </div>
    </div>
    <!-- Article End -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Services</h5>
                        <h1>How We Help You</h1>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="img/SFI4.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">sports field installation</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="img/eo.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Event Organization</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="img/banksampah2.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Waste Bank</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="img/pekerjalepas.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">full-time freelancer</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5 bg-secondary">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Partnership</h5>
                        <h1>Our Partner</h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/partner1.png' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Maternal Disaster</h5>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/partner2.png' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Eiger</h5>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/partner3.jpg' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Trasher</h5>
                    <span class="text-primary">Profession</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    @include('front.footer')
</body>

</html>