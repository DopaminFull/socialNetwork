<template>
    <div>
        <form>
            <input
                type="text"
                name="search"
                placeholder="Search..."
                autocomplete="off"
                v-model="text"
                @keyup="search"
            />
            <button>
                <i class="la la-search"></i>
            </button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            text: ""
        };
    },
    methods: {
        search() {
            this.$emit("search", this.text);
        }
    }
};
</script>
<style lang="css"></style>
