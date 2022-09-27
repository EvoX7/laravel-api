<template>
  <main>
    <h1>Posts:</h1>
    <Card />
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
};
</script>

<style>
</style>