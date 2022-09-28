<template>
  <div>
    <div class="col-12">
      <div class="card mx-5 mt-5">
        <img class="card-img-top" :src="post.post_img" alt="Image" />
        <div class="card-body">
          <h5 class="card-title font-weight-bold">{{ post.title }}</h5>
          <p class="card-text">{{ post.post_content }}</p>
          <p class="card-text">Category:{{ post.category.name }}</p>
          <p class="card-subtitle">Tags: {{ post.tag.name }}</p>
          <p class="card-subtitle"> Post Date: {{ post.post_date }}</p>
        </div>
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

.card {
    width: 25rem;
}



</style>