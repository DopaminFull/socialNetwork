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
            <Like :post="post.id" :likeIt="post.likeIt"></Like>
          </li>
          <li>
            <button
              href="#"
              class="com text-dark"
              @click=" post.showComments = !post.showComments  "
            >
              <i class="fas fa-comment-alt"></i>
              Comments {{post.commentsCount}}
            </button>
          </li>
        </ul>
      </div>
      <Comments
        v-if="post.showComments"
        :post="{post:post.id,offset:post.offset , user:auth.id , count:post.commentsCount}"
        @newComment="post.CommentCounter++"
      ></Comments>
      <!--comment-section end-->
    </div>

    <!--top-profiles end-->

    <!--post-bar end-->

    <!--posty end-->

    <!--process-comm end-->
  </div>
</template>
<script>
import Comments from "./Comments";
import Like from "./Like";
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
  components: {
    Comments,
    Like
  },
  methods: {}
};
</script>