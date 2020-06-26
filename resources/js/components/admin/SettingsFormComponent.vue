<template>
    <div class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    {{initialData[0].name}}
                </label>
                <div class="col-sm-4">

                    <div class="input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-dollar-sign"></i>
                                </span>
                        </div>
                        <input
                            name="id"
                            type="hidden"
                            :value="initialData[0].id"
                        >
                        <input
                            type="number"
                            class="form-control"
                            :id="initialData[0].id"
                            :name="initialData[0].key"
                            placeholder="Enter a number value..."
                            step="0.1"
                            min="0"
                            v-model:value="formData[0].value"
                        >
                    </div>

                </div>
                <div class="col-sm-6 form-text text-muted">
                    {{formData[0].description}}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="offset-lg-2 offset-md-2 btn btn-success" @click="saveData()">Save</button>
        </div>
        <!-- /.card-footer -->
    </div>
</template>

<script>
    export default {
        name: "SettingsFormComponent",
        data: function() {
            return {
                formData: {...this.initialData},
            }
        },
        props: [
            'initialData',
        ],
        methods: {
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
