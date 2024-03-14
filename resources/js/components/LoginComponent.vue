<template>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form @submit.prevent="handleLogin">
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" v-model="email" class="form-control" autocomplete="username" required>
                                    <span v-if="errors.email" class="text-danger">{{ errors.email }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" v-model="password" class="form-control" autocomplete="current-password" required>
                                    <span v-if="errors.password" class="text-danger">{{ errors.password}}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" v-model="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                                </div>
                            </form>
                        </div>
                        <div v-if="error" class="alert alert-danger">{{ error }}</div>
                        <div v-if="success" class="alert alert-success">{{ success }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref } from 'vue';
const email = ref('');
const password = ref('');
const errors = ref({});
const error = ref('');
const success = ref('');
const remember = ref(false);


const handleLogin = () => {
    console.log('handle axios login')
    axios.post('/api/login', {email: email.value, password: password.value})
        .then(response => {
            const token = response.data.token;
            localStorage.setItem('token', token);
            success.value = 'Api login successful';

            //костыль
            axios.post('/custom-login', {
                token: localStorage.getItem('token'),
                email: email.value,
                password: password.value
            })
                .then(response => {
                    window.location.href = '/feed';
                    console.log('Второй запрос выполнен успешно');
                })
                .catch(error => {
                    console.error('Second Login error:', error);
                });

        })
        .catch(error => {
            errors.value = error.response.data.errors;
            console.error('Login error:', error);
        });
}
</script>


<style scoped>
</style>
