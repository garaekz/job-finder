export default {
	state: {
    profile: null
	},
	getters: {
    profile: state => state.profile,
  },
  mutations: {
    SET_PROFILE(state, data) {
      console.log(data);
      return state.profile = data
    }
	},
	actions: {
    fetchProfile({ commit }){
      axios.get("api/perfil")
      .then((response)=>{
        commit("SET_PROFILE", response.data.user);
        return response.data;
      })
      .catch(()=>{
        console.log("Error........");
      })
    }
	},
}
