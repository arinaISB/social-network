import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import FeedComponent from "./components/FeedComponent.vue";
import LoginComponent from "./components/LoginComponent.vue";

app.component('feed-component', FeedComponent);
app.component('login-component', LoginComponent);

app.mount('#app');
