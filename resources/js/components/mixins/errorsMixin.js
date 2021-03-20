import Vue from "vue";

export default {
    data() {
        return {
            errors: {},
            mainError: '',
        }
    },
    methods: {
        handleError(error) {
            Vue.$toast.error(error);
        },
        handleSuccess(success) {
            Vue.$toast.success(success);
        },
    },
    watch: {
        errors: function () {
            Vue.$toast.error(this.mainError);

            for (const key in this.errors) {
                this.errors[key].forEach(error => {
                    Vue.$toast.warning(error);
                });
            }
        },
    },
}
