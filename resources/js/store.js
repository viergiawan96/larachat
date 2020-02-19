export default{
    state: {
        user:[],
        idUser: 0,
        idusrFrom:0,
        filmsg:[],
        usrFrom:''
    },
    getters: {
        user(state){
            return state.user;
        },
        idUser(state){
            return state.idUser;
        },
        filmsg(state) {
            return state.filmsg;
        },
        usrFrom(state) {
            return state.usrFrom;
        },
        idusrFrom(state) {
            return state.idusrFrom;
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
        getFilMsg(state, Filmsg) {
            state.filmsg = Filmsg;
        },
        getidUsrFrom(state, idusrFrom) {
            state.idusrFrom = idusrFrom;
        },
        pushMsg(state, msgNew){
            state.filmsg.push(msgNew);
        },
        updRead(state) {
                let usr = state.user.filter(user =>  user.id == state.idusrFrom);
                usr[0].unread = 0;
        },
        updUnRead(state, message) {
            let unread = state.user.filter(user => user.id == message.from);
                unread[0].unread += 1;
        }
    },
    actions: {
        pushMsg({commit}, msgNew) {
            commit('pushMsg',msgNew);
        },
        updUsrId({commit}, id) {
            commit('updUsrId', id)
        },
        getidUsrFrom({commit}, idusrFrom) {
            commit('getidUsrFrom', idusrFrom)
        },
        getUser({commit}, user) {
            commit('getUser', user)
        },
        getFilMsg({commit}, Filmsg) {
            commit('getFilMsg', Filmsg)
        },
        updRead({commit}) {
            commit('updRead')
        },
        updUnRead({commit}, message) {
            commit('updUnRead', message)
        }
    }
};