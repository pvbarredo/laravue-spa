<template>
    <div class="col-md-12">
        <div class="page-header">
            <h1>User Form</h1>
        </div>
        <div class="panel panel-default">
            <el-form :model="profile" :rules="profileRules" ref="profile" label-width="120px">

                <el-form-item label="Firstname" prop="firstname">
                    <el-input v-model="profile.firstname"></el-input>
                </el-form-item>
                <el-form-item label="Middlename" prop="middlename">
                    <el-input v-model="profile.middlename"></el-input>
                </el-form-item>
                <el-form-item label="Surname" prop="surname">
                    <el-input v-model="profile.surname"></el-input>
                </el-form-item>
                <el-form-item label="Email" prop="email">
                    <el-input v-model="profile.email"></el-input>
                </el-form-item>
                <el-form-item label="Password" prop="password">
                    <el-input type="password" v-model="profile.password"></el-input>
                </el-form-item>
                <div class="form-group search-button pull-right from-button">
                    <button type="button" class="btn btn-primary" @click.prevent="submitForm('profile')"> Save</button>
                    <button type="button" class="btn btn-default" @click.prevent="resetForm('profileuser')"> Cancel</button>
                </div>
                <div class="clearfix"></div>
            </el-form>
        </div>
    </div>
</template>

<script>
export default {

  name: 'EditProfileForm',

  data() {
        return {
            profile: {
                id : 0,
                firstname: '',
                middlename: '',
                surname: '',
                email: '',
                password: ''
            },
            profileRules: {
                firstname: [{
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
    }
}
</script>

<style lang="css" scoped>
</style>