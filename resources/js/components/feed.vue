<template>
  <div>
    <fieldpost :auth="this.auth" :avatar="this.avatar" @post="this.addpost"></fieldpost>
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
  props: {
    auth: {
      type: Object
    },
    avatar:{
        type: String
    }
  },
  data() {
    return {
      posts: [],
      loading: false
    };
  },
  mounted() {
      console.log(this.avatar);
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
          this.posts = Array.from(Response.data);
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
          console.error(e);
        });
    }
  }
};
</script>
