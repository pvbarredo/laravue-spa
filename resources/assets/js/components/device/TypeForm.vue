<template>
    <el-form :model="type" :rules="typeRules" ref="type">
        <el-form-item label="Name" prop="name">
            <el-input v-model="type.name"></el-input>
        </el-form-item>
        <el-form-item label="Username" prop="username">
            <el-input v-model="type.username"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="">Create</el-button>
            <el-button>Cancel</el-button>
        </el-form-item>
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
