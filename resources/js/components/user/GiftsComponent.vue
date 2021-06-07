<template>
    <div>
        <div class="modal-body">
            <div class="gifts_wrap">
                <figure
                    ref="gifts"
                    class="figure"
                    v-for="(gift, index) in gifts"
                >
                    <img
                        :src="gift.url"
                        :alt="gift.name"
                        class="gift"
                        @click="selectGift(index)"
                    >
                </figure>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click="send(index)">Send</button>
        </div>
    </div>
</template>

<script>
import giftService from '../../services/main/giftService';

export default {
    name: 'GiftsComponent',
    props: {
        womanId: {
            type: Number,
            required: true,
        },
    },
    mounted() {
        giftService.getGifts()
            .then((response) => {
                this.gifts = response.data;
            })
        ;
    },
    data() {
        return {
            gifts: [],
            index: undefined,
        }
    },
    methods: {
        selectGift(index) {
            this.index = index;
            this.$refs.gifts.forEach((gift) => {
                gift.classList.remove('gift_select')
            })
            this.$refs.gifts[index].classList.add('gift_select');
        },
        send(index) {
            const payload = {
                woman_id: this.womanId,
                gift_id: index,
            };

            giftService.storeGift(payload);
        }
    }
}
</script>

<style lang="scss" scoped>
.gifts_wrap {
    display: flex;
    flex-wrap: wrap;

    .gift {
        width: 100px;
        height: 100px;
    }
}

.gift_select {
     border: solid 1px red;
 }

</style>