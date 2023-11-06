<template>
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </section><!-- End Top Bar -->

    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <router-link style="text-decoration: none;" to="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Impact<span>.</span></h1>
            </router-link>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><router-link style="text-decoration: none;" to="/">Home</router-link></li>
                    <li><router-link style="text-decoration: none;" to="/services">Services</router-link></li>
                    <li><router-link style="text-decoration: none;" to="/portfolio">Portfolio</router-link></li>
                    <li class="dropdown">
                        <a href="#"><span>Our Software</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>

                            <li class="dropdown">
                                <a href="#"><span>POS</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">Supershop</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Pharmecy</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Delivery</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Elecrtonic or Mobile, PC Shop</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Service Center</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Restaurant</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Hospital</router-link></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#"><span>CRM</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">Startup</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Corporate Office</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Enterprise</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Hospital</router-link></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#"><span>CMS</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">Startup</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Corporate Office</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Enterprise</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Hospital</router-link></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>AI Products</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>

                            <li class="dropdown">
                                <a href="#"><span>ChatBot</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">E-Commerce</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Startup</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Corporate Office</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Enterprise</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Hospital</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Pharmecy</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Delivery</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Elecrtonic or Mobile, PC Shop</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Service Center</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Restaurant</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Hospital</router-link></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#"><span>Coding Support</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">VS Code Extentions</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Text to Programming</router-link></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#"><span>TradingBot</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">Forex</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Crypto Currency</router-link></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#"><span>Education / AI Tutor</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">Math</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Science</router-link></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#"><span>Media</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">Video Editor / Maker</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Image Generation</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Text / Script Generation</router-link></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#"><span>Engineeering</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><router-link style="text-decoration: none;" to="#">Architecture</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">PCB Design</router-link></li>
                                    <li><router-link style="text-decoration: none;" to="#">Semiconductor Design</router-link></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li><router-link style="text-decoration: none;" to="/login">Login</router-link></li>
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
</template>

<style>
@import 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap';
@import 'assets/vendor/bootstrap/css/bootstrap.min.css';
@import 'assets/vendor/bootstrap-icons/bootstrap-icons.css';
@import 'assets/vendor/aos/aos.css';
@import 'assets/vendor/glightbox/css/glightbox.min.css';
@import 'assets/vendor/swiper/swiper-bundle.min.css';
@import 'assets/css/main.css';
</style>
