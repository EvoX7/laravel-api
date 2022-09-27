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
    // getDiskInfo: function () {
    //   axios
    //     .get("https://flynn.boolean.careers/exercises/api/array/music")
    //     .then((result) => {
    //       console.log(result.data.response);
    //       this.releases = result.data.response;
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