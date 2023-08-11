<template>
  <header class="transparent-header bg-transparent">
    <div class="navbar-default">
      <!-- start top search -->
      <div class="top-search bg-black-opacity-light">
        <div class="container lg-container">
          <!-- <form class="search-form" @submit.prevent="search" accept-charset="utf-8">
            <div class="input-group">
              <span class="input-group-addon cursor-pointer">
                <button class="search-form_submit fas fa-search text-white" type="submit"></button>
              </span>
              <input v-model="searchQuery" type="text" class="search-form_input form-control" name="s" autocomplete="off"
                placeholder="Type & hit enter...">
              <span class="input-group-addon close-search" @click="closeSearch"><i class="fas fa-times mt-2"></i></span>
            </div>
          </form> -->
        </div>
      </div>
      <!-- end top search -->

      <div class="container lg-container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-12">
            <div class="menu_area alt-font">
              <!-- <nav class="navbar navbar-expand-lg navbar-light p-0">

                <div class="navbar-header navbar-header-custom"> -->
                  <!-- start logo -->
                  <router-link to="index" class="navbar-brand"><img id="logo" src="img/logos/logo.png"
                      alt="logo"></router-link>
                  <!-- end logo -->
                </div>
vbnvb
                <!-- <div class="navbar-toggler" @click="toggleMenu"></div> -->

                <!-- start menu area -->
                <!-- <ul class="navbar-nav ms-auto" :style="{ display: isMenuOpen ? 'block' : 'none' }" id="nav"> -->
                  <!-- ... Menu items here ... -->
                <!-- </ul> -->
                <!-- end menu area -->

                <!-- start attribute navigation -->
                <!-- <div class="attr-nav">
                  <ul>
                    <li class="dropdown me-3 me-lg-0">
                      <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-primary">3</span>
                      </a>
                      <ul class="dropdown-menu cart-list"> -->
                        <!-- ... Cart items here ... -->
                      <!-- </ul>
                    </li> -->
                    <!-- <li class="search"><a href="#!" @click="openSearch"><i class="fas fa-search"></i></a></li> -->
                  <!-- </ul> -->
                </div>
                <!-- end attribute navigation -->

              <!-- </nav> -->
            </div>
          </div>
        </div>
      <!-- </div>
    </div> -->
  </header>
</template>
<!-- <script>
export default {
  data() {
    return {
      isMenuOpen: false,
      searchQuery: '',
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    search() {
      // Perform search logic here
      console.log('Searching for:', this.searchQuery);
    },
    openSearch() {
      // Handle opening search here
      console.log('Opening search');
    },
    closeSearch() {
      // Handle closing search here
      console.log('Closing search');
    },
  },
};
</script> -->

<style>
@import './assets/css/plugins.css';
@import '../assets/search/search.css';
@import 'assets/quform/css/base.css';
</style>