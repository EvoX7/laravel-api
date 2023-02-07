<template>
  <div>
   
      <div class="card mx-5 mt-5">
        <img class="card-img-top" :src="post.post_img" alt="Image" />
        <div class="card-body">
          <h5 class="card-title font-weight-bold">{{ post.title }}</h5>
          <p class="card-text">{{ post.post_content }}</p>

          <h6 class="card-text"><strong>Category: </strong>{{ post.category.name }}</h6>

          <div><h6 class="card-text"><strong>Tags: </strong><span class="card-text" v-for="tag in post.tags" :key="tag.id">
            #{{ tag.name }}
          </span></h6>
          </div>
          <p class="card-subtitle mt-2"><strong>Post date: </strong> {{ post.post_date }}</p>
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
  width: 20rem;
  height: 40rem;
}
</style>