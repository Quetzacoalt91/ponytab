<template>
    <div class="content">
        <div id="slideShowPanel">
            <photo v-bind:url="photos[photo]" v-for="photo in range"></photo>
        </div>
        <div id="clockOverlay" class="overlay" v-bind:class="{ night: night }">
            <clock />
        </div>
  
        <button type="button" class="hidden" v-on:click="addPhoto()">Display 1 photo</button>
    </div>
</template>

<script>
    export default {
        data: () => ({
            photos: [],
            range: 0,
        }),
        computed: {
            night: function () {
                const n = (new Date()).getHours();

                return (n < 10 || n >= 22);
            },
        },
        methods: {
            getPhotos() {
                this.$http.get('content').then((response) => {
                    this.photos = response.data;
                });
            },
            addPhoto() {
                if (this.range < this.photos.length) {
                    this.range += 1;
                } else {
                    this.range = 0;
                    this.getPhotos();
                }
            }
        },
        mounted() {
            console.log('Component ready.');
            console.log('Night mode', this.night);
            this.getPhotos();
            setInterval(() => {
                this.addPhoto();
            }, 10000);
        }
    }
</script>
