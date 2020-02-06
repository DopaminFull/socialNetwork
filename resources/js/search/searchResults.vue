<template>
  <div class="result">
    <ul class="list-group w-100" id="myList" v-if="results.length > 0">
      <li class="list-group-item p-0" v-for="result in results" :key="result.user_id">
        <div class="nott-list border-left">
          <div class="notfication-details">
            <div class="noty-user-img">
              <a :href="`/u/${result.user_id}`">
                <img
                  :src="
                                       result.avatar
                                    "
                  alt
                  style="height:35px ; width:35px ; border-radius:50%"
                />
              </a>
            </div>
            <div class="notification-info w-75">
              <h3 class="mb-0 mt-2" v-text="result.name"></h3>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  props: {
    results: {
      type: Array
    }
  }
};
</script>
<style lang="css" scoped>
.result {
  position: relative;
}
.result ul {
  position: absolute;
  z-index: 999;
  top: 40px;
}
</style>
