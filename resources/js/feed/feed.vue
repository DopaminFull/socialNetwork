<template>
  <div>
    <fieldpost :auth="this.auth" @post="this.addpost"></fieldpost>
    <posts :posts="this.posts" :auth="this.auth"></posts>
      <feed-loading spinner="spiral"  @infinite="getPosts"></feed-loading>
  </div>
</template>

<script>

import fieldpost from "./fieldpost";
import posts from "./posts";

export default {
  data() {
    return {
      posts: [],
      auth,
    };
  },
  mounted() {
  },

  components: {
    fieldpost,
    posts
  },
  methods: {
    getPosts($state) {
      axios
        .get(`/posts?offset=${this.posts.length}`)
        .then(res => {
            const data = res.data;
            if(data.length > 0){
              this.posts.push(...data);
              $state.loaded();
            }else
              $state.complete();

        })
        .catch(e => {
          console.error(e);
        });
    },
    addpost(text) {
      axios
        .post(`/post`, {
          body: text
        })
        .then(Response => {
          this.posts.unshift(Response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },
  }
};
</script>
