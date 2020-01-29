<template>
  <div>
    <button href="#" class="com" :class="this.likeIt?'text-danger':'text-dark'" @click="like">
      <i class="fas fa-thumbs-up"></i>
      {{`likes ${count}`}}
    </button>
  </div>
</template>
<script>
export default {
  props: {
    post: {
      type: Object,
      default: null
    }
  },
  data() {
    const { id, likeIt , count } = this.post;
    return {
      id,
      likeIt, count
    };
  },
  mounted() {
    console.log(typeof this.likeIt);
  },
  methods: {
    like() {
      
      if (!this.likeIt) {
        axios
          .post("/like", {
            post: this.id
          })
          .then((res)=> {
            this.likeIt = true;
            this.count++
          });
      }else{
        axios
        .post("/unlike", {
          post: this.id
        })
        .then((response)=>{this.likeIt = false;this.count--});
      }
    
    }
  }
};
</script>