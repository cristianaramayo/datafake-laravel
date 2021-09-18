<template>
    <Link :href="'/'">
       <img src="/images/logo-datatuill.png" alt="Datatuill" style="width:126px;">
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
