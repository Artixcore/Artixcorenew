<style>
@import 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css';
</style>
<template>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form @submit.prevent="login" class="mb-3 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase ">Brand</h2>
                                <p class=" mb-5">Please enter your login and password!</p>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email address</label>
                                    <input type="email" class="form-control" v-model="email" required
                                        placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" v-model="password" required
                                        placeholder="Password">
                                </div>
                                <p class="small">
                                    <!-- <a class="text-primary" href="forget-password.html">Forgot password?</a> -->
                                </p>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">Login</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0  text-center">
                                    <router-link style="text-decoration: none;" to="/Register">Don't have an account?</router-link> 
                                    <!-- <a href="signup.html"
                                        class="text-primary fw-bold">Sign
                                        Up</a> -->
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            email: '',
            password: '',
            error: '',
        };
    },
    methods: {
        login() {
            // Prepare the data to send to the server
            const formData = {
                email: this.email,
                password: this.password,
            };

            // Make an API request to the Laravel backend
            axios.post('/api/login', formData)
                .then(response => {
                    // Handle successful login
                    // For example, you could redirect the user to a dashboard page
                    window.location.href = '/dashboard';
                })
                .catch(error => {
                    // Handle login error
                    this.error = 'Invalid credentials';
                });
        },
    },
};
</script>
  
  