import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import FeedComponent from "./components/FeedComponent.vue";
app.component('feed-component', FeedComponent);

app.mount('#app');
