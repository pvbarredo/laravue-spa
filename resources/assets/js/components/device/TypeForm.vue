<template>
    <el-form :model="type" :rules="typeRules" ref="type"  label-width="120px">
        <el-form-item label="Name" prop="name">
            <el-input v-model="type.name"></el-input>
        </el-form-item>
        <el-form-item label="Username" prop="username">
            <el-input v-model="type.username"></el-input>
        </el-form-item>
        <div class="form-group search-button pull-right">
            <button type="button" class="btn btn-primary" @click.prevent="submitForm('')"> Save</button>
            <button type="button" class="btn btn-default" @click.prevent="resetForm('')"> Cancel</button>
        </div>
        <div class="clearfix"></div>
    </el-form>
</template>
<script>
export default {

    name: 'TypeForm',

    data() {
        return {

            type: {
                id: 0,
                name: ''

            },
            typeRules: {
                name: [{
                    required: true,
                    message: 'Please input first name',
                    trigger: 'blur'
                }, {
                    min: 3,
                    max: 5,
                    message: 'Length should be 3 to 5',
                    trigger: 'blur'
                }]

            }
        };
    },
    methods: {
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePreview(file) {
            console.log(file);
        }
    }
}
</script>
<style lang="css" scoped>
</style>
