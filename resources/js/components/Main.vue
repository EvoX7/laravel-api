<template>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Posts:</h1>
          <Card v-for="post in allPosts" :key="post.id" :post="post" />
        </div>
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
      allPosts: [],
    };
  },

  methods: {
    getAllPosts() {
      axios
        .get("/api/posts")

        .then((response) => {
          console.log(response.data.results);
          this.allPosts = response.data.results;
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