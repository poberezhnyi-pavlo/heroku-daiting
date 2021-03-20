<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addHomeSlide">
            Add slide
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addHomeSlide" tabindex="-1" aria-labelledby="addHomeSlideLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addHomeSlideLabel">Add homepage slide</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="tabs-lang-tab" role="tablist">
                                        <li v-for="(locale, name, index) in $locales" class="nav-item">
                                            <a
                                                class="nav-link"
                                                :class="index === 0 ? 'active' : ''"
                                                :id="'tabs-' + name + '-tab'"
                                                data-toggle="pill"
                                                :href="'#tabs-' + name"
                                                role="tab"
                                                :aria-controls="'tabs-' + name"
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
                                            :id="'tabs-' + name"
                                            role="tabpanel"
                                            :aria-labelledby="'tabs-' + name + '-tab'"
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
                                                    v-model.trim="formData[name].secondaryText"
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
                                <div class="form-group">
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
                                            <label class="custom-file-label" for="slideImage">Choose image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                                ref="closeButton"
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
    </div>
</template>

<script>
import axios from "axios";
import errorsMixin from "../../mixins/errorsMixin";
import urlConsts from "../../mixins/urlConsts";

export default {
    name: "HomepageSlideForm",
    mixins: [
        errorsMixin,
    ],
    computed: {
        formData: function () {
            return _.keys(this.$locales).reduce((acc, curr) => (acc[curr] = {}, acc), {});
        }
    },
    methods: {
        submitData() {
            const formDataObj = new FormData();

            for (const name in this.formData) {
                formDataObj.append(`${name}[title]`, this.formData[name].title || null);
                formDataObj.append(`${name}[body]`, this.formData[name].secondaryText || null);
            }


            formDataObj.append('image', this.formData.image);

            this.sendData(formDataObj);
        },
        fileHandler(event) {
            this.formData.image = event.target.files[0];
        },
        sendData(formDataObj) {
            axios.post(urlConsts.HOMEPAGE_SLIDE_URL, formDataObj, {
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
        closeModal() {
            this.$refs.closeButton.click();
        },
    },
}
</script>

<style scoped>

</style>
