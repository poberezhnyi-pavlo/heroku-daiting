<template>
    <div>
        <homepage-slide-form
            @success="getAllSlides"
        />
        <div class="pb-3"></div>
        <draggable
            v-model="slides"
            @start="drag=true"
            @change="itemMoved"
            @end="onDrag"
        >
            <transition-group
                class="row"
                tag="div"
                type="transition"
                name="flip-list"
            >
                <div v-for="slide in slides"  :key="slide.id" class="col-md-2 col-sm-4 col-6">
                    <div class="card card-outline card-white">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool"><i class="fas fa-expand-arrows-alt"></i>
                                </button>
                                <edit-slide-button
                                    :slideId="slide.id"
                                    @success="getAllSlides"
                                />
                                <delete-slide-button
                                    :slideId="slide.id"
                                    @reloadData="getAllSlides"
                                />
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <img
                            :src="slide.url"
                            alt="Slide image"
                            class="square-img"
                        >
                        <!-- /.card-body -->
                    </div>
                </div>
            </transition-group>
        </draggable>
        <p v-if="slides.length < 1" class="text-muted">
            The Slide list is empty. Please create the new one.
        </p>
    </div>
</template>

<script>

import axios from "axios";
import draggable from 'vuedraggable'
import errorsMixin from "../../mixins/errorsMixin";
import DeleteSlideButton from "./Buttons/DeleteSlideButton";
import EditSlideButton from "./Buttons/EditSlideButton";

const HOMEPAGE_SLIDE_GET_URL = '/api/admin/slides/';
const HOMEPAGE_SLIDE_CHANGE_ORDER_ORL = '/api/admin/slides/changeOrder';

export default {
    name: 'HomepageSlides',
    mixins: [
        errorsMixin,
    ],
    components: {
        EditSlideButton,
        draggable,
        DeleteSlideButton,
    },
    data: function() {
        return {
            slides: {},
        }
    },
    methods: {
        getAllSlides() {
            axios.get(HOMEPAGE_SLIDE_GET_URL)
            .then(response => {
                this.slides = response.data;
            });
        },
        onDrag() {
            this.drag=false
            this.sendData();
        },
        itemMoved() {
            this.slides = _.each(this.slides, (element, index) => {
                element.order = index;
            });
        },
        sendData() {
            return axios.put(
                HOMEPAGE_SLIDE_CHANGE_ORDER_ORL,
                this.slides,
            ).catch((error) => {
                this.errors = error.response.data.errors;
                this.mainError = error.response.data.message;
            });
        },
    },
    beforeMount() {
        this.getAllSlides();
    }
}
</script>

<style scoped lang="scss">
.square-img {
    float: left;
    width: 100%;
    height: 150px;
    min-height: 100%;
    object-fit: cover;
}
.flip-list-move {
    transition: transform .4s;
}
.card-header {
    padding: .3rem 1rem;
}

.btn-tool .fa-expand-arrows-alt {
    cursor: move;
}
</style>
