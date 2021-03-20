<template>
    <span>
        <button
            type="button"
            class="btn btn-tool"
            data-toggle="modal"
            data-target="#editHomeSlide"
            @click="showModalMethod"
        >
            <i class="fas fa-pencil-alt"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" v-if="showModal" id="editHomeSlide" tabindex="-1" aria-labelledby="editHomeSlideLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editHomeSlideLabel">Edit homepage slide</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showModal = false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" v-if="Object.keys(formData).length > 0">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="tabs-lang-tab" role="tablist">
                                        <li v-for="(locale, name, index) in $locales" class="nav-item">
                                            <a
                                                class="nav-link"
                                                :class="index === 0 ? 'active' : ''"
                                                :id="'tabs-' + name + '-tab'  + '-slide-' + slideId"
                                                data-toggle="pill"
                                                :href="'#tabs-' + name + '-slide-' + slideId"
                                                role="tab"
                                                :aria-controls="'tabs-' + name  + '-slide-' + slideId"
                                                aria-selected="true"
                                            >
                                                {{locale.name}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content" id="tabs-slide-tabContent">
                                        <div
                                            v-for="(locale, name, index) in $locales"
                                            :key="name"
                                            class="tab-pane fade"
                                            :class="index === 0 ? 'active show' : ''"
                                            :id="'tabs-' + name  + '-slide-' + slideId"
                                            role="tabpanel"
                                            :aria-labelledby="'tabs-' + name + '-tab' + '-slide-' + slideId"
                                        >
                                            <div class="form-group">
                                                <label :for="'slideTitle-' + name">Slide title</label>
                                                <input
                                                    v-model.trim="formData[name].title"
                                                    type="text"
                                                    class="form-control"
                                                    :id="'slideTitle-' + name"
                                                    placeholder="Enter slide title"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <label :for="'secondaryText-' + name">Slide secondary text</label>
                                                <textarea
                                                    v-model.trim="formData[name].body"
                                                    class="form-control"
                                                    rows="3"
                                                    placeholder="Enter secondary text..."
                                                    :id="'secondaryText-' + name"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="card card-primary">
                                <div class="form-group" v-if="removeImage">
                                    <label for="slideImage">Slide image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input
                                                type="file"
                                                class="custom-file-input"
                                                id="slideImage"
                                                accept="image/x-png,image/jpeg"
                                                @change="fileHandler($event)"
                                            >
                                            <label class="custom-file-label" for="slideImage">
                                                {{ imageName || 'Choose image' }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-wrap" v-else>
                                    <button
                                        @click.prevent="removeImage = true"
                                        class="btn btn-danger btn-xs btn-badge"
                                    >
                                        <i class="far fa-times-circle"></i>
                                    </button>
                                    <img
                                        :src="formData.uri"
                                        alt="Slide image"
                                        class="img-thumbnail slide-image"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                                ref="closeButton"
                                @click="showModal = false"
                            >Close</button>
                            <button
                                type="button"
                                class="btn btn-primary"
                                @click.prevent="submitData()"
                                :disabled="!formData"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </span>
</template>

<script>

import axios from "axios";
import errorsMixin from "../../../mixins/errorsMixin";
import urlConsts from "../../../mixins/urlConsts";

export default {
    name: "EditSlideButton",
    mixins: [
        errorsMixin,
    ],
    props: {
        slideId: {
            type: Number,
            required: true
        },
    },
    data() {
        return {
            formData: {},
            showModal: false,
            removeImage: false,
            imageName: null,
        }
    },
    methods: {
        submitData() {
            const formDataObj = new FormData();

            for (const name in this.formData) {
                if (_.isObject(this.formData[name])) {
                    formDataObj.append(`${name}[title]`, this.formData[name].title || null);
                    formDataObj.append(`${name}[body]`, this.formData[name].body || null);
                }
            }

            if (!_.isUndefined(this.formData.image)) {
                formDataObj.append('image', this.formData.image);
            }
            formDataObj.append('_method', 'put');

            this.sendData(formDataObj);
        },
        fileHandler(event) {
            this.imageName = event.target.files[0].name;
            this.formData.image = event.target.files[0];
        },
        sendData(formDataObj) {
            axios.post(urlConsts.HOMEPAGE_SLIDE_URL + this.slideId, formDataObj, {
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'multipart/form-data',
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
        getData() {
            axios.get(urlConsts.HOMEPAGE_SLIDE_URL + this.slideId)
                .then(res => {
                    this.formData = res.data;
                });
        },
        closeModal() {
            this.showModal = false;
            this.$refs.closeButton.click();
        },
        showModalMethod() {
            this.getData();
            this.showModal = true;
        },
    },
}
</script>

<style scoped lang="scss">
    .button-wrap {
        width: fit-content;
        position: relative;

        .slide-image {
            height: 80px;
            width: 80px;
            object-fit: cover;
        }

        .btn-badge {
            position: absolute;
            right: -10px;
            top: -3px;
        }
    }
</style>
