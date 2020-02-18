<template>
    <div class="col-lg-9">
            <MessagesFeed/>
            <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
import MessagesFeed from './MessagesFeed.vue';
import MessageComposer from './MessageComposer.vue';
import Axios from "axios";

export default {
    methods:{
        loadUser(){
            axios.post('/api/getuser', {
                    id: this.$store.getters.idUser
                })
                .then((response) => {
                    this.$store.commit('UpdUsr',response.data);
                })
                .catch((error) =>{
                    console.log(error);
                })
        },
        sendMessage(text) {
            const usrFrom= this.$store.getters.usrFrom;
            const idUsrFrom = this.$store.getters.idusrFrom;
            if(!usrFrom){
                alert('Select a Contact');
            }

            Axios.post('/api/sendMsg',{
                idTo : idUsrFrom,
                idFrom : this.$userId,
                text: text
            })
            .then((response) => {
                this.$store.dispatch('pushMsg', response.data);
            })
            .catch((error) => {
                console.log(error);
            })

        }
    },
     mounted(){
        this.$store.dispatch('updUsrId',this.$userId);
        this.loadUser();
    },
    components: {
        MessagesFeed,
        MessageComposer
    }
}
</script>