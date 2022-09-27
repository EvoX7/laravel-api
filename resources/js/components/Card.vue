<template>
  <div>
    <div class="card" style="width: 18rem">
      <img class="card-img-top" :src="posts.post_img" alt="Image" />
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <p class="card-subtitle">{{ post.user.name }}</p>
        <p class="card-text">{{ post.post_content }}</p>
        <p class="card-text">{{ post.post_date }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post"],
};
</script>

<style>
</style>