import axios from 'axios';

var parseData = function(columns, content){                
    if(columns.length > 0){
        var result = [];           
        _.each(content, function(c){
            var parsed = {};
            for(var prop in c){
                if(c.hasOwnProperty(prop)){                                                        
                    var o = _.find(columns, function(e) {
                        return e === prop;
                    });
                    if(o !== undefined){
                        parsed[prop] = c[prop];                                
                    }                            
                }
            }
            result.push(parsed);
        });        
        return result;
    } else {
        return content;
    }
}
var getHeaders = function(obj){
    var result = [];
    for(var prop in obj){
        if(obj.hasOwnProperty(prop)){
            result.push(prop);
        }
    }
    return result;
}

const GridStore = {
    namespaced : true,
    state: {
                
    },
    mutations: {
        setContentState: (state, payload) => {            
            var storeVariable = payload.storeVariable;            
            console.log(state[storeVariable]);
            debugger;
            state[storeVariable].from = payload.data.from;
            state[storeVariable].to = payload.data.to;
            state[storeVariable].next = payload.data.next_page_url;
            state[storeVariable].prev = payload.data.prev_page_url;
            state[storeVariable].total = payload.data.total;
            state[storeVariable].current = payload.data.current_page;
            
            state[storeVariable].dataContent = parseData(payload.columns, payload.data.data);      
            state[storeVariable].tableHeader = getHeaders(state[storeVariable].dataContent[0]);                           
        },
        setAlreadyLoading: (state, payload) => {            
            state[payload.storeVariable] = {};
            state[payload.storeVariable].fetching = true;
        },
        stopAlreadyLoading: (state, payload) => {
            state[payload.storeVariable].fetching = false;
        }
    },    
    actions: {      
        async fetch(context, payload) {                   
            debugger;            
            if( context.state[payload.storeVariable] === undefined ||
                !context.state[payload.storeVariable].fetching ||
                payload.refreshRequest){
                console.log("Wtf")
                context.commit('setAlreadyLoading', payload);                            
                return axios.get(payload.endpoint , {
                    Authorization : "Bearer " + context.rootState.profile.token
                })
                .then(function(r){                   
                    console.log('endpoint reached : ');
                    console.log(r);
                    payload.data = r.data;                    
                    context.commit('setContentState', payload);
                    context.commit('stopAlreadyLoading', payload);
                    return { error : false };
                }).catch(function(r){                      
                    return { error : true, message : r};
                });
            }            
        },
        async back(context, payload){
            payload.endpoint = context.state[payload.storeVariable].prev;
            return context.dispatch('fetch', payload);
            
        },
        async next(context, payload){
            payload.endpoint = context.state[payload.storeVariable].next;
            return context.dispatch('fetch', payload);
        }

    }
  }
  
  export default GridStore;