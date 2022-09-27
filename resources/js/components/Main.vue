<template>
  <main>
    <h1 class="text-center mt-5 mb-5">Today's Post</h1>
    <div class="container">
        
      <div class="row justify-content-center">
          <Card v-for="post in posts" :key="post.id" :post="post"/>
        </div>
      </div>
  
  </main>
</template>

<script>
import Card from "./Card.vue";

export default {
  components: {
    Card,
  },

  data: function () {
    return {
      posts: [],
    };
  },

  methods: {
    getAllPosts() {
      axios
        .get("/api/posts")

        .then((response) => {
          console.log(response.data.results);
          this.posts = response.data.results;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getAllPosts();
  },
};
</script>

<style>
</style>