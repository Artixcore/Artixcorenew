<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Landing Page</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#hero-section" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Hero Section</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="hero-section" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.hero_section.title') }}">
                        <i class="bi bi-circle"></i><span>Title & Banner</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.hero_section.categories') }}">
                        <i class="bi bi-circle"></i><span>Categories</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#our-values" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Our Values</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="our-values" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.our_values.title') }}">
                        <i class="bi bi-circle"></i><span>Title</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.our_values.sections') }}">
                        <i class="bi bi-circle"></i><span>Sections</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('landing_page.about_us.title') }}">
                <i class="bi bi-person"></i>
                <span>About Us</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#our-services" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Our Services</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="our-services" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.our_services.title') }}">
                        <i class="bi bi-circle"></i><span>Title</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.our_services.services') }}">
                        <i class="bi bi-circle"></i><span>Services</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#testimonials" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Testimonials</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="testimonials" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.testimonials.title') }}">
                        <i class="bi bi-circle"></i><span>Title</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.testimonials.testimonials') }}">
                        <i class="bi bi-circle"></i><span>Testimonials</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#portfolio" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Portfolio</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="portfolio" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.portfolio.title') }}">
                        <i class="bi bi-circle"></i><span>Title</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.portfolio.projects') }}">
                        <i class="bi bi-circle"></i><span>Projects</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pricing" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Pricing</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pricing" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.pricing.title') }}">
                        <i class="bi bi-circle"></i><span>Title</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Plans</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#faq" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Frequently Asked Question</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="faq" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.faq.title') }}">
                        <i class="bi bi-circle"></i><span>Title</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.faq.faqs') }}">
                        <i class="bi bi-circle"></i><span>FAQs</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-heading">Services Page</li>
    </ul>
</aside><!-- End Sidebar-->
