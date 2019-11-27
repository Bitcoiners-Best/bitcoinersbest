<template>
  <div>
    <div class="article-module d-flex br-4 mb-30" v-for="resource in resources" :key="resource.id">
      <div class="flex-grow-1 align-self-center">
          <img :src="resource.image_url" class="card-img" alt="...">
          <h6 class="text-uppercase c-gray-1 medium mt-25 mb-15">TALES FROM THE CRYPT</h6>
          <a :href="resource.id"><h5 class="medium mb-15 c-white">{{resource.title}}</h5></a>
          <h5 class="regular c-gray-1">{{resource.description}}</h5>
      </div>
      <div class="align-self-top pl-20">
          <div class="votes text-center">
            <b-button class="vote btn btn-transparent bg-brand icon-wrap" v-b-modal.register-modal>
              <svg class="active push-button" width="12" height="42" viewBox="0 0 9 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.99984 0L-0.00015655 17.1C-0.100157 17.3 0.199843 17.5 0.399843 17.4L2.39984 16.2C2.89984 15.9 3.49984 16.2 3.49984 16.8L3.89984 27.4C3.89984 27.5 3.99984 27.5 3.99984 27.4L8.09984 10.2C8.19984 10 7.89984 9.8 7.69984 9.9L5.69984 11.1C5.19984 11.4 4.59984 11.1 4.59984 10.5L3.99984 0C3.99984 0 4.09984 0 3.99984 0Z" fill="#6F7C91"/>
              </svg>
            </b-button>
              <div class="vote-total" id="vote-total">
                <h6 class="medium mt-10 c-white">{{resource.vote_count}}</h6>
                <h6 class="vote-increment bg-brand c-black br-4" id="vote-increment">10</h6>
              </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>

  import axios from 'axios'

  export default {
      name: "App",
      components: {
      },
      data: function () {
        return {
          resources: [],
          loading: true,
        }
      },
      mounted() {
        this.getArticles();
      },
      methods: {
        getArticles() {
          var self = this;
          axios.get("http://bitcoinersbest.local:9111/v1/items?access-token=admin-bandit-authkey&V1ResItemSearch[res_type_id]=30")
          .then(function(res){
            self.resources = res.data;
            console.log('Data: ', res).data;
          })
          .catch(error => {
            console.log(error);
          })
          .finally(() => this.loading = false);
        }
      }
  }
</script>

<style>
</style>
