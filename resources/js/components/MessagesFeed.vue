<template>
    <div class="feed mb-3" ref="feed">
        <ul>
            <li class="message sent">
                <div class="text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                </div>
            </li>
            <li class="message received">
                <div class="text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    
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