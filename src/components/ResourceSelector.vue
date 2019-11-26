<template>
  <div class="scrolling-wrapper">
    <div class="section-selector">
        <div class="d-flex justify-content-center text-uppercase">
            <!-- Hard coded for now -->
            <router-link to="/podcast" :class="[currentPage.includes('podcast') ? activeClass : '', 'module-navigation-element']">Podcast</router-link>
            <router-link to="/episode" :class="[currentPage.includes('episode') ? activeClass : '', 'module-navigation-element']">Episode</router-link>
            <router-link to="/article" :class="[currentPage.includes('article') ? activeClass : '', 'module-navigation-element']">Article</router-link>
            <router-link to="/book" :class="[currentPage.includes('book') ? activeClass : '', 'module-navigation-element']">Book</router-link>
            <router-link to="/thread" :class="[currentPage.includes('threads') ? activeClass : '', 'module-navigation-element']">Threads</router-link>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        data() {
          return {
            activeClass: 'active'
          };
        },
        computed: {
          currentPage() {
            return this.$route.path;
          }
        }
    }
</script>

<style>

</style>
