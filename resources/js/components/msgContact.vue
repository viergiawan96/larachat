<template>
    <div class="col-lg-8 border">
        <div class="pt-2 border-bottom">
            <h5>{{ usrfrom ? usrfrom : 'Select a Contact'}}</h5>    
        </div>
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
            Axios.get('/api/getuser')
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
                return;
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
    computed:{
        usrfrom(){
            return this.$store.getters.usrFrom;
        }
    },
    components: {
        MessagesFeed,
        MessageComposer
    }
}
</script>