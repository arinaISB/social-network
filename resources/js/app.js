// import Vue from 'vue'
// import ExampleComponent from "./components/ExampleComponent.vue";
//
// import './bootstrap';
//
// const app = new Vue({
//     el: '#app',
//
//     components: {
//         ExampleComponent,
//     }
// })

import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import PostComponent from "./components/PostComponent.vue";
app.component('post-component', PostComponent);

app.mount('#app');
