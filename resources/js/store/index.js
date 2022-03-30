import { createStore } from 'vuex';
export default createStore({

	state: {
     user: {
     	email: 'loyd',
     },
     userRequests:''
	},

	getters: {

	},

	actions: {
 		async userRequest({state}){
 			await axios.get('/api/userRequest').then(res =>{
 				state.userRequests = res.data;
 				console.log(res.data);
 			});
 		}
	},

	mutations: {
     
	}
})