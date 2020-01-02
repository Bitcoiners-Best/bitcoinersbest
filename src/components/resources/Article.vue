<template>
  <div>
    <!-- <div class="c-white" v-if="loading">Loading...</div> -->
    <div class="article-module d-flex br-4 mb-30 fade-in" v-for="resource in displayedArticles" :key="resource.id">
      <div class="flex-grow-1 align-self-center">
          <img :src="resource.image" class="card-img" alt="...">
          <h6 class="text-uppercase c-gray-1 medium mt-25 mb-15">TALES FROM THE CRYPT</h6>
          <router-link :to="'/'+resource.id+'/'+resource.title"><h5 class="medium mb-15 c-white">{{resource.title}}</h5></router-link>
          <h5 v-if="resource.description.length < 140" class="regular c-gray-1">{{resource.description}}</h5>
          <h5 v-else class="regular c-gray-1">{{ resource.description.substring(0,140) + "..." }}</h5>
      </div>
      <div class="align-self-top pl-20">
          <div class="votes text-center">
            <p class="c-white">{{resource.statusType}}</p>
            <b-button class="vote btn btn-transparent bg-brand icon-wrap" @click="upVote(resource.id, resource.vote_count)">

              <svg v-if="resource.statusType.id == '70'" id="ten-x" class="push-button" width="34" height="42" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.7 0.4L11.2 10.9C11.2 11.5 11.9 11.8 12.3 11.5L14.3 10.3C14.5 10.2 14.7 10.4 14.7 10.6L10.6 27.8C10.6 27.9 10.5 27.8 10.5 27.8L10.1 17.2C10.1 16.6 9.4 16.3 9 16.6L7 17.8C6.8 17.9 6.6 17.7 6.6 17.5L10.7 0.4C10.7 0.3 10.6 0.3 10.7 0.4ZM2.4 0L0 10.4C0 10.5 0.1 10.6 0.2 10.6L1.4 9.9C1.7 9.7 2.1 9.9 2.1 10.3L2.4 16.7H2.5L4.8 6.2C4.8 6.1 4.7 6 4.6 6L3.4 6.8C3.1 7 2.8 6.8 2.7 6.4L2.4 0ZM19.3 0L16.9 10.4C16.9 10.5 17 10.6 17.1 10.6L18.3 9.9C18.6 9.7 19 9.9 19 10.3L19.3 16.7H19.4L21.8 6.2C21.8 6.1 21.7 6 21.6 6L20.4 6.7C20.1 6.9 19.7 6.7 19.7 6.3L19.3 0Z" fill="#6F7C91"/>
              </svg>
              <svg v-else class="active push-button" width="12" height="42" viewBox="0 0 9 28" fill="none" xmlns="http://www.w3.org/2000/svg">
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

    <button type="button" class="btn" v-if="page != 1" @click="page--"> Back </button>
    <button type="button" class="btn" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
    <button type="button" class="btn" @click="page++"> Forward </button>

  </div>
</template>

<script>

  import axios from 'axios'

  export default {

      name: "Article",
      data: function () {
        return {
          resources: [],
          loading: true,
          page: 1,
          perPage: 20,
          pages: [],
        }
      },
      methods: {
        getArticles() {
          var self = this;
          axios.get("http://bitcoinersbest.local:9111/v1/items?access-token=admin-bandit-authkey&V1ResItemSearch[res_type_id]=30&page=1")
          .then(function(response){
            self.resources = response.data;
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          })
          .finally(() => this.loading = false);
        },
        setPages() {
            let numberOfPages = Math.ceil(this.resources.length / this.perPage);
            for (let index = 1; index <= numberOfPages; index++) {
            this.pages.push(index);
          }
        },
        paginate(resources) {
          let page = this.page;
          let perPage = this.perPage;
          let from = (page * perPage) - perPage;
          let to = (page * perPage);
          return resources.slice(from, to);
        },
        upVote(id) {
          var self = this;
          let config = {
            headers : {
              'Content-Type': 'application/x-www-form-urlencoded'
            }
          }

          var formData = new FormData();
          formData.append("res_item_id", id);
          formData.append("count", 1); // hardcoded count
          formData.append("user_id", 69);  // hardcoded user_id, update when twitter auth
          console.log(formData);
          console.log(id);

          axios.post('http://bitcoinersbest.local:9111/v1/res-votes?access-token=admin-bandit-authkey', formData, config)
          .then((response) => {
            console.log(vote_count);
            self.incrementVote(id, vote_count);
          })
          .catch(error => {
            console.log(error.response);
          });
        },
        increaseVote() {
          this.resource.vote_count++;
        }
      },
      computed: {
        displayedArticles () {
          return this.paginate(this.resources);
        },
        resultCount () {
          return this.resources && this.resources.length;
        }
      },
      watch: {
        resources() {
          this.setPages();
        }
      },
      created() {
        this.getArticles();
      }

  }

</script>

<style>
</style>
