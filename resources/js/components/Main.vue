
<template>
  <main>
    <div class="row"></div>
    <div class="col-12" v-for="post in posts" :key="post.id">

        <ul>
            <li>{{ post.title }}</li>
        </ul>
    </div>
  </main>
</template>

<script>
export default {
  name: "Main",
  data() {
    return {
      url: "http://127.0.0.1:8000/api/posts",
      posts: [],
      api_token: ''
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