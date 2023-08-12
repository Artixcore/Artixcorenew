<template>
    <header class="transparent-header bg-transparent">
        <div class="navbar-default">
            <div class="top-search bg-black-opacity-light">
                <div class="container lg-container">
                    <form class="search-form" action="" method="GET" accept-charset="utf-8">
                        <div class="input-group">
                            <span class="input-group-addon cursor-pointer">
                                <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                            </span>
                            <input type="text" class="search-form_input form-control" name="s" autocomplete="off"
                                placeholder="Type & hit enter...">
                            <span class="input-group-addon close-search"><i class="fas fa-times mt-2"></i></span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container lg-container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-12">
                        <div class="menu_area alt-font">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">
                                <div class="navbar-header navbar-header-custom">
                                    <router-link style="text-decoration: none;" to="/" class="navbar-brand">
                                        <!-- <img id="logo" src="img/logos/logo.png" alt="logo"> -->
                                        <h3> Artixcore </h3>
                                    </router-link>
                                </div>

                                <div class="navbar-toggler"></div>

                                <ul class="navbar-nav ms-auto" id="nav">
                                    <li class="nav-item"><router-link to="#!" style="color:black; text-decoration: none;">Home</router-link></li>
                                    <li class="nav-item">
                                        <router-link to="#!" style="color:black; text-decoration: none;">Our Softwares</router-link>
                                        <ul class="submenu">
                                            <li><router-link style="color:black; text-decoration: none;" to="">POS Pro</router-link></li>
                                            <li><router-link style="color:black; text-decoration: none;" to="">Nuclear</router-link></li>
                                            <li><router-link style="color:black; text-decoration: none;" to="">HRM</router-link></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <router-link to="#!" style="color:black; text-decoration: none;">AI Products</router-link>
                                        <ul class="submenu">
                                            <li><router-link style="color:black; text-decoration: none;" to="">Forex Trading Bot</router-link></li>
                                            <li><router-link style="color:black; text-decoration: none;" to="">Crypto Trading Bot</router-link></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><router-link to="/Login" style="color:black; text-decoration: none;">Login</router-link></li>
 
                                </ul>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header></template>
  
<style>@import "./assets/css/plugins.css";
@import "./assets/search/search.css";
@import "./assets/quform/css/base.css";
@import "./assets/css/styles.css";</style>