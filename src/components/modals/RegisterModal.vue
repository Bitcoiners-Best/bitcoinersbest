<template>
  <b-modal hide-footer id="register-modal" centered title="RegisterModal">
    <h2 class="mb-30 c-white">Upvote</h2>
    <h6 class="mb-30 c-gray-1">You must be logged in to upvote.</h6>
    <router-link to="/signup" class="btn btn-rect-lg btn-block mb-20 push-button">Join</router-link>
    <router-link to="/login" class="link medium close-modal">Login</router-link>
    <button @click.prevent="close"
 class="mt-3 border-b border-teal font-semibold">Close</button>
  </b-modal>
</template>

<script>
  export default {
      name: 'Register'
  }
</script>

<style>
</style>
