<template>
  <div>
    <Request @get="getDossier"></Request>
    <Result :dossier="dossier" v-if="dossier" class="mt-2"></Result>
  </div>
</template>
<script>
import Request from "./request";
import Result from "./result";
export default {
  data() {
    return {
      dossier: null,
      found: false
    };
  },
  components: {
    Request,
    Result
  },
  methods: {
    getDossier(code) {
      //   const data = new FormData();
      //   data.append("_token", "FA01044F");
      //   data.append("code", code);
      axios
        .post("https://www.masterpage.cdma-solution.ma/api/socialmedia", {
          _token: "FA01044F",
          code: code
        })
        .then(result => {
          if (!result.data) {
            this.found = true;
            console.log("hello");
            return;
          }
          this.dossier = result.data;
          console.log(result);
        });
    }
  }
};
</script>