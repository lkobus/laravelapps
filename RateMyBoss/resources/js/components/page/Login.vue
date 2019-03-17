<template>
    <div class="login-box">                   
        <div class="login-logo">
        <a href="javascript:void(0)"><b>Rate</b>MyBoss</a>
        </div>                
        <!-- /.login-logo -->
        <div class="login-box-body">
        <p class="login-box-msg">Sign to start your session.</p>               
        <form action="javascript:void(0)">            
            <div class="form-group has-feedback">                
                <input id="email" v-model="email" type="email" class="form-control" name="email" required autofocus>                
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" v-model="password" type="password" class="form-control" name="password" required>            
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">            
            <!-- /.col -->
            <div class="col-xs-12">
                <button @click="login" type="submit" class="btn btn-primary col-xs-12">
                         Login
                </button>                
            </div>
            <div class="col-md-12">

            <hr />
            <transition name="fade">
                <error-alert></error-alert>            
            </transition>
            </div>
            <!-- /.col -->
            </div>            
        </form>            
        
        <br>
            <router-link to="/register">
                <a href="javascript:void(0)" class="text-center">Register a new membership</a>
            </router-link>
            
        </div>
        <!-- /.login-box-body -->
    </div>
</template>

<script>    
    import { MLBuilder } from 'vue-multilanguage';
    export default {
        data: function() {
            return {
                email : '',
                password: '',                
            }
        },
        methods: {                
            async login () {               
                if(this.email.includes('@') && this.password !== ''){
                    this.$store.dispatch('global/hideAlert', {})
                    this.$store.dispatch('global/startLoad', "Autenticando")
                    var millisecondsToWait = 1000;
                    var response;                                
                    response = await this.$store.dispatch('profile/auth', { email : this.email, password: this.password});                            
                    if(response.error){                                                             
                        this.$store.dispatch('global/showAlert', response.message);                    
                        this.$store.dispatch('global/startLoad', "Autenticando")
                    } else {        
                        console.log(response);
                        this.$router.push('/home')
                    }               
                    this.$store.dispatch('global/stopLoad', {})
                }
                
                
                
            },            

        },
        mounted: function(){
            
        }        
    }
</script>