<template>
  <div>
    <fieldpost :auth="this.auth" @post="this.addpost"></fieldpost>
    <posts :posts="this.posts" :auth="this.auth" v-if="!loading"></posts>
    <div v-if="loading" class="process-comm">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
  </div>
</template>

<script>
import fieldpost from "./fieldpost";
import posts from "./posts";
export default {
  data() {
    return {
      posts: [],
      loading: false,
      auth
    };
  },
  mounted() {
    this.getPosts();
  },

  components: {
    fieldpost,
    posts
  },
  methods: {
    getPosts() {
      this.loading = true;
      axios
        .get(`/posts`)
        .then(Response => {
          this.loading = false;
          console.log(Response.data[0]);
          this.posts = Array.from(Response.data);
        })
        .catch(e => {
          console.log(e);
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
    }
  }
};
</script>