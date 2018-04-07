<template>
    <div>
        <el-card class="box-card">
        
        <form autocomplete="off" @submit.prevent="login" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control" v-model="auth.username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" v-model="auth.password" required>
            </div>
            <button type="submit" class="btn btn-default">Sign in</button>
        </form>
        </el-card>
    </div>
</template>

<script>
export default {

  name: 'LoginForm',

  data () {
    return {
        auth : {
            username: '',
            password: ''
        }
    }
  }
}
</script>

<style lang="css" scoped>
.box-card {
    width: 480px;
  }
</style>