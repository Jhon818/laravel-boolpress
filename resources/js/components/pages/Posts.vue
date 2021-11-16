<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>{{ message }}</h1>
        <PostCard v-for="post in posts" :key="post.id"/>
      </div>
    </div>
  </div>
</template>

<script>
import PostCard from "../PostCard.vue";

export default {
  name: "Posts",
  data() {
    return {
      message: "Sezione dei Posts",
      posts: [],
      api_token: "PjxdOC6c4TnANlK1aKMdg0gOLE5R6ImxN1ll7JJGCk93g1OlOO2hpzLcVGqHRG3L71GhNLVqQ0XBCuhk",
    };
  },
  components: {
      PostCard
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts() {
      const config = {
        headers: { Authorization: `Bearer ${this.api_token}` },
      };

      const bodyParameters = {
        key: "value",
      };

      axios
        .post("/api/posts" , bodyParameters , config)
        .then((response) => {
        //   console.log(response.data.results);
          this.posts = response.data.results;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style lang='scss' scoped>
</style>