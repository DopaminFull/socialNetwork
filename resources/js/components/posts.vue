<template>
  <div class="posts-section">
    <div class="post-bar" v-for="post in posts" :key="post.id">
      <div class="post_topbar">
        <div class="usy-dt">
          <img
            :src="`https://randomuser.me/api/portraits/men/${post.poster}.jpg`"
            alt
            style="height:60px ; width:60px ; border-radius:50%"
          />
          <div class="usy-name">
            <h3 v-text="post.poster_name"></h3>
            <span v-text="post.created"></span>
          </div>
        </div>
        <div class="ed-opts">
          <a href="#" title class="ed-opts-open">
            <i class="la la-ellipsis-v"></i>
          </a>
          <ul class="ed-options">
            <li>
              <a href="#" title>Edit Post</a>
            </li>
            <li>
              <a href="#" title>Hide</a>
            </li>
            <li>
              <a href="#" title>Close</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="epi-sec"></div>
      <div class="job_descp mt-3">
        <p v-text="post.body"></p>
      </div>
      <div class="job-status-bar">
        <ul class="like-com mt-4 w-100">
          <li>
            <a href="#" class="com">
              <i class="fas fa-heart"></i> Likes
              54
            </a>
          </li>
          <li>
            <a href="#" class="com">
              <i class="fas fa-comment-alt"></i>
              Comments 15
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!--top-profiles end-->

    <!--post-bar end-->

    <!--posty end-->
    <div class="process-comm">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!--process-comm end-->
  </div>
</template>
<script>
export default {
  props: {
    posts: {
      type: Array,
      default: null
    }
  }
};
</script>