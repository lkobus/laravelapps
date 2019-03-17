import axios from 'axios';


const initialState = () => ({
  token: '',
  auth: {
      id : 0,
      name : '',
      email : '',
      photo : '',
      created_at: ''
      
  },
  info: {
      name : '',
      file : '',
      lastname : '',
      birthday : '',
      position : '',
  }    
});

const profile = {
  namespaced : true,
  state: initialState,
  mutations: {
    increment:  (state, payload) => {
      state.count = payload;
    },
    saveToken: (state, payload) => {      
      state.token = payload;
    },
    saveUser: (state,payload) => {
      state.auth.id = payload.id;
      state.auth.name = payload.name;
      state.auth.email = payload.email;
      state.auth.photo = payload.photo;
      state.auth.created_at = payload.created_at;
    },
    resetState (state, payload) {
      const initial = initialState()
      Object.keys(initial).forEach(key => { state[key] = initial[key] })
    },
  },
  actions: {
      async auth ({commit}, payload) {        
        var bodyFormData = new FormData();
        bodyFormData.set("email", payload.email);
        bodyFormData.set("password", payload.password);
        return axios({
          method: 'post',
          url: '/api/login',
          data: bodyFormData,
          config: { headers : { 'Content-Type' : 'form-data'}}
        }).then(function(response){                  
          commit('saveToken', response.data.success.token);      
          commit('saveUser', response.data.success.user);
          return { error : false, response : response};
        }).catch(function(e){                    
          return { error : true, message : 'email or password invalid.' }          
        });
      },
      async register ({commit}, payload){                  
          var params = Object.assign({}, payload);
          return  axios.post('/api/register', params)
          .then(function(r){
            return { error : false, response : r};
          }).catch(function(e){
            console.log("Its a error!!!!");
            return { error: true, message : e };
          });
      },
      async logout(context, payload){
        context.commit('resetState', payload);
        return { error : false, message : "ok"}
      },
      async isTokenValid(context, payload) {
        return axios.get('/api/validate-token', { 
          headers : {
            Authorization : "Bearer " + context.state.token 
          }
        })
        .then(function(r){          
          return { auth : true };
        }).catch(function(r){          
          return { auth : false};
        });
      }
      
  }
}

export default profile;