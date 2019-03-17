<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><hr></div>
                    <div class="card-body">                                            
                    </div>                
                </div>
            </div>
        </div>
        <fab
        :position="position"
        :bg-color="bgColor"
        :actions="fabActions"           
        @skill="openSkillModal"
        ></fab>
        <modal-skill></modal-skill>
    </div>    
</template>

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
          search : '',
          results : [],
          selectedBoss : {},
          fabActions: [              
              {
                  name: 'skill',
                  icon: 'stars',
                  tooltip: "Skill manager"
              }
          ]
      }
    },
    methods : {
      cache(){
          console.log('Cache Cleared');
      },       
      openSkillModal(){
          $('#skillModal').modal({show:true})
      },      
    }
}
</script>