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

        <div class="page-header pb-5">
            <div class="container text-center py-5">
                <div class="text-center">
                    <div class="title wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 0px;">
                        <div class="title-center">
                            <h5>Pages</h5>
                            <h1>Article</h1>
                        </div>
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
                {{-- <div class="text-center">
                    <div class="title wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 0px;">
                        <div class="title-center">
                            <h5>Article</h5>
                            <h1>Trending</h1>
                        </div>
                    </div>
                </div> --}}
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
            </div>
            <hr>
            <div class="d-flex flex-row g-3 align-items-stretch p-4">
                <!-- LEFT BIG CARD -->
                
                <!-- RIGHT SMALL CARDS (SAME HEIGHT) -->
                <div class="col-lg-7 d-flex flex-column gap-3">
                    <h5>More information</h5>
                    <div class="small-card flex-fill">
                        <div class="small-card-bg" style="background-image:url('img/imgonline.jpg')"></div>
                        <div class="small-card-content" style="height: 200px;">
                            <h6>Enam Rekomendasi Gizi Terkait Kemasan Produk</h6>
                            <span>2 jam lalu</span>
                        </div>
                    </div>

                    <div class="small-card flex-fill">
                        <div class="small-card-bg" style="background-image:url('img/imgonline.jpg')"></div>
                        <div class="small-card-content" style="height: 200px;">
                            <h6>Sukses SEA Games 2025, Tim Canoe Indonesia</h6>
                            <span>3 jam lalu</span>
                        </div>
                    </div>

                    <div class="small-card flex-fill">
                        <div class="small-card-bg" style="background-image:url('img/imgonline.jpg')"></div>
                        <div class="small-card-content" style="height: 200px;">
                            <h6>Pasar Kerja Makin Ketat, Ini Tantangannya</h6>
                            <span>4 jam lalu</span>
                        </div>
                    </div>
                </div>
                <div class="mx-4" style="border-left: 1px solid #ccc; height: auto;"></div>
                <div class="d-flex flex-column gap-3 align-items-center">
                    <h5>Vidio</h5>
                    <div class="container-video">
                        <div class="video-card mb-3">
                            <div class="video-thumb">
                                <!-- IFRAME (tetap dipakai) -->
                                <iframe style="border-radius: 12px;"
                                    src="https://www.youtube.com/embed/ZEEK90EqMIE?si=vqI5ztl6fVU7fESD"
                                    allowfullscreen>
                                </iframe>

                                <!-- OVERLAY LINK -->
                                <a href="https://www.youtube.com/watch?v=ZEEK90EqMIE"
                                    target="_blank"
                                    class="video-overlay"
                                    aria-label="Open video on YouTube">
                                </a>
                            </div>
                            <div class="video-title">Initial Public Offering (IPO): Pengertian, Tujuan dan Keuntungan</div>
                            <div class="video-date">11 Des 2021</div>
                        </div>
                        <div class="video-card mb-3">
                            <div class="video-thumb">
                                <!-- IFRAME (tetap dipakai) -->
                                <iframe style="border-radius: 12px;"
                                    src="https://www.youtube.com/embed/Mdg5Z4PFQQA?si=DA9XoVRvD7ncGsrq"
                                    allowfullscreen>
                                </iframe>

                                <!-- OVERLAY LINK -->
                                <a href="https://www.youtube.com/watch?v=Mdg5Z4PFQQA"
                                    target="_blank"
                                    class="video-overlay"
                                    aria-label="Open video on YouTube">
                                </a>
                            </div>
                            <div class="video-title">Lo Belom Telat! Ini Cara Jadi Kaya di 2027</div>
                            <div class="video-date">30 Okt 2025</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Article End -->

    <!-- Footer Start -->
    @include('front.footer')
</body>

</html>