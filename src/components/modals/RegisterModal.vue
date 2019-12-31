<template>
  <b-modal hide-footer id="register-modal" centered title="">
    <h2 class="mb-30 c-white text-center">Upvote</h2>
    <h6 class="mb-30 c-gray-1 text-center">You must be logged in to upvote.</h6>
    <router-link to="/signup" class="btn btn-rect-lg btn-block mb-20 push-button" @click="hideModal()">Join</router-link>
    <router-link to="/login" class="link medium text-center" @click="hideModal()">Login</router-link>
  </b-modal>
</template>

<script>
  export default {
      name: 'Register',
      methods: {
        hideModal() {
          this.$refs['register-modal'].hide()
        }
      }
  }
</script>

<style>

</style>
