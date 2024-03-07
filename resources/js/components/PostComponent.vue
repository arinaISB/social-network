<script>
import SinglePostComponent from "./SinglePostComponent.vue";
export default {
    name: "PostAndComponent",

    components: {
        SinglePostComponent
    },

    data() {
        return {
            'name' : 'Vasya'
        }
    },

    methods: {
        sayHello() {
            console.log('hello');
        },
        sayHi() {
            console.log('hi');
        },
    },
}
</script>

<template>
    <div>
        <single-post-component></single-post-component>
<!--        <SinglePostComponent></SinglePostComponent>можно и так-->
    </div>
    <div>Name: {{ name }}</div>
    <button @click="sayHello">Hellllo</button>

</template>

<style scoped>

</style>
