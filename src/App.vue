<template>
  <div class="wrap">
    <app-header />
    <div class="container-fluid">

        <router-view>
        </router-view>

        <app-footer />
    </div>
  </div>
</template>

<script>
    import Header from './components/Header.vue';
    import Footer from './components/Footer.vue';

    import axios from 'axios'


    export default {
        name: "App",
        components: {
          'app-header': Header,
          'app-footer': Footer
        },
        data: function () {
          return {

          }

        },
        mounted() {

        },
        methods: {

        },

    }
</script>

<style>

</style>
