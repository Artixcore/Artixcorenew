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
                            <h2>Register</h2>

                            <form @submit.prevent="registerUser">
                                <div class="mb-3">
                                    <label for="Name" class="form-label">Name</label>
                                    <input v-model="formData.name" class="form-control" type="text" placeholder="Name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input v-model="formData.email" class="form-control" type="email" placeholder="Email"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Password</label>
                                    <input v-model="formData.password" class="form-control" type="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-success" type="submit">Register</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0 text-center">
                                    <router-link style="text-decoration: none;" to="/Login">Already have an
                                        account?</router-link>
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
import axios from 'axios';

export default {
    data() {
        return {
            formData: {
                name: '',
                email: '',
                password: '',
            },
        };
    },
    methods: {
        registerUser() {
            axios.post('/register', this.formData)
                .then(response => {
                    // Redirect to the dashboard using router.push
                    router.push('/');
                    console.log(response.data.message);
                    // You can redirect or show a success message here
                })
                .catch(error => {
                    console.error(error);
                    // Handle errors and display messages accordingly
                });
        },
    },
};

</script>
