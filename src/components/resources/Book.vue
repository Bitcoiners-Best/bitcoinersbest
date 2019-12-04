<template>
  <div>
    <div class="c-white" v-if="loading">Loading...</div>
    <div class="book-module d-flex br-4 mb-30" v-for="resource in resources" :key="resource.id">
        <div class="pr-20">
            <img :src="resource.image" class="ew-100 card-img" alt="...">
        </div>
        <div class="flex-grow-1 align-self-center">
            <h6 class="text-uppercase c-gray-1 medium mb-15">{{resource.created_by}}</h6>
            <router-link :to="'/'+resource.id+'/'+resource.title"<h5 class="medium c-white">{{resource.title}}</h5></router-link>
        </div>
        <div class="align-self-top pl-20">
          <div class="votes text-center">
              <button class="vote btn btn-transparent bg-brand icon-wrap">
                <svg class="push-button" width="12" height="42" viewBox="0 0 9 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.99984 0L-0.00015655 17.1C-0.100157 17.3 0.199843 17.5 0.399843 17.4L2.39984 16.2C2.89984 15.9 3.49984 16.2 3.49984 16.8L3.89984 27.4C3.89984 27.5 3.99984 27.5 3.99984 27.4L8.09984 10.2C8.19984 10 7.89984 9.8 7.69984 9.9L5.69984 11.1C5.19984 11.4 4.59984 11.1 4.59984 10.5L3.99984 0C3.99984 0 4.09984 0 3.99984 0Z" fill="#6F7C91"/>
                </svg>
                <h6 class="medium mt-10 c-white">{{resource.vote_count}}</h6>
              </button>
          </div>
        </div>
    </div>
  </div>
</template>

<script>

  import axios from 'axios'

  export default {
      name: "Book",
      components: {
      },
      data: function () {
        return {
          resources: [],
          loading: true,
        }
      },
      mounted() {
        this.getBooks();
      },
      methods: {
        getBooks() {
          var self = this;
          axios.get("http://bitcoinersbest.local:9111/v1/items?access-token=admin-bandit-authkey&V1ResItemSearch[res_type_id]=35")
          .then(function(res){
            self.resources = res.data;
          })
          .catch(error => {
            console.log(error);
          })
          .finally(() => this.loading = false);
          console.log(this.$route);
        }
      }
  }
</script>

<style>
</style>
