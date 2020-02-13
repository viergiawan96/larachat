<template>
    <div class="feed mb-3" ref="feed">
        <ul>
            {{msgFromTo}}
            <li v-for="msg in msgFromTo" :key="msg.id">
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
        msgFromTo() {
            return this.$store.getters.filmsg.from;
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