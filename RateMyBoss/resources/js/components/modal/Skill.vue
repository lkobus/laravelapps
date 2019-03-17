<template>
    <div class="modal fade" id="skillModal" style="display: none;">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Skill Man   ager</h4>
            </div>
            <div class="modal-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Skills</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Add Skill</a></li>                                        
                    </ul>
                    <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <ui-simple-data-grid endpoint="/api/skill/paginator" :columns="['id', 'description']"></ui-simple-data-grid>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <form role="form">                                                        
                            <div class="form-group" v-bind:class="{'has-error' : skillRequired}">
                                <label for="enterprise">Skill</label>
                                <input type="text" v-model="skill" class="form-control" placeholder="Enter Skill">
                                <span v-if="skillRequired" class="help-block">{{message}}</span>
                            </div>                                     
                        </form>                                                
                        <button @click="submitSkill" class="btn btn-primary pull-right">Add</button>                                                                       
                        <br>
                        <br>
                    </div>                   
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>

                
            </div>            
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            skill : '',
            skillRequired: false
        }
    },
    methods : {
        validateForm: function(){
            var result = true;
            this.skillRequired = false;
            if(this.skill === ''){
                result = false;
                this.skillRequired = true;
            }
            return result;
        },        
        async submitSkill(){
            this.$store.dispatch('global/startLoad', "Storing...")
            try{
                if(this.validateForm()){
                    var result = await this.$store.dispatch('skill/store', {description : this.skill});
                    if(!result.error){
                        alert('deu bom');
                    } else {                        
                        alert(result.message.response.data.message);
                    }
                }
            } finally{
                this.$store.dispatch('global/stopLoad', {})
            }
        }

    }        
}
</script>