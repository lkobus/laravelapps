<template>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><hr></div>
                    <div class="card-body">                                            
                        <ui-boss-profile></ui-boss-profile>
                    </div>                
                </div>
            </div>
        </div>    
        <fab
        :position="position"
        :bg-color="bgColor"
        :actions="fabActions"        
        @rate="navigateToRate()"
        ></fab>            
    </div>        
</template>

<script>
import fab from 'vue-fab';
export default {        
    components: {
        fab        
    },    
    data: function(){
        return {
            bgColor: '#b19cd9',
            position: 'bottom-right',                                        
            fabActions: [              
                {
                    name: 'rate',
                    icon: 'edit'
                }
            ]
        }
    },
    methods : {               
        navigateToRate(){
            this.$route.push("boss/" + this.$store.state.boss.current.id + "/review");
        } 
    },
    
}
</script>