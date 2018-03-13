<template>
    <div class="notification">
        <h4>Example Component</h4>
        <p>Com VUE</p>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.initExample();
        },
        data() {
            return {
                //
            }
        },
        methods: {
            initExample(){
                console.log('Component mounted.');
            }
        }
    }
</script>
