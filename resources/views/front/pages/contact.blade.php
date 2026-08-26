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
                <h1 class="display-4 text-uppercase mb-3 animated slideInDown">Contact</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                        <li class="breadcrumb-item text-white">Home</li>
                        <li class="breadcrumb-item text-white">Pages</li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="title wow fadeInUp" data-wow-delay="0.1s">
                        <div class="title-left">
                            <h5>Contact</h5>
                            <h1>Contact us here</h1>
                        </div>
                    </div>
                    <h4 class="lh-base mb-4">Information</h4>
                    <table class="table table-dark mb-0 wow fadeInUp" data-wow-delay="0.3s">
                        <tr>
                            <td>PHONE</td>
                            <td>+0123456789</td>
                        </tr>
                        <tr>
                            <td>E-MAIL</td>
                            <td>info@example.com</td>
                        </tr>
                        <tr>
                            <td>ADDRESS</td>
                            <td>123 Street</td>
                        </tr>
                        <tr class="border-dark">
                            <td>FOLLOW US</td>
                            <td>
                                <a class="me-1" href="#!"><i class="fab fa-x-twitter"></i></a>
                                <a class="me-1" href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a class="me-1" href="#!"><i class="fab fa-youtube"></i></a>
                                <a class="me-1" href="#!"><i class="fab fa-linkedin-in"></i></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-secondary border-0" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-secondary border-0" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-secondary border-0" id="subject"
                                        placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-secondary border-0"
                                        placeholder="Leave a message here" id="message"
                                        style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-primary border-2 w-100 py-3" type="submit">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    @include('front.footer')
</body>

</html>
