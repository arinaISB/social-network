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

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app');
