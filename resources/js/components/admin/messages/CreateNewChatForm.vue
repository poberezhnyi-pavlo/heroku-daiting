<template>
    <div>
        <button
            type="button"
            class="btn btn-success mb-3"
            data-toggle="modal"
            data-target="#createChat"
            @click="showModalMethod"
        >
            Create New Discussion
        </button>
        <div class="modal fade" v-if="showModal" id="createChat" tabindex="-1" aria-labelledby="createChatLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createChatLabel">Create New Chat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showModal = false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">From</label>
                                    <div class="col-sm-10">
                                        <multiselect
                                            v-model="selectedWoman"
                                            :options="women"
                                            :close-on-select="true"
                                            :clear-on-select="false"
                                            placeholder="Select Woman"
                                            label="name"
                                            track-by="name"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">To</label>
                                    <div class="col-sm-10">
                                        <multiselect
                                            v-model="selectedMan"
                                            :options="men"
                                            :close-on-select="true"
                                            :clear-on-select="false"
                                            placeholder="Select Man"
                                            label="name"
                                            track-by="name"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Chat subject</label>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter a Subject"
                                            v-model="subject"
                                        >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Message</label>
                                    <div class="col-sm-10">
                                        <twemoji-picker
                                            :emojiData="emojiDataAll"
                                            :emojiGroups="emojiGroups"
                                            :searchEmojisFeat="true"
                                            pickerPlacement="top-end"
                                            searchEmojiPlaceholder="Search here."
                                            searchEmojiNotFound="Emojis not found."
                                            isLoadingLabel="Loading..."
                                            pickerWidth="#messageArea"
                                            @emojiUnicodeAdded="onEmojiAdd"
                                            class="emoji-container"
                                        ></twemoji-picker>
                                        <textarea
                                            id="messageArea"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Enter message..."
                                            v-model="message"
                                            ref="messageArea"
                                        ></textarea>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-dismiss="modal"
                                ref="closeButton"
                                @click="showModal = false"
                            >Cancel</button>
                            <button
                                type="button"
                                class="btn btn-primary"
                                @click.prevent="submitData()"
                                :disabled="!message || !selectedMan || !selectedWoman"
                            >
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import {
    TwemojiPicker
} from '@kevinfaguiar/vue-twemoji-picker';
import EmojiAllData from '@kevinfaguiar/vue-twemoji-picker/emoji-data/en/emoji-all-groups.json';
import EmojiDataAnimalsNature from '@kevinfaguiar/vue-twemoji-picker/emoji-data/en/emoji-group-animals-nature.json';
import EmojiDataFoodDrink from '@kevinfaguiar/vue-twemoji-picker/emoji-data/en/emoji-group-food-drink.json';
import EmojiGroups from '@kevinfaguiar/vue-twemoji-picker/emoji-data/emoji-groups.json';
import urlConsts from "../../mixins/urlConsts";
import axios from "axios";
import errorsMixin from "../../mixins/errorsMixin";

export default {
    name: 'CreateNewChatForm',
    mixins: [
        errorsMixin,
    ],
    components: {
        Multiselect,
        'twemoji-picker': TwemojiPicker,
    },
    props: {
        men: {},
        women: {},
    },
    data() {
        return {
            showModal: false,
            selectedMan: null,
            selectedWoman: null,
            message: '',
            subject: '',
            cursor: null,
        }
    },
    computed: {
        emojiDataAll() {
            return EmojiAllData;
        },
        emojiGroups() {
            return EmojiGroups;
        }
    },
    methods: {
        onEmojiAdd(emoji) {
            let area = this.$refs.messageArea;
            let position = area.selectionStart;

            this.insertEmoji(position, emoji);

            area.focus();
            this.$nextTick(() => {
                area.selectionEnd = position + emoji.length
            })
        },
        insertEmoji(position, emoji) {
            this.message = this.message.slice(0, position)
                + emoji
                + this.message.slice(position);
        },
        showModalMethod() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
            this.$refs.closeButton.click();
        },
        submitData() {
            axios.post(urlConsts.MESSAGE_URL, {
                'subject': this.subject,
                'message': this.message,
                'from': this.selectedWoman.id,
                'to': this.selectedMan.id,
            }, {
                headers: {
                    Accept: 'application/json',
                }
            })
                .then((res) => {
                    this.handleSuccess('Success!');
                    this.closeModal();
                    this.$emit('success');
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    this.mainError = error.response.data.message;
                })
        },
    },
}
</script>

<style lang="scss" scoped>
    @import "~vue-multiselect/dist/vue-multiselect.min.css";

    .emoji-container {
        position: absolute;
        right: 0;
    }
</style>
