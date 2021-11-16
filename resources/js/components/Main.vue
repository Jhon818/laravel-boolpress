
<template>
  <main>
   <RouterView />
  </main>
</template>

<script>
export default {
  name: "Main",
  data() {
    return {
      url: "http://127.0.0.1:8000/api/posts",
      posts: [],
      api_token: 'PjxdOC6c4TnANlK1aKMdg0gOLE5R6ImxN1ll7JJGCk93g1OlOO2hpzLcVGqHRG3L71GhNLVqQ0XBCuhk'
    };
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts() {
    const bodyParameters = {
        key: 'value'
    }

     const config = {
         headers:{ Authorization: `bearer ${this.api.token}`}
     }
      axios
        .post(this.url , config, bodyParameters)
        .then((response) => {
          // console.log(response.data.results);
          this.posts = response.data.results;
        })
        .catch((reject) => {
          console.log(reject);
        });
    },
  },
};
</script>