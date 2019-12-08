<template>
  <footer class="footer bg-black">
      <div class="container-fluid full">
        <div class="d-flex justify-content-center pb-50 pt-50">

          <h6>
            <router-link to="/terms" class="link-light medium">Terms</router-link>
            <router-link to="/privacy" class="link-light medium ml-40">Privacy</router-link>
          </h6>
        </div>
      </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      title: 'In The Footer Component'
    }
  }
}
</script>

<style>
header {

}

</style>
