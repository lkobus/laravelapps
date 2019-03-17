<template>
    <div class="modal fade" id="bossModal" style="display: none;">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Add Boss</h4>
            </div>
            <div class="modal-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Boss</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Aditional Info</a></li>                                        
                    </ul>
                    <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <form role="form">                            
                            <div class="form-group" v-bind:class="{'has-error' : bossRequired}">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="email" class="form-control" v-model="name" placeholder="Enter boss name">
                                <span v-if="bossRequired" class="help-block">Boss name required</span>
                            </div>                                                                                                                               
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <form role="form">                            
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" v-model="position" class="form-control" placeholder="Enter Boss position">
                                
                            </div>                            
                            <div class="form-group">
                                <label for="enterprise">Enterprise</label>
                                <input type="text" v-model="enterprise" class="form-control" placeholder="Enter Boss enterprise">
                            </div>                            
                        </form>
                    </div>                   
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" @click="submitBoss()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>
export default {
    data : function(){
        return {
            enterprise : '',
            position : '',
            name : '',
            bossRequired : false,
        }
    },
    methods : {
        validateForm: function(){
            var result = true;
            this.bossRequired = false;
            if(this.name === ''){
                result = false;
                this.bossRequired = true;
            }
            return result;
        },
        async submitBoss(){
            this.$store.dispatch('global/startLoad', "Storing...")
            try{            
                if(this.validateForm()){
                    var positionIncoming = false;
                    if(this.position !== ''){
                        this.positionIncoming = true;
                    }

                    var payload = {
                        enterprise : this.enterprise,
                        position : this.position,
                        name : this.name,        
                        positionIncoming : positionIncoming            
                    }

                    var response = await this.$store.dispatch('boss/submitBoss', payload);
                    if(!response.error){
                        alert('deu bom');
                    } else {
                        alert('deu ruim');
                    }

                }    
            } finally {
                this.$store.dispatch('global/stopLoad', {})
            }        
        }
    }
}
</script>