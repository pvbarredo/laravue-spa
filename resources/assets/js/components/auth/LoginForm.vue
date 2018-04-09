<template>
    <div class="center">
        <el-card class="box-card login-card">
            <div class="login-logo">
                <img src="/img/logo-dark.png" />
            </div>
            <form autocomplete="off" @submit.prevent="login" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" class="form-control" v-model="auth.username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" class="form-control" v-model="auth.password" required>
                </div>
                <div class="form-group search-button pull-right full-width">
                    <button type="button" class="btn btn-info full-width" @click.prevent=""> Sign in</button>
                </div>
                <div class="clearfix"></div>
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