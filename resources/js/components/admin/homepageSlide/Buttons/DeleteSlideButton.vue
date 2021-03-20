<template>
    <button
        type="button"
        class="btn btn-tool"
        @click="handleSlide"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
</template>

<script>
import axios from "axios";
import urls from "../../../mixins/urlConsts";

export default {
    name: "DeleteSlideButton",
    props: {
        slideId: {
            type: Number,
            required: true
        },
    },
    methods: {
        handleSlide() {
            this.$swal({
                title: 'Do you want to delete the slide?',
                showCancelButton: true,
                confirmButtonText: `Delete`,
                confirmButtonColor: '#f60505',
                icon: 'warning',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteSlide();
                }
            });
        },
        deleteSlide() {
            axios.delete(urls.HOMEPAGE_SLIDE_URL + this.slideId)
                .then(() => {
                    this.$swal('Deleted!', '', 'success');
                    this.$emit('reloadData')
                })
                .catch(() => {
                    this.$swal('Something went wrong :(', '', 'error')
                });
    }
    },

}
</script>

<style>

</style>
