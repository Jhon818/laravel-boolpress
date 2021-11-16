<template>
    <div class="container">
        <h1>Details</h1>
    </div>
</template>

<script>
export default {
   data() {
       return {
           url: '/api',
           post: null,
            api_token: 'PjxdOC6c4TnANlK1aKMdg0gOLE5R6ImxN1ll7JJGCk93g1OlOO2hpzLcVGqHRG3L71GhNLVqQ0XBCuhk'
       }
   },
   created() {
       this.getPostDetail();
   },
   methods: {
       getPostDetail() {
            const bodyParameters = {
        key: 'value'
    }

     const config = {
         headers:{ Authorization: `bearer ${this.api_token}`}
     }
      axios
        .post(this.url + this.$route.path)
        .then((response) => {
          // console.log(response.data.results);
          this.posts = response.data.results;
        })
        .catch((reject) => {
          console.log(reject);
        });
    
       }
   }
}
</script>