<template>
    <div class="col-lg-8 border">
        <div class="pt-2 border-bottom">
            <h5>Faissa</h5>    
        </div>
            <MessagesFeed/>
            <MessageComposer/>
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
        }
    },
     mounted(){
        this.$store.commit('updUsrId',this.$userId);
        this.loadUser();
    },
    components: {
        MessagesFeed,
        MessageComposer
    }
}
</script>