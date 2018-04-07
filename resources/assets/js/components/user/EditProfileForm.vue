<template>
    <el-container>
        <el-header>Edit Profile Form</el-header>
        <el-main>
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
                <el-form-item>
                    <el-button type="primary" @click="submitForm('profile')">Create</el-button>
                    <el-button @click="resetForm('profile')">Reset</el-button>
                </el-form-item>
            </el-form>
        </el-main>
    </el-container>
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