<template>
  <div>
  <div class="c-white" v-if="loading">Loading...</div>
  <section class="detail mt-50 fade-in">
     <div class="section-header pt-20 pb-20 c-white text-center">
      <p>{{resource.id}}</p>
      <p>{{resource.title}}</p>

      <a target="_blank" class="c-white" :href="resource.url">Open Original Source</a>
      <p class="c-white">Created at <a href="">{{resource.created_at}}</a></p>

     </div>
   </section>
 </div>
</template>

<script>

  // todo:
  // clean up API call
  // hide all elements until page is entirely rendered
  // finish design & build out a clean view

  import axios from 'axios'

  export default {
      name: "resource",
      data: function () {
        return {
          resource: {},
          loading: true,
        }
      },
      methods: {
        getResource() {
          var self = this;
          axios.get("http://bitcoinersbest.local:9111/v1/items/"+this.$route.params.id+"?access-token=admin-bandit-authkey")
          .then(function(response){
            self.resource = response.data;
          })
          .catch(error => {
            console.log(error);
          })
          .finally(() => this.loading = false);
        }
      },
      created() {
        this.getResource();
      }
  }
</script>

<style scoped>

</style>
