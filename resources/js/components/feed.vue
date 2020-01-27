<template>
  <div>
    <post :auth="this.auth" @post="this.addpost"></post>
    <posts :posts="this.posts"></posts>
  </div>
</template>

<script>
import post from "./post";
import posts from "./posts";
export default {
  props: {
    auth: {
      type: Object
    }
  },
  data() {
    return {
      posts: []
    };
  },
  mounted() {
    this.getPosts();
  },

  components: {
    post,
    posts
  },
  methods: {
    getPosts() {
      axios
        .get(`/posts`)
        .then(Response => {
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