<template>
    <div class="hold-transition login-page" style="height: auto; min-height: 100%;">                
        <BlockUI v-if="getLoad()" :message="getMessage()">
            <ring-loader :loading="getLoad()" size="90px" color="#b19cd9" ></ring-loader>
        </BlockUI>

        <router-view></router-view>
    </div>
    
</template>

<style>
    .alert-danger  {
        background-image: -webkit-linear-gradient(top,#dd4b39 0,#dd4b39 100%);
    }    
    
</style>

<script>
    import RingLoader from 'vue-spinner/src/RingLoader.vue'
    export default {
        data() {
            return {                
                loadMessage: this.$store.state.global.message,
                color: "#2c3e50",
                size: "10px"
            };
        },
        methods: {
            getLoad: function(){
                return this.$store.state.global.loading
            },
            getMessage: function(){
                return this.$store.state.global.message
            }
        },
        components: {
            RingLoader
        }
    }
</script>

