<nav class="navbar navbar-expand-lg navbar-dark px-lg-5">
    <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
        <h2 class="mb-0 text-primary text-uppercase"></i>Warsup</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto p-4 p-lg-0">
            <a href="{{ route('front') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ route('article') }}" class="nav-item nav-link">Article</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
        </div>
        <div class="d-none d-lg-flex">
            <a class="btn btn-outline-primary border-2" href="#">Nongkrong Kuy
            </a>
        </div>
    </div>
</nav>