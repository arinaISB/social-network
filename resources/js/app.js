import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import FeedComponent from "./components/FeedComponent.vue";
import LoginComponent from "./components/LoginComponent.vue";
import HeaderComponent from "./components/HeaderComponent.vue";

app.component('feed-component', FeedComponent);
app.component('login-component', LoginComponent);
app.component('header-component', HeaderComponent);

app.mount('#app');
