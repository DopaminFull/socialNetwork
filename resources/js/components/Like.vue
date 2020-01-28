<template>
  <div>
    <button
      href="#"
      class="com"
      :class="this.UserLikesPost?'text-danger':'text-dark'"
      @click="like"
    >
      <i class="fas fa-thumbs-up"></i>
      {{'likes'}}
    </button>
  </div>
</template>
<script>
export default {
  props: {
    post: {
      type: Object
    },
    likeIt: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      UserLikesPost: this.likeIt
    };
  },
  mounted() {
    console.log(this.UserLikesPost);
  },
  methods: {
    like() {
      if (!this.UserLikesPost) {
        axios
          .post("/like", {
            post: this.post.id
          })
          .then((this.UserLikesPost = false));
      }
    }
  }
};
</script>