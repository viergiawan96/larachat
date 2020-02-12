import Axios from "axios";

export default{
    state: {
        user:[],
        idUser: 0
    },
    getters: {
        user(state){
            return state.user.filter(function (user) {
                return user.id != state.idUser
            })
        }
    },
    mutations: {
        UpdUsr(state, usr){
            state.user = usr;
        },
        updUsrId(state, id){
            state.idUser = id;
        }
    },
    actions: {

    }
};