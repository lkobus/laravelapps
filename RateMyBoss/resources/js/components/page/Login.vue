<template>
    <div class="login-box">                   
        <div class="login-logo">
        <a href="javascript:void(0)"><b>Rate</b>MyBoss</a>
        </div>
        <div v-if="showError" id="a" class="alert alert-danger alert-dismissible" style="color:#000000">
            <button @click="hideError()" type="button"  class="close" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Whoops...</h4>{{errorMessage}}
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
            <!-- /.col -->
            </div>            
        </form>            
        
        <br>
        <a href="/register" class="text-center">Register a new membership</a>
            
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
                errorMessage: '',
                showError: false
            }
        },
        methods: {    
            hideError(){
                this.showError = false;
            },
            async login () {             
                this.showError = false;   
                this.$store.dispatch('global/startLoad', "Autenticando")
                var millisecondsToWait = 1000;
                var response;                                
                response = await this.$store.dispatch('profile/auth', { email : this.email, password: this.password});                            
                if(response.error){                     
                    this.errorMessage = response.message;
                    this.showError = true;
                } else {                    
                    //go to dashboard view
                }               
                this.$store.dispatch('global/stopLoad', {})
            }
        },
        mounted: function(){
            
        }        
    }
</script>