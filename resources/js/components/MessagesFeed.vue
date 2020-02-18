<template>
    <div class="feed mb-1 container rounded shadow" ref="feed">
        <ul>
            <li v-for="msg in msgFill" :key="msg.id"  :class="`message${msg.to == getIdusr ? ' sent' : ' received'}`">
                <div class="text">
                    {{msg.text}}
                </div>
                <div class="date mb-3">
                    {{formatDate(msg.created_at)| dateFormat('DD MMM') }} | {{formatDate(msg.created_at)| dateFormat('HH:mm A') }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    methods: {
        scrollBottom(){
            setTimeout(() => {
                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            }, 50);
        },
        formatDate(date) {
            let value = date.replace(/-/g,".");
            return new Date(value);
        }
    },
    watch: {
        getIdusr(getIdusr) {
            this.scrollBottom();
        },
        msgFill(msgFill) {
            this.scrollBottom();
        }
    },
    computed:{
        msgFill() {
            return this.$store.getters.filmsg;
        },
        getIdusr(){
            return this.$store.getters.idUser;
        }
    }
}
</script>

<style lang="scss" scoped>
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  display: none;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
.feed {
    height: 100%;
    max-height: 350px;
    overflow: auto;
    box-shadow: 0 1px 0.5px rgba(0,0,0,.13);
    background-image: url("https://66.media.tumblr.com/53a35e7ed66f3159e01f3663af30706b/tumblr_ouztgbH0CG1vj8v9mo1_400.png");
    ul {
        list-style-type: none;
        padding: 50px;
        li {
            &.message {
                margin: 5px 0;
                width: 100%;
                .date{
                    font-size: 9px;
                    font-weight: bold;
                    opacity: 80%;
                }
                .text {
                    max-width: 100%;
                    border-radius: 7.5px;
                    padding: 4px;
                    display: inline-block;
                }
                &.received {
                    text-align: right;
                    .text {
                        background: #b2b2b2;
                        padding-right: 50px;
                        padding-left: 10px;
                    }
                }
                &.sent {
                    text-align: left;
                    .text {
                        background: #81c4f9;
                        padding-right: 50px;
                        padding-left: 10px;
                    }
                }
            }
        }
    }
}
</style>