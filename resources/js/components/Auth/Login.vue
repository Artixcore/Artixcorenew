<template>
    <div>
        <form @submit.prevent="login">
            <label>Email:</label>
            <input type="email" v-model="email" required>

            <label>Password:</label>
            <input type="password" v-model="password" required>

            <button type="submit">Login</button>
        </form>
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
  
  