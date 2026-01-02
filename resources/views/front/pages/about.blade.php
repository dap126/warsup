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
                <h1 class="display-4 text-uppercase mb-3 animated slideInDown">About</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                        <li class="breadcrumb-item text-white">Home</li>
                        <li class="breadcrumb-item text-white">Pages</li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 pb-0 pb-lg-5 py-5">
                    <div class="pb-0 pb-lg-5 py-5">
                        <div class="title wow fadeInUp" data-wow-delay="0.1s">
                            <div class="title-left">
                                <h5>History</h5>
                                <h1>About Warsup</h1>
                            </div>
                        </div>
                        <p class="mb-4 wow fadeInUp" data-wow-delay="0.2s">Tempor erat elitr rebum at clita. Diam dolor
                            diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet
                            lorem sit clita duo justo magna dolore erat amet. Stet no et lorem dolor et diam, amet duo
                            ut dolore vero eos.</p>
                        <ul class="list-group list-group-flush mb-5 wow fadeInUp" data-wow-delay="0.3s">
                            <li class="list-group-item bg-dark text-body border-secondary ps-0">
                                <i class="fa fa-check-circle text-primary me-1"></i> Lorem ipsum dolor sit amet
                                consectetur elit.
                            </li>
                            <li class="list-group-item bg-dark text-body border-secondary ps-0">
                                <i class="fa fa-check-circle text-primary me-1"></i> Donec vehicula, sem ut tempus
                                tempus.
                            </li>
                            <li class="list-group-item bg-dark text-body border-secondary ps-0">
                                <i class="fa fa-check-circle text-primary me-1"></i> Morbi mi dapibus, feugiat nisi non
                                mollis justo.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.5s">
                    <img class="img-fluid" src="img/warsuphouse3.jpeg" alt="" width="400">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    @include('front.footer')
</body>

</html>