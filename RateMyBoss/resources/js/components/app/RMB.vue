<template>
    <div>        
        <div style="height: auto; min-height: 100%;">                
            <BlockUI v-if="getLoad()" :message="getMessage()">
                <ring-loader :loading="getLoad()" size="90px" color="#b19cd9" ></ring-loader>
            </BlockUI>
            <transition name="fade">
                <router-view v-if="isLoginPage()"></router-view>
            </transition>
            <transition name="fade">
                <div v-if="!isLoginPage()" class="wrapper">                                    
                    <header class="main-header">
                        <inc-navbar></inc-navbar>
                    </header>                
                    
                    <div class="content-wrapper" style="min-height: 841px;">
                        <transition name="fade">
                            <router-view ></router-view>
                        </transition>
                    </div>                    
                    <inc-footer></inc-footer>                    
                </div>                
            </transition>
        </div>
        
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
        methods: {
            getLoad: function(){
                return this.$store.state.global.loading
            },
            getMessage: function(){
                return this.$store.state.global.message
            },
            isLoginPage: function(){                
                var regex = new RegExp("#/$");
                return  window.location.hash.includes('/register') ||                
                window.location.hash.includes('/login') ||                
                regex.test(window.location.hash);                                             
            },            
        },
        async mounted () {
            if(!this.isLoginPage()){
                console.log("Mounted");
                this.$store.dispatch('global/startLoad', "Check Auth");
                var response = await this.$store.dispatch('profile/isTokenValid', {});
                if(!response.auth){
                    this.$store.dispatch('global/stopLoad', {})
                    this.$router.push('/login');
                }                
                this.$store.dispatch('global/stopLoad', {})
            }
                
        },
        components: {
            RingLoader
        }
    }
</script>

