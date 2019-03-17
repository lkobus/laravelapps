import axios from 'axios';

const BossStore = {
    namespaced : true,
    state: {
        current: {},
        resultBoss : [],
        
    },
    mutations: {
      setBoss: (state, payload)=> {
        state.current = payload;          
      },
      setBosses: (state, payload)=> {
        state.resultBoss = payload;          
      },
    },
    actions: {      
        async submitBoss(context, payload) {                      
            return axios.post('/api/boss', payload, { 
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
        setActive(context, payload){
          context.commit('setBoss', payload);
        },
        async getBosses(context, payload){
            return axios.get('/api/boss/search/' + payload.search, {
                headers : {
                    Authorization : "Bearer " + context.rootState.profile.token
                }
            }).then(function(e){
                context.commit('setBosses', e.data);
                return { error : false, message : e}
            }).catch(function(e){
                return { error: true, message: e }
            })
        },
        async loadBossInfo(context, payload){
          return axios.get('/api/boss/detail/' + payload.id, {
            headers : {
              Authorization : "Bearer " + context.rootState.profile.token
            }
          }).then(function (r){
            console.log(r);
            context.commit('setBoss', r.data[0]);
            return { error : false }
          }).catch(function(ex){
            return { error : true, message : ex };
          })
        }
    }
  }
  
  export default BossStore;