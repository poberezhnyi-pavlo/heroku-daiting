<template>
    <div style="width: 100%">
        <carousel
            ref="carousel"
            :per-page="3"
            :mouse-drag="false"
            :pagination-enabled="false"
            :navigation-enabled="true"
            @pageChange="changePage"
        >
            <slide
                v-for="(item, key) in woman" :key="key"
            >
                <div class="woman-scroll-slide">
                    <img :src="item.avatar" :alt="item.full_name" class="avatar">
                    <a :href="link(key)">{{ item.full_name }}</a>
                </div>
            </slide>
        </carousel>
    </div>
</template>

<script>
import womenService from '../../../services/main/womenService';
import {Carousel, Slide} from 'vue-carousel';

export default {
    name: 'ScrollWomanComponent',
    components: {
        Carousel,
        Slide,
    },
    props: {
        lang: {
            type: String,
            default: 'en',
        }
    },
    mounted() {
        console.log(this.prefix)
        this.getWoman(0, 6);
        setTimeout(() => {
            this.$refs.carousel.$forceUpdate()
        }, 4000)
    },
    data() {
        return {
            woman: [],
            countWomen: 3,
        }
    },
    methods: {
        getWoman(from = 0, count = 3) {
            womenService.getWomanForScroll(from, count)
                .then((response) => {
                    this.woman.push(...response.data);
                })
            ;
        },
        changePage(page) {
            this.getWoman(page * this.countWomen);
        },
        link(id) {
            // TODO fixed get locale
            return `${this.lang}/ladies/${id}`;
        }
    }
}
</script>

<style>
.woman-scroll-slide {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.avatar {
    object-fit: cover;
    width: 300px;
    max-width: 100%;
}
</style>