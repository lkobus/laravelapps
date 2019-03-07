<template>
    <div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Perfil</h3>
        </div>
        <div class="box-body">
            <div class="pull-center">
                <img class="profile-user-img img-responsive img-circle" src="/imgs/misc/usr-default.svg" alt="User profile picture">
                <h3 class="profile-username text-center">Leonardo Kobus</h3>
                <p class="text-muted text-center">Software Engineer</p>
            </div>

            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" class="form-control" id="name" v-model="name" placeholder="Nome">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Sobrenome</label>
                  <input type="text" class="form-control" v-model="lastname" id="lastname" placeholder="Sobrenome">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cargo</label>
                  <input type="text" class="form-control" v-model="position" id="position" placeholder="Função">
                </div>
                <div class="form-group">
                <label>Data nascimento</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input v-model="birthday" v-input-mask data-inputmask="'mask': '99/99/9999'" />                  
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagem de perfil</label>
                  <input type="file" ref="file" id="exampleInputFile">                  
                </div>                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a @click="uploadProfile()" class="btn btn-primary">Submit</a>
              </div>
            </form>
                        
        </div>
        <!-- /.box-body -->
    </div>    
</template>

<script>
    export default {
        data: function(){
            return {
              name : "",
              file : '',
              lastname: '',
              position: '',
              birthday: ''              
            }
        },
        methods: {
          uploadProfile(){                                    
            console.log(this.getPayload());            
            this.$store.dispatch('profile/increment', this.name);
          },
          getPayload(){
            return {
              name : this.name,
              file : this.$refs.file.files[0],
              lastname : this.lastname,
              birthday : this.birthday,
              position : this.position
            }
          }                    
        },
        mounted: function(){

        }

    }
</script>