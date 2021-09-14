<template>
    <Link :href="'/'">
       <img src="/images/logo.jpg" alt="Datatuill" style="width:126px;">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
