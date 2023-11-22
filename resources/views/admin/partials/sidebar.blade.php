<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#landing-page" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Landing Page</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="landing-page" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('landing_page.hero_section.title') }}">
                        <i class="bi bi-circle"></i><span>Hero Section</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.our_values.title') }}">
                        <i class="bi bi-circle"></i><span>Our Values</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.about_us.title') }}">
                        <i class="bi bi-person"></i><span>About Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.our_services.title') }}">
                        <i class="bi bi-circle"></i><span>Our Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.testimonials.title') }}">
                        <i class="bi bi-circle"></i><span>Testimonials</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.portfolio.title') }}">
                        <i class="bi bi-circle"></i><span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.pricing.title') }}">
                        <i class="bi bi-circle"></i><span>Pricing</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing_page.faq.title') }}">
                        <i class="bi bi-circle"></i><span>Frequently Asked Question</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside><!-- End Sidebar-->
