<template>
    <el-form :model="property" :rules="propertyRules" ref="type"  label-width="120px">
        <el-form-item label="Name" prop="name">
            <el-input v-model="property.name"></el-input>
        </el-form-item>
        <el-form-item label="Username" prop="username">
            <el-input v-model="property.username"></el-input>
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
