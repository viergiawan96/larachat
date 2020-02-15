<template>
    <div class="container">
        <div class="row">
            <msgContact/>
            <listContact/>
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
                    this.$store.dispatch('pushMsg');
                    return;
                }
                alert("Hello! I am an alert box!!");
            }
        },
         mounted() {
            Echo.private(`messages.${this.$store.getters.idUser}`)
                .listen('SendGlobalNotification', (e) => {
                    this.hanleIncoming(e.message);
                    alert("Hello! I am an alert box!!");
                });
        },
        components: {
            listContact,
            msgContact
        }

    }

</script>
