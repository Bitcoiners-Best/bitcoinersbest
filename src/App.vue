<template>
  <div class="wrap">
    <app-header />
    <div class="container-fluid">
        <resource-selector v-if="['article', 'thread', 'index', 'podcast', 'episode', 'book'].includes($route.name)"/>
        <register-modal />
        <invoice-modal />

        <router-view></router-view>

        <!-- <b-button v-b-modal.invoice-modal>Trigger Invoice Modal</b-button> -->

        <app-footer />
    </div>
  </div>
</template>

<script>
    import Header from './components/layout/Header.vue';
    import Footer from './components/layout/Footer.vue';
    import ResourceSelector from './components/ResourceSelector.vue';

    import InvoiceModal from './components/modals/InvoiceModal.vue';
    import RegisterModal from './components/modals/RegisterModal.vue';


    export default {
        name: "App",
        components: {
          'app-header': Header,
          'app-footer': Footer,
          'resource-selector': ResourceSelector,
          'invoice-modal': InvoiceModal,
          'register-modal': RegisterModal
        },
        data: function () {
          return {
            loading: true,
          }
        },
        methods: {
        }
    }
</script>

<style>

</style>
