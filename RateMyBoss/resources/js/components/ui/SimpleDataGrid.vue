<template>
    <div class="box">                
        
        <div class="box-header">
            <h3 class="box-title">{{title}}</h3>
            <a @click="refresh(true)" href="javascript:void(0);" style="color:#b19cd9" class="glyphicon glyphicon-refresh pull-right "></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding" style="min-height:320px">
            
                    <table class="table table-striped">
                    <tbody>
                    <tr><th v-for="(c, index) in getHeader()" v-bind:key="index">{{c}}</th>
                    <th>&nbsp;</th>
                    </tr>
                    <tr v-for="(r, index) in getDataContent()" v-bind:key="index">
                        <td v-for="(p, index) in getProperties(r)" v-bind:key="index">{{p}}</td>                                        
                    </tr>         
                    
                    </tbody>
                    </table>
                                    
            
        </div>
        <div v-if="loading" class="overlay">        
            <i class="fa fa-refresh fa-spin"></i>                        
        </div>
        <div class="box-footer clearfix">
                <span>Showing {{getFrom()}} to {{getTo()}} of {{getTotal()}} entries.</span>
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a @click="goBack()" href="javascript:void(0);">«</a></li>                        
                    <li><a href="javascript:void(0);">{{getCurrent()}}</a></li>                        
                    <li><a @click="goNext()" href="javascript:void(0);">»</a></li>
                </ul>
            </div>
        <!-- /.box-body -->
        </div>
</template>

<script>
import axios from 'axios';

export default {        
    props: {
        endpoint: {
            type: String,
            default : ''
        },        
        columns : {
            type: Array,
            default: () => { return [];}
        },
        title : {
            type : String,
            default : "Table"
        },
        refreshButton : {
            type: Boolean,
            default : false
        },
        storeVariable : {
            type: Function,
            default : (endpoint) => { return endpoint.replace(/\//g, '_')}
        }
    },
    data: function(){
        return {            
            loading: true,
            activePage : 1            
        }        
    },
    methods : {        
        getFrom(){
            return this.getCurrentGridState().from;
        },  
        getTo(){
            return this.getCurrentGridState().to;
        },
        getTotal(){
            return this.getCurrentGridState().total;
        },
        async goBack(){            
            if(!this.loading && this.getCurrentGridState().prev !== null){
                this.loading = true;                            
                var result = await this.$store.dispatch("grid/back", this.getPayload(true));
                this.loading = false;    
            }            
        },
        async goNext(){
            if(!this.loading && this.getCurrentGridState().next !== null){
                this.loading = true;                            
                var result = await this.$store.dispatch("grid/next", this.getPayload(true));
                this.loading = false;    
            }
        },
        getCurrent(){
            return this.getCurrentGridState().current;
        },
        getCurrentGridState(){
            return this.$store.state.grid[this.storeVariable(this.endpoint)];
        },
        getDataContent(){
            try {
                return this.getCurrentGridState().dataContent;
            }            
            catch {
                return [];
            }
        },
        getHeader(){                               
            try {
                return this.$store.state.grid[this.storeVariable(this.endpoint)].tableHeader;
            } catch {
                return [];
            } 
            
        },        
        getProperties: function(obj){
            var result = [];
            for(var prop in obj){
                if(obj.hasOwnProperty(prop)){
                    result.push(obj[prop]);
                }
            }
            return result;
        },
        getPayload(refresh){
            return {
                storeVariable : this.storeVariable(this.endpoint),
                columns : this.columns,
                endpoint : this.endpoint,
                refreshRequest: refresh                
            };
        },
        async refresh(refresh){
            this.loading = true;                            
            var result = await this.$store.dispatch("grid/fetch", this.getPayload(refresh));
            this.loading = false;    
        },
    },
    async mounted () {
        this.refresh(false);
    }
}
</script>