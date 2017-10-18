<template>
    <img class="polaroid" v-bind:class="{ 'my-hidden': invisible }" :src="url" />
</template>

<script>
    export default {
        props: ["url"],
        data: () => ({
            invisible: true,
        }),
        methods: {
            show() {
                const self = this;
                setTimeout(function() { self.invisible = false }, 50);
            }
        },
        mounted() {
            // We need this async step for the animation
            this.show();
        },
    }
</script>
