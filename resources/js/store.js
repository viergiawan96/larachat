export default{
    state: {
        user:[],
        idUser: 0,
        filmsg:{
            from:[],
            to:[]
        },
        usrFrom:''
    },
    getters: {
        user(state){
            return state.user.filter(function (user) {
                return user.id != state.idUser
            })
        },
        idUser(state){
            return state.idUser;
        },
        filmsg(state) {
            return state.filmsg;
        },
        usrFrom(state) {
            return state.usrFrom;
        }
    },
    mutations: {
        UpdUsr(state, usr){
            state.user = usr;
        },
        updUsrId(state, id){
            state.idUser = id;
        },
        getUser(state, user) {
            state.usrFrom = user;
        },
        getFromTo(state, fromTo) {
            state.filmsg.from = fromTo.msgFrom;
            state.filmsg.to = fromTo.msgTo;
        }
    },
    actions: {

    }
};