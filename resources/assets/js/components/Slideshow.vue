<template>
    <div class="content">
        <div id="slideShowPanel">
            
        </div>
        <div id="clockOverlay" class="overlay" v-bind:class="{ night: night }">
            <div id="clock">
                <a href="https://time.is/London" id="time_is_link" rel="nofollow"></a>
                <span class="clock" id="London_z716"></span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            night: true,
            photos: [],
        }),
        methods: {
            checkTime() {
                const n = (new Date()).getHours();

                if ((n < 10 || n >= 22) && !this.night) {
                    console.log('Switching to night mode');
                    this.night = true;
                } else if (n >= 10 && n < 22 && this.night) {
                    console.log('Switching to day mode');
                    this.night = false;
                }
            },
            getPhotos() {
                this.$http.get('content').then((response) => {
                    this.photos = response.data;
                });
            },
        },
        mounted() {
            console.log('Component ready.');
            this.checkTime();
            this.getPhotos();
        }
    }
</script>
