    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/home" class="nav-item nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a>
                <a href="/about" class="nav-item nav-link  {{ Request::is('/about') ? 'active' : '' }}">About</a>
                <a href="/courses" class="nav-item nav-link {{ Request::is('/courses') ? 'active' : '' }}">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="/team" class="dropdown-item {{ Request::is('/team') ? 'active' : '' }}">Our Team</a>
                        <a href="/testimonial" class="dropdown-item {{ Request::is('/testimonial') ? 'active' : '' }}">Testimonial</a>
                        <a href="/service" class="dropdown-item {{ Request::is('/service') ? 'active' : '' }}">Service</a>
                        <a href="/galeri" class="dropdown-item {{ Request::is('/galeri') ? 'active' : '' }}">Galeri</a>
                        <a href="/partners" class="dropdown-item {{ Request::is('/partners') ? 'active' : '' }}">Partners</a>
                    </div>
                </div>
                <a href="/contact/create" class="nav-item nav-link {{ Request::is('contact/create') ? 'active' : '' }}">Contact</a>
            </div>
            <a href="/contact/create" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
