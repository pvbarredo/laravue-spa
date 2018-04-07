<template>
    <div class="col-md-12">
        <div class="page-header">
            <router-link to="/user/maintenance/create">
                <button class="btn btn-primary pull-right">
                    <i class="glyphicon glyphicon-plus"></i> Add User</button>
            </router-link>
            <h1>User Maintenance </span></h1>
        </div>
        <div class="panel panel-default search-panel">
            <el-collapse>
                <el-collapse-item name="1">
                    <template slot="title">
                        <strong>Search</strong>
                    </template>
                    <form class="form-inline search-from">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Firstname" v-model="searchCriteria.firstname">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Middlename" v-model="searchCriteria.middlename">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Surname" v-model="searchCriteria.surname">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" v-model="searchCriteria.email">
                        </div>
                        <div class="form-group search-button pull-right">
                            <button type="button" class="btn btn-warning" @click.prevent="getUsers(1)">
                                <i class="glyphicon glyphicon-search"></i> Search</button>
                            <button type="button" class="btn btn-default" @click.prevent="resetSearch()">
                                <i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                    </form>
                </el-collapse-item>
            </el-collapse>
        </div>
        <!-- Main Panel -->
        <div class="panel panel-default">
            <el-table :data="userList" style="width: 100%">
              <el-table-column prop="id" label="Id" width="180">
                </el-table-column>
                <el-table-column prop="firstname" label="First Name" width="180">
                </el-table-column>
                <el-table-column prop="middlename" label="Middle Name" width="180">
                </el-table-column>
                <el-table-column prop="surname" label="Surname">
                </el-table-column>
                <el-table-column prop="email" label="Email">
                </el-table-column>
                <el-table-column label="Actions">
                    <template slot-scope="scope">
                        
                        <router-link :to="{name: 'user.edit', params: { id: scope.row.id }}">
                            <button class="btn btn-primary btn-sm">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </button>
                        </router-link>
                        <button class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-remove"></i> Delete
                        </button>
                    </template>
                </el-table-column>
            </el-table>
            <el-pagination background layout="prev, pager, next" :total="totalItems" :page-size="pageSize" @current-change="currentChange">
           </el-pagination>
        </div>
        
    </div>
</template>
<script>
export default {

    name: 'UserSearch',

    data() {
        return {
            searchCriteria: {
                firstname: '',
                middlename: '',
                surname: '',
                email: ''
            },
            userList : [],
            totalItems : 20,
            pageSize : 10
        }
    },
    mounted: function() {
        this.getUsers(1);
    },
    methods: {
        getUsers: function(page) {
          var vm = this;
          axios.get('/user?page=' + page).then(function(response) {
                vm.userList = response.data.data;
                vm.totalItems = response.data.total;
                vm.pageSize  = response.data.per_page;
            });
        },
        currentChange : function(val){
          
          this.getUsers(val);
        }

    }
}
</script>
<style lang="css" scoped>
</style>
</template>
