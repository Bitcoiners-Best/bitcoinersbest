<template>
  <div class="scrolling-wrapper fade-in">
    <div class="section-selector">
        <div class="d-flex justify-content-center text-uppercase">
            <router-link to="/podcast" class="module-navigation-element">Podcast</router-link>
            <router-link to="/episode" class="module-navigation-element">Episode</router-link>
            <router-link to="/article" class="module-navigation-element">Article</router-link>
            <router-link to="/book" class="module-navigation-element">Book</router-link>
            <router-link to="/thread" class="module-navigation-element">Threads</router-link>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: 'Selector',
    }
</script>

<style>

</style>
