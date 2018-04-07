<template>
    <div class="col-md-12">
        <div class="page-header">
            <router-link to="/device/maintenance/create">
                <button class="btn btn-primary pull-right">
                    <i class="glyphicon glyphicon-plus"></i> Add Device</button>
            </router-link>
            <h1>Device Maintenance</h1>
        </div>
        <div class="panel panel-default search-panel">
            <el-collapse>
                <el-collapse-item name="1">
                    <template slot="title">
                        <strong>Search</strong>
                    </template>
                    <form class="form-inline search-from">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" v-model="searchCriteria.username">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mac Address" v-model="searchCriteria.macAddress">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Location" v-model="searchCriteria.location">
                        </div>
                        <div class="form-group search-button pull-right">
                            <button type="button" class="btn btn-warning" @click.prevent="getDevices(1)">
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
            <el-table v-loading="tableLoading" :data="deviceList" style="width: 100%">
                <el-table-column prop="id" label="Id" width="180">
                </el-table-column>
                <el-table-column prop="name" label="Name" width="180">
                </el-table-column>
                <el-table-column prop="username" label="Username" width="180">
                </el-table-column>
                <el-table-column prop="mac_address" label="Mac Address">
                </el-table-column>
                <el-table-column label="Actions">
                    <template slot-scope="scope">
                        
                        <router-link :to="{name: 'device.edit', params: { id: scope.row.id }}">
                            <button class="btn btn-primary btn-sm">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </button>
                        </router-link>
                        <button class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-remove"></i> Delete
                        </button>
                        <button class="btn btn-primary btn-sm" @click="deviceDataDialog = true">
                            <i class="glyphicon glyphicon-list"></i> Data
                        </button>
                    </template>
                </el-table-column>
            </el-table>
            <el-pagination background layout="prev, pager, next" :total="totalItems" :page-size="pageSize"  @current-change="currentChange">
            </el-pagination>
        </div>

        <el-dialog :visible.sync="deviceDataDialog" width="75%">
            <device-data ></device-data>
        </el-dialog>
    </div>
</template>
<script>
import DeviceDataSearch from './DeviceDataSearch.vue'

export default {

    name: 'DeviceSearch',

    data() {
        return {
            searchCriteria: {
                firstname: '',
                middlename: '',
                surname: '',
                email: ''
            },
            deviceList: [],
            totalItems: 20,
            pageSize: 10,
            deviceDataDialog : false,
            tableLoading: true
        }
    },
    mounted: function() {
        this.getDevices(1);
    },
    methods: {
        getDevices: function(page) {
          var vm = this;
          vm.tableLoading = true;
          axios.get('/device?page=' + page).then(function(response) {
                vm.deviceList = response.data.data;
                vm.totalItems = response.data.total;
                vm.pageSize  = response.data.per_page;
                vm.tableLoading = false;
            });
        },
        currentChange : function(val){
          this.getDevices(val);
        }

    },
    components: {
        'device-data': DeviceDataSearch
    }
}
</script>
<style lang="css" scoped>
</style>
