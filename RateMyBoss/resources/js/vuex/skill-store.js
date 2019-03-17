import axios from 'axios';

const SkillStore = {
    namespaced : true,
    state: {
        
    },
    mutations: {
      
    },
    actions: {      
        async store(context, payload) {                      
            return axios.post('/api/skill', payload, { 
                headers : {
                  Authorization : "Bearer " + context.rootState.profile.token 
                }
              })
              .then(function(r){          
                console.log(r);
                return { error : false, message : r };
              }).catch(function(r){          
                return { error : true, message : r };
              });
        },
        async getSkills(context, payload){
            return axios.get('/api/skill', {
                headers : {
                    Authorization : "Bearer " + context.rootState.profile.token
                }
            }).then(function(e){
                return { error : false, message : e}
            }).catch(function(e){
                return { error: true, message: e }
            })
        }
    }
  }
  
  export default SkillStore;