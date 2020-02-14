<template>
    <div class="feed mb-3" ref="feed">
        <ul>
            <li v-for="msg in msgFill" :key="msg.id"  :class="`message${msg.to == getIdusr ? ' sent' : ' received'}`">
                <div class="text">
                    {{msg.text}}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
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
.feed {
    height: 100%;
    max-height: 350px;
    overflow: auto;
    ul {
        list-style-type: none;
        padding: 5px;
        li {
            &.message {
                margin: 5px 0;
                width: 100%;
                .text {
                    max-width: 100%;
                    border-radius: 5px;
                    padding: 8px;
                    display: inline-block;
                }
                &.received {
                    text-align: right;
                    .text {
                        background: #b2b2b2;
                    }
                }
                &.sent {
                    text-align: left;
                    .text {
                        background: #81c4f9;
                    }
                }
            }
        }
    }
}
</style>