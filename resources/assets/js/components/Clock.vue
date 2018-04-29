<template>
    <div id="clock">
        <a href="https://time.is/London" id="time_is_link" rel="nofollow"></a>
        <span class="clock" id="London_z716"></span>
    </div>
</template>

<script>
    export default {
        mounted() {
            time_is_widget.init({London_z716:{template:"TIME DATE", time_format:"hours:minutes", date_format:"dayname daynum/monthnum/year"}});
        }
    }
</script>
