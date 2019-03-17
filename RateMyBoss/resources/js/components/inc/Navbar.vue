<template>    
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
            <a href="../../index2.html" class="navbar-brand"><b>Rate</b>MyBoss</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li v-for="m in getMenus()" v-bind:key="m.route" v-bind:class="{active : m.active}">
                    <a @click="navigateTo(m.route)" href="javascript:void(0);">{{m.title}} <span class="sr-only">(current)</span>
                    </a>
                </li>                        
            </ul>
            
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">                
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img :src="getUserphoto()" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">{{getUsername()}}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">                            
                    <img :src="getUserphoto()" class="img-circle" alt="User Image">
                    <p>
                        {{getUsername()}}
                        <small>Membro desde {{getUserCreatedAt()}}</small>
                    </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                            <a @click="logout" class="btn btn-default btn-flat" href="javascript:void(0)">
                                Logout
                        </a>                                    
                    </div>
                    </li>
                </ul>
                </li>
            </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>    
</template>

<script>
export default {    
    methods : {
        logout: function(){
            this.$store.dispatch("profile/logout", {});
            this.$router.push("/");
        },
        getUsername: function(){            
            return this.$store.state.profile.auth.name;                
        },
        getUserphoto: function(){
            return this.$store.state.profile.auth.photo;                
        },
        getUserCreatedAt: function(){
            return this.$store.state.profile.auth.created_at;                
        },
        getMenus: function(){            
            return this.$store.state.global.UI.menus;                         
        },
        navigateTo: function(route){            
            this.$router.push(route);
            this.$store.commit('global/setActiveMenu', route);
        }

    },
    async mounted () {
        try{
            //this.$store.dispatch('global/startLoad', "Check Profile");
            var response = await this.$store.dispatch('global/loadMenus');            
            if(!response.error){
                //this.getMenus();    
            }
        } finally{
            //this.$store.dispatch('global/stopLoad', {})
        }
        
    }
}
</script>