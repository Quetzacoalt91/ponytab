<template>
    <div class="content">
        <div id="slideShowPanel">
            <photo v-bind:url="photos[photo]" v-for="photo in range"></photo>
        </div>
        <div id="clockOverlay" class="overlay" v-bind:class="{ night: night }">
            <div id="clock">
                <a href="https://time.is/London" id="time_is_link" rel="nofollow"></a>
                <span class="clock" id="London_z716"></span>
            </div>
        </div>
  
        <button type="button" v-on:click="addPhoto()">Display 1 photo</button>
    </div>
</template>

<script>
    export default {
        data: () => ({
            night: true,
            photos: [],
            range: 0,
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
            addPhoto() {
                if (this.range < this.photos.length) {
                    this.range += 1;
                }
            },
        },
        mounted() {
            console.log('Component ready.');
            this.checkTime();
            this.getPhotos();
        }
    }
</script>
