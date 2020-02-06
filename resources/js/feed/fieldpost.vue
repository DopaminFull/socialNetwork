<template>
  <div class="post-topbar">
    <div class="user-picy">
      <img :src="this.auth.upload_path + this.auth.avatar" alt style="border-radius:50%" />
    </div>
    <br />
    <div class="border-bottom border-right mb-4">
      <textarea
        v-model="text"
        cols="30"
        rows="4"
        class="w-100 mt-2 mb-3 p-2"
        placeholder="What's in your mind "
        style="resize:none"
      ></textarea>
      <img v-if="url" :src="url" />
    </div>
    <div class="d-flex justify-content-between">
      <button class="btn text-white" style="background-color:#e44d3a" @click="post">post</button>
    </div>
    <!--post-st end-->
  </div>
</template>
<script>
export default {
  data() {
    return {
      text: "",
      auth,
      url: null
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
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    }
  }
};
</script>
<style lang="css" scoped>
/* #file {
  display: none;
}
.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
  background: #e44d3a;
  color: white;
} */
</style>