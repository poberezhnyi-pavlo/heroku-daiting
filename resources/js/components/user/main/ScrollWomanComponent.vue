<template>
    <vue-scroll
        :ops="ops"
        @load-start="getWoman"
    >
        <div class="pr-wrap">
            <template v-for="(women, index) in woman">
                <div
                    :key="index"
                >
                    <img :src="women.avatar" :alt="women.full_name" class="avatar">
                    <div class="card-body">
                        <div class="card-title">
                            <a href="#">{{ women.full_name }}</a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </vue-scroll>
</template>

<script>
import vuescroll from 'vuescroll';
import womenService from '../../../services/main/womenService';

export default {
    name: 'ScrollWomanComponent',
    components: {
        vuescroll,
    },
    data() {
        const ops = {
            vuescroll: {
                mode: 'slide',
                pullRefresh: {
                    enable: true
                },
                pushLoad: {
                    enable: true,
                    auto: true,
                    autoLoadDistance: 10
                },
                scrollPanel: {
                    easing: 'easeInQuad',
                    speed: 800,
                },
                wheelDirectionReverse: true,
            }
        };

        return {
            woman: [],
            ops,
            itemAmount: 3,
        }
    },
    methods: {
        getWoman(from = 0) {
            womenService.getWomanForScroll(from)
                .then((response) => {
                    this.woman = response.data
                })
            ;
        }
    }
}
</script>

<style lang="scss" scoped>
.pr-wrap {
    height: 400px;
    width: auto;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
    overflow-x: auto;

    .avatar {
        object-fit: cover;
        min-width: 350px;
        height: 300px
    }
}
</style>