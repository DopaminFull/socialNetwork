<template>
  <div class="posts-section">
   <post v-for="post in posts" :key="post.id" :post="post" :auth="auth"></post>
  </div>
</template>
<script>
import post from "./post";
export default {
  props: {
    posts: {
      type: Array,
      default: null
    },
    auth: Object
  },
  data() {
    return {
      comments: []
    };
  },
  methods: {
  
  },
 components: {
    post
  },
};
</script>