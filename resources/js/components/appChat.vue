<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Messager</h4>
                    </div>
                    <div class="card-body row">
                        <msgContact/>
                        <listContact/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import msgContact from './msgContact.vue';
    import listContact from './listContact.vue';

    export default {
        methods: {
            hanleIncoming(message){
                let idusrFrom = this.$store.getters.idusrFrom;
                if( message.from == idusrFrom ){
                    this.$store.dispatch('pushMsg',message);
                    return;
                }else if(message.to == this.idUser && message.from != idusrFrom) {
                    this.$store.dispatch('updUnRead', message);
                    return;
                }
            }
        },
         mounted() {
            Echo.private(`messages.${this.$store.getters.idUser}`)
                .listen('SendGlobalNotification', (e) => {
                    this.hanleIncoming(e.message);
                });
        },
            computed:{
            usrfrom(){
                return this.$store.getters.usrFrom;
            }
        },
        components: {
            listContact,
            msgContact
        }

    }

</script>

<style lang="scss" scoped>
.avatar img{
            width: 40px;
            border-radius: 50%;
        }
.avatar h5 {
    text-align: center;
    margin-left: 50px;
}
</style>
