<template>
    <div class="box box-widget widget-user">
        <div v-if="loading" class="overlay">        
            <i class="fa fa-refresh fa-spin"></i>                        
        </div>
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-gray-active">
        <h3 class="widget-user-username">{{getBoss().name}}</h3>
        <h5 class="widget-user-desc"></h5>
        </div>
        <div class="widget-user-image">
        <img class="img-circle" :src="getBoss().picture" alt="User Avatar">
        </div>
        <div class="box-footer">
        <div v-if="hasNPS()" class="row">
            <div class="col-sm-4 border-right">
            <div class="description-block">
                <h5 class="description-header">{{getBoss().count}}</h5>
                <span class="description-text">REVIEWS</span>
            </div>
            <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
            <div class="description-block">
                <h5 class="description-header">{{getBoss().average}}</h5>
                <span class="description-text">NPS Score</span>
            </div>
            <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
            <div class="description-block">
                <h5 class="description-header">Skill</h5>
                <span class="description-text">MAIN SKILL</span>
            </div>
            <!-- /.description-block -->
            </div>
            <!-- /.col -->
        </div>
        <div v-if="!hasNPS()" class="row">
            <h2 class="text-center"> No rating for this boss. </h2>
        </div>
        <!-- /.row -->
        </div>                        
        
    </div>
</template>

<script>

export default {
    
    data : function(){
        return {
            loading : true,            
        }
    },
    methods: {
        hasNPS(){
            return this.$store.state.boss.current.count > 0;
        },
        getBoss(){
            return this.$store.state.boss.current;
        },        
    },
    async mounted(){        
        try {
            await this.$store.dispatch('boss/loadBossInfo', { id : this.$route.params.id });            
        } finally {
            this.loading = false;
        }
        
    }
}
</script>