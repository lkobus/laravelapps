<template>
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Rate</b>MyBoss</a>
  </div>
    <transition name="fade">
        <error-alert></error-alert>            
    </transition>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" v-model="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" v-model="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" v-model="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" v-model="passwordConfirm" class="form-control" placeholder="Retype password" required required autofocus> 
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      
    </form>
    <div class="col-xs-12">
          <a href="javascript:void(0)" @click="register()" class="btn btn-primary col-xs-12">
            Register
          </a>                
      </div>
    <router-link to="/login">
        <a href="javascript:void(0)" class="text-center">I already have a membership</a>
    </router-link>
  </div>
  <!-- /.form-box -->
</div>


</template>

<script>
export default {
    data: function(){
        return {
            username: '',            
            email: '',
            password: '',
            passwordConfirm: ''
        }
    },
    methods: {
        formValidation: function(){
            if(this.password !== this.passwordConfirm){
                this.$store.dispatch('global/showAlert', "Password dismatches");
                return false;
            }
            if(this.password === ''){              
              this.$store.dispatch('global/showAlert', "Password required");
              return false;
            }
            if(this.passwordConfirm === ''){              
              this.$store.dispatch('global/showAlert', "Password confirm required");
              return false;
            }
            if(this.email === ''){
               this.$store.dispatch('global/showAlert', "Email cannot be empty");
              return false;
            }
            if(this.username === ''){
              this.$store.dispatch('global/showAlert', "Username required");
              return false;
            }
            return true;
        },        
        async register () {
            this.$store.dispatch('global/hideAlert', {})
            this.$store.dispatch('global/startLoad', "Registrando");
            try {
                var isFormValid = this.formValidation();
                if(isFormValid){
                    var payload = {
                        name : this.username,
                        email : this.email,
                        password : this.password            
                    }
                    var response = await this.$store.dispatch('profile/register', payload);
                    if(response.error){
                        this.$store.dispatch('global/showAlert', response.message);                                            
                        console.log("Whoops some trouble");
                        console.log(response.message);
                    } else {
                        console.log("Registered!!!");
                        console.log(response.message);
                    }
                }
                    
                
            } finally {
                this.$store.dispatch('global/stopLoad');
            }                    
        }
    }
}
</script>

<style>
    .vertical-center {
        min-height: 100%; 
        min-height: 100vh; 
        display: flex;
        align-items: center;
    }          
          
</style>