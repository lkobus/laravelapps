<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><hr></div>
                    <div class="card-body">
                      <ui-boss-result-table></ui-boss-result-table>
                    </div>
                    
                </div>
            </div>
        </div>
        <fab
        :position="position"
        :bg-color="bgColor"
        :actions="fabActions"        
        @boss="openBossModal"
        ></fab>
        <modal-boss></modal-boss>
    </div>    

</template>


<style>    
    div.middle-div {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<script>
import fab from 'vue-fab';
export default {    
    components: {
        fab        
    },
    data: function() {
      return {
          bgColor: '#b19cd9',
          position: 'bottom-right',                                        
          fabActions: [              
              {
                  name: 'boss',
                  icon: 'add_circle_outline'
              }
          ]
      }
    },
    methods : {
      cache(){
          console.log('Cache Cleared');
      },      
      openBossModal(){
          $('#bossModal').modal({show:true})
      },                
    },
    watch: {
        search: _.debounce(function(addr) { this.getSearchData(addr) }, 500)
    },    
}
</script>