<template>
    <draggable
        v-model="list"
        @start="drag=true"
        @end="onDrag"
    >
        <transition-group
            type="transition"
            name="flip-list"
        >
            <div
                class="img-wrapper"
                v-for="(item, index) in list"
                :key="item.id"
            >
                <img
                    :key="item.id"
                    alt="image"
                    :src="item.uri"
                >
                <i
                    class="fas fa-minus-circle"
                    @click="removeImage(item, index)"
                ></i>
            </div>
        </transition-group>
    </draggable>

</template>

<script>
import draggable from 'vuedraggable';
import axios from 'axios';

export default {
    name: "DraggableImages",
    props: {
        images: {}
    },
    data() {
        return {
            list: this.images,
        }
    },
    components: {
        draggable,
    },
    methods: {
        onDrag() {
            this.drag=false
            this.sendData();
        },
        sendData() {
            return axios.put(
                '/api/admin/changeImageOrder',
                this.list,
            );
        },
        removeImage(item, index) {
            return axios.delete(
                '/api/admin/removeImage/' + item.id
            ).then(this.list.splice(index, 1))
                .catch((e) => {
                        console.log(e);
                    }
                );
        },
    },

}
</script>

<style lang="scss" scoped>

.img-wrapper {
    float: left;
    position: relative;

    img {
        height: 60px;
        cursor: move;
        margin: 5px;
        border-radius: 5px;
    }
}

.flip-list-move {
    transition: transform .4s;
}

.no-move {
    transition: transform 0s;
}

i.fa-minus-circle {
    color: firebrick;
    position: absolute;
    left: -5px;
    top: -5px;

    &:hover {
        color: #e3342f;
        cursor: pointer;
    }
}
</style>
