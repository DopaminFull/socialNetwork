<template>
    <div>
        <searchbar @search="searchy"></searchbar>
        <searchResults :results="results"></searchResults>
    </div>
</template>
<script>
import searchbar from "./searchbar";
import searchResults from "./searchResults";
export default {
    components: {
        searchbar,
        searchResults
    },
    data() {
        return {
            results: []
        };
    },
    methods: {
        searchy(text) {
            if (text.length == 0) {
                this.results = [];
                return;
            }
            axios
                .post(`/search`, {
                    name: text
                })
                .then(Response => {
                    this.results = Response.data;
                    console.log(this.results);
                })
                .catch(e => {
                    console.log(e);
                });
        }
    }
};
</script>
