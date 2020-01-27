<template>
  <div>
    <button
      class="btn"
      :class="follow?'btn-danger':'btn-success'"
      @click="following"
      v-text="follow?'Unfollow':'Follow'"
    ></button>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      default: null
    },
    is_following: {
      type: Boolean
    },
    auth: {
      type: Object
    }
  },
  mounted() {
    console.log(this.follow);
  },
  data() {
    return {
      follow: this.is_following
    };
  },
  methods: {
    following() {
      if (!this.follow) {
        axios
          .post(`/follow/${this.user.id}`)
          .then(() => {
            console.log(`you're following ${this.user}`);
            this.follow = true;
          })
          .catch(e => {
            console.log(e);
          });
        return;
      }
      axios
        .post(`/unfollow/${this.user.id}`)
        .then(() => {
          console.log(`you're not following ${this.user}`);
          this.follow = false;
        })
        .catch(e => {
          console.log(e);
        });
    }
  }
};
</script>
