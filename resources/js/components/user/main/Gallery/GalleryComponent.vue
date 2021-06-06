<template>
    <div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button
                    class="nav-link active"
                    id="nav-home-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#images"
                    type="button"
                    role="tab"
                    aria-controls="nav-home"
                    aria-selected="true"
                >
                    Images
                </button>
                <button
                    class="nav-link"
                    id="nav-profile-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#videos"
                    type="button"
                    role="tab"
                    aria-controls="nav-profile"
                    aria-selected="false"
                >
                    Videos
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div
                class="tab-pane fade show active"
                id="images"
                role="tabpanel"
                aria-labelledby="nav-home-tab"
            >
                <image-component />
            </div>
            <div
                class="tab-pane fade"
                id="videos"
                role="tabpanel"
                aria-labelledby="nav-profile-tab"
            >
                Videos
            </div>
        </div>
    </div>
</template>

<script>
import ImageComponent from './ImageComponent';

export default {
    name: 'GalleryComponent',
    components: {
        ImageComponent,
    },
    props: {
        womanId: {
            type: Number,
            required: true,
        },

    }
}
</script>

<style scoped>

</style>