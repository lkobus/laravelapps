<template>
    
        <div class="box box-primary">                            
            <div class="box-body box-profile">
                <form v-on:submit="loadBosses()" action="javascript:void(0);">
                <img class="profile-user-img img-responsive img-circle" src="/imgs/misc/neuralogo.png" alt="User profile picture">
                <h1 class="profile-username text-center">Boss Finder</h1>                                                                        
                <div class="col-md-offset-1 col-md-10">                                                            
                    <div class="input-group input-group-lg">
                    <input type="text" class="form-control" v-model="bossSearch">
                        <span class="input-group-btn">
                            <Button class="btn btn-info btn-flat">Search</Button>
                        </span>
                    </div>                                                          
            </div>

            <p class="text-muted text-center col-md-12">Start rating.</p>

            <div class="col-md-10 col-md-offset-1">
            <table v-if="getBosses().length > 0" class="table table-bordered">
            <tbody><tr>                  
                  <th >Boss</th>
                  <th class="text-center" style="width: 150px">Review amount</th>
                  <th class="text-center">NPS Score</th>                  
                  <th style="width: 40px">Score</th>
                  <th style="width: 40px">&nbsp;</th>
                </tr>
                <tr v-for="(b, index) in getBosses()" v-bind:key="index">                      
                    <td>{{b.name}}</td>
                    <td class="text-center">{{b.count}}</td>
                    <td>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" v-bind:style="{width: b.average + '%'}"></div>
                    </div>
                    </td>                  
                    <td><span class="badge bg-red">{{b.average}}%</span></td>
                    <td class="text-center">
                        <a @click="navigateToBossDetail(b.id)" href="javascript:void(0);"><span class="glyphicon glyphicon-search"></span></a>
                    </td>
                </tr>                                                                  
                </tbody>
              </table>
            </div>
            </form>
            </div>
            
            <hr>
        <div v-if="loading" class="overlay">        
            <i class="fa fa-refresh fa-spin"></i>                        
        </div>
        <!-- /.box-body -->
        </div>                                
</template>
<script>
export default {    
    data : function(){
        return {
            bossSearch : '',
            loading : false,
        }
    },
    methods : {
        getBosses() {
            return this.$store.state.boss.resultBoss;
        },        
        async navigateToBossDetail(bossId){            
            this.$router.push('/boss/' + bossId);
        },
        async loadBosses(){      
            try{
                console.log(this.boss);
                this.loading = true;
                var result = await this.$store.dispatch("boss/getBosses", { search : this.bossSearch });
                if(!result.error){                
                    console.log(result.message.data);
                } else {
                    console.log(error.message);
                }
            } finally {
                this.loading = false;
            }
                                
        },
    }
}
</script>