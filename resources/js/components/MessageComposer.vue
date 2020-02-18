<template>
    <div class="composer">
        <textarea class="shadow" v-model="message" v-on:keyup.enter.ctrl="send" placeholder="message.."></textarea>
    </div>
</template>

<script>
export default {
    data() {
        return{
            message: ''
        }
    },
    methods: {
        send(e){
            e.preventDefault();

            if (this.message == ''){
                return;
            }
            this.$emit('send', this.message);
            this.message='';
        }
    }
}
</script>

<style lang="scss" scoped>
.composer textarea {
    width: 100%;
    resize: none;
    border-radius: 3px;
    border: 1px solid lightgray;
    padding: 6px;
}
</style>