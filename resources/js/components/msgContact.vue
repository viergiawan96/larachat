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

export default {
    components: {
        MessagesFeed,
        MessageComposer
    }
}
</script>