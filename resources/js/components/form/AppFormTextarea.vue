<template>
    <textarea 
        :name="body"
        
        :id="body"
        @input="$emit('input', $event.target.value); resize($event)"
        :value="value"
    ></textarea>
</template>

<script>
    export default {
        props: {
            name: {
                required: true,
                type: String
            },

            value: {
                required: false
            }
        },
        methods: {
            resize (e) {
                e.target.style.heigth = 'auto'
                e.target.style.heigth = `${e.target.scrollHeight}px`
            }
        }
    }
</script>
<style scoped>

.textarea {
    width: 100;
    border: 2px solid #ddd;
    border-radius: 10px;
    font-size: inherit;
    outline: none;
    padding: 20px;
    min-height: 100px;
    box-sizing: border-box;
}
</style>