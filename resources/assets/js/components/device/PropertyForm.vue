<template>
    <el-form :model="property" :rules="propertyRules" ref="type">
        <el-form-item label="Name" prop="name">
            <el-input v-model="property.name"></el-input>
        </el-form-item>
        <el-form-item label="Username" prop="username">
            <el-input v-model="property.username"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="">Create</el-button>
            <el-button>Cancel</el-button>
        </el-form-item>
    </el-form>
</template>
<script>
export default {

    name: 'PropertyForm',

    data() {
        return {
            property: {
                name: '',
                username: ''
            },
            propertyRules: []

        }
    }
}
</script>
<style lang="css" scoped>
</style>
