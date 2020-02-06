<template>
  <div>
    <h3 class="text-center">Client</h3>
    <div class="gallery_pf">
      <div class="row">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum
          iure laudantium nobis quia quis quos, voluptatum! Accusantium ad
          animi architecto
        </p>
      </div>
      <div class="form-group mt-5">
        <input
          type="text"
          class="form-control w-50 mx-auto"
          placeholder="Code Dossier"
          v-model="code"
        />
        <button
          class="btn text-white mt-2 mx-auto d-block"
          style="background-color:#e44d3a"
          @click="get"
        >Search</button>
      </div>
    </div>
    <!--gallery_pf end-->
  </div>
</template>
<script>
export default {
  data() {
    return {
      code: ""
    };
  },
  methods: {
    get() {
      this.$emit("get", this.code);
    }
  }
};
</script>