<template>

  <nav id="w1" class="navbar navbar-expand-lg fixed-top navbar-light bg-black d-flex">

    <div class="container-fluid full">
      <router-link to="/index/vue" class="navbar-brand">
        <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 27.3171V10.0813L17.2358 0L34.4715 10.0813V29.5935L17.2358 40L2.27642 31.2195L12.6829 25.3659V30.2439L17.2358 32.8455V20.1626L5.52846 13.3333V18.8618L10.4065 21.4634L0 27.3171Z" fill="white"/>
        </svg><span class="ml-15">Bitcoiners Best</span>
      </router-link>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#w1-collapse" aria-controls="w1-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div id="w1-collapse" class="collapse navbar-collapse">
        <ul id="w2" class="navbar-nav navbar-right flex-grow-1 justify-content-end nav">
          <li class="nav-item align-self-center"><router-link to="/login" class="nav-link">Login</router-link></li>
          <li class="nav-item align-self-center"><router-link to="/signup" class="nav-link">Signup</router-link></li>

          <li class="nav-item align-self-center"><router-link to="/faq" class="nav-link">FAQ</router-link></li>
          <li class="nav-item align-self-center"><router-link to="/submit" class="nav-link">Submit</router-link></li>
          <li class="nav-item align-self-center"><a href="/profile/"><img class="profile-picture br-circle transition" src="https://avatars.io/twitter//small"/></a></li>
        </ul>
      </div>
    </div>

  </nav>

</template>

<script>
export default {
  data() {
    return {
      title: 'In The Header Component'
    }
  }
}
</script>

<style>
header {

}

</style>
