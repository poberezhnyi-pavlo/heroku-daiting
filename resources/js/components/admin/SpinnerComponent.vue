<template>
    <div class="text-center spinner-wrapper">
        <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SpinnerComponent"
    }
</script>

<style lang="scss" scoped>
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }
    .spinner-wrapper {
        position: absolute;
        top: 50%;
        right: calc(50% - 175px);
        transform: translate(-50%, -50%);

        @media (max-width: 992px) {
            right: calc(50% - 4.6rem);
        }

        @media (max-width: 992px) {
            right: 44%;
        }

        @media (max-width: 600px) {
            right: 35%;
        }
    }
</style>
