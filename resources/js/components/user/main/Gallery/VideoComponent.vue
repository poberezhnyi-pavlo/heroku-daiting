<template>
    <div>
        <div class="row">
            {{ videos }}
            <div
                class="gallery"
            >
                <youtube ref="youtube" @playing="playing"></youtube>
            </div>
        </div>
    </div>
</template>

<script>
import {Youtube} from 'vue-youtube';
import videoService from '../../../../services/main/videoService';

export default {
    name: 'VideoComponent',
    components: {
        Youtube,
    },
    props: {
        womanId: {
            type: Number,
            required: true,
        },
    },
    computed: {
        player() {
            return this.$refs.youtube.player;
        },
    },
    mounted() {
        this.getVideos();
        this.loadVideo();
    },
    data() {
        return {
            videos: [],
            visible: false,
            index: 0,
        }
    },
    methods: {
        showVideo(index) {
            this.index = index;
            this.visible = true;
        },
        getVideos() {
            videoService.getVideos(this.womanId)
                .then((response) => {
                    this.videos = response.data;
                })
            ;
        },
        playing() {
            console.log('\o/ we are watching!!!')
        },
        loadVideo() {
            this.player.loadVideoById({
                videoId: this.videos[0].youtube_video_id,
            });
        },
    }
}
</script>

<style scoped>

</style>