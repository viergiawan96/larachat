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
        components: {
            listContact,
            msgContact
        }

    }

</script>
