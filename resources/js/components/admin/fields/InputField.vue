<template>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">
                {{fieldData.name}}
            </label>
            <div class="col-sm-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <strong>{{fieldData.append}}</strong>
                        </span>
                    </div>
                    <input
                        name="id"
                        type="hidden"
                        :value="fieldData.id"
                    >
                    <input
                        type="number"
                        class="form-control"
                        :id="fieldData.id"
                        :name="fieldData.key"
                        placeholder="Enter a number value..."
                        step="0.1"
                        min="0"
                        v-model:value="value"
                    >
                </div>

            </div>
            <div class="col-sm-6 form-text text-muted">
                {{fieldData.description}}
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</template>

<script>
export default {
    name: "InputField",
    props: {
        fieldData: Object,
    },
    data: function () {
        return {
            value: parseFloat(this.fieldData.value),
        }
    },
    watch: {
        value: function () {
            this.$emit(
                'valueChanged',
                this.fieldData.key,
                this.fieldData.id,
                this.value,
            )
        }
    },
}
</script>

<style scoped>

</style>
