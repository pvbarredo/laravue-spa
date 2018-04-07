<template>
    <el-container>
        <el-header>User Form</el-header>
        <el-main>
            <el-form :model="user" :rules="userRules" ref="user" label-width="120px">
                
                <el-form-item label="Firstname" prop="firstname">
                    <el-input v-model="user.firstname"></el-input>
                </el-form-item>
                <el-form-item label="Middlename" prop="middlename">
                    <el-input v-model="user.middlename"></el-input>
                </el-form-item>
                <el-form-item label="Surname" prop="surname">
                    <el-input v-model="user.surname"></el-input>
                </el-form-item>
                <el-form-item label="Email" prop="email">
                    <el-input v-model="user.email"></el-input>
                </el-form-item>
                <el-form-item label="Password" prop="password">
                    <el-input type="password" v-model="user.password"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="submitForm('user')">Create</el-button>
                    <el-button @click="resetForm('user')">Reset</el-button>
                </el-form-item>
            </el-form>
        </el-main>
    </el-container>
</template>
<script>
export default {

    name: 'UserForm',

    data() {
        return {
            user: {
                id : 0,
                firstname: '',
                middlename: '',
                surname: '',
                email: '',
                password: ''
            },
            userRules: {
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
    },
    mounted: function() {

        if (this.$route.params.id) {
            this.getUser(this.$route);
        }



    },
    methods: {
        getUser: function(route) {
            var vm = this;
            var id = route.params.id

            axios.get('/user/' + id).then(function(response) {
                vm.user = response.data;
            });
        },
      
        submitForm(user) {
            this.$refs[user].validate((valid) => {
                if (valid) {
                    var vm = this;
                    if (vm.user.id ) {
                        //update
                        console.log('Update');
                        axios.put('/user/'+ vm.user.id, vm.user).then(function(response) {
                            alert('Updated Successfully');
                        });
                    } else {
                        //create
                        console.log('Create');
                        axios.post('/user', vm.user).then(function(response) {
                            vm.$router.push({
                                name: 'user.edit',
                                params: {
                                    id: response.data.id
                                }
                            });
                        });

                    }


                } else {
                    console.log('error submit!!');
                    this.$message.error('error submit!!');
                    return false;
                }
            });
        },
        resetForm(user) {
            this.$refs[user].resetFields();
        }
    }

}
</script>
<style lang="css" scoped>
</style>
