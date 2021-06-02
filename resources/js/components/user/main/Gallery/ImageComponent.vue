<template>
    <div>
        <div class="row">
            <div
                class="gallery"
            >
                <div v-for="(image, index) in images" class="item" @click="showImg(index)">
                    <figure>
                        <img :src="image.src" :alt="image.id">
                    </figure>
                </div>
            </div>
        </div>
        <vue-easy-lightbox
            :visible="visible"
            :imgs="images"
            :index="index"
            @hide="handleHide"
        ></vue-easy-lightbox>
    </div>
</template>

<script>
import imageService from '../../../../services/main/imageService';

export default {
    name: 'ImageComponent',
    props: {
        womanId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            images: [],
            visible: false,
            index: 0,
        }
    },
    mounted() {
        this.getImages();
    },
    methods: {
        getImages() {
            imageService.getImages(this.womanId)
                .then((response) => {
                    this.images = response.data;
                })
            ;
        },
        showImg(index) {
            this.index = index
            this.visible = true
        },
        handleHide() {
            this.visible = false
        }
    }
}
</script>

<style scoped>
.gallery {
    display: flex;
    flex-wrap: wrap;
}

.item {
    width: 200px;
    height: 200px;
    margin: 10px;
}

</style>