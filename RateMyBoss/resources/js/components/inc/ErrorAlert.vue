<template>
    <div v-if="getMessage()" id="a" class="alert alert-danger alert-dismissible" style="color:#000000">
        <button @click="hideError()" type="button"  class="close" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Whoops...</h4>{{getMessage()}}
    </div>
</template>

<script>
export default {    
    methods : {
        getMessage: function (){            
            return this.$store.state.global.UI.alert.message;
        },
        getVisibility: function (){
            return this.$store.state.global.UI.alert.show;
        },
        hideError: function (){
            this.$store.dispatch('global/hideAlert');
        }
    }

}
</script>