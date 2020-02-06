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
    }
  },
  data() {
    return {
      comments: [],
      auth
    };
  },
  methods: {},
  components: {
    post
  }
};
</script>