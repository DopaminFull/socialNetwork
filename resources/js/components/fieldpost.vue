<template>
  <div class="post-topbar">
    <div class="user-picy">
      <img :src="this.avatar"
        style="border-radius:50%"
      />
    </div>
    <br />
    <div>
      <textarea
        v-model="text"
        cols="30"
        rows="2"
        class="border-bottom w-100 mt-2 mb-3 p-2"
        placeholder="What's in your mind "
      ></textarea>
    </div>
    <div class="text-right">
      <button class="btn text-white" style="background-color:#e44d3a" @click="post">post</button>
    </div>
    <!--post-st end-->
  </div>
</template>
<script>
export default {
  props: {
    auth: {
      type: Object
    },
    avatar: String
  },
  data() {
    return {
      text: ""
    };
  },
  mounted() {},
  methods: {
    post() {
      if (this.text === "") {
        return;
      }
      this.$emit("post", this.text);
      this.text = "";
    }
  }
};
</script>
