<template>
    <div>
        <div class="card card-info" v-for="(block, name, index) in initialData" :key="index">
            <div class="card-header">
                <h3 class="card-title">
                    {{name}}
                </h3>
            </div>

            <div class="form-horizontal">
                <component
                    v-for="(field, fieldIndex) in block"
                    :key="fieldIndex"
                    :is="field.fieldType"
                    :fieldData="field"
                    @valueChanged="setFieldData"
                >
                </component>

            </div>
        </div>
        <div class="card-footer">
            <button
                type="submit"
                class="btn btn-success btn-lg"
                @click="saveData()"
            >
                Save
            </button>
        </div>
        <!-- /.card-footer -->
    </div>
</template>

<script>
    import inputField from './fields/InputField'

    export default {
        name: "SettingsFormComponent",
        components: {
            inputField,
        },
        data: function() {
            return {
                formData: {},
            }
        },
        props: [
            'initialData',
        ],
        methods: {
            setFieldData(key, id, value) {
                this.formData[key] = {
                    id,
                    key,
                    value: parseFloat(value),
                }
            },
            saveData() {
                return axios.post('/admin/settings/update', this.formData)
                    .then((response) => {
                        console.log(response)
                        Vue.$toast.success('Settings updated successfully!')
                    })
                    .catch((error) => {
                        Vue.$toast.error('Something wrong :(')
                    });
            },
        },
    }
</script>

<style scoped>

</style>
