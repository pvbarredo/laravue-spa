<template>
     <div class="col-md-12">
        <div class="page-header">
            <h1>Device Data</h1>
        </div>
        <div class="panel panel-default search-panel">
            <form class="form-inline search-from">
                <div class="form-group">
                    <div class="input-group">
					<div class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></div>
                    <input type="text" class="form-control" placeholder="Device" v-model="searchCriteria.davice">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
					<div class="input-group-addon"><i class="glyphicon glyphicon-home"></i></div>
                    <input type="text" class="form-control" placeholder="Property" v-model="searchCriteria.property">
                    </div>
                </div>
                <div class="form-group search-button pull-right">
                    <button type="button" class="btn btn-warning" @click.prevent="getDeviceData(1)">
                        <i class="glyphicon glyphicon-search"></i> Search</button>
                    <button type="button" class="btn btn-default" @click.prevent="resetSearch()">
                        <i class="glyphicon glyphicon-repeat"></i> Reset</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="panel panel-default">
            <el-table v-loading="tableLoading" :data="deviceDataList"  style="width: 100%" >
                <el-table-column prop="id" label="Id">
                </el-table-column>
                <el-table-column prop="device.name" label="Device">
                </el-table-column>
                <el-table-column prop="device.type.name" label="Type">
                </el-table-column>
                <el-table-column prop="property.name" label="Property">
                </el-table-column>
                <el-table-column prop="value" label="Value">
                </el-table-column>
                <el-table-column prop="property.unit" label="Unit">
                </el-table-column>
                <el-table-column label="Status">
                    <template slot-scope="scope">
                        <el-popover ref="criticalPopover" placement="top-start" trigger="hover"  >
                            <ul>
                                <li v-for="criticalMessage in scope.row.criticalMessages">
                                    {{ criticalMessage }}
                                </li>
                            </ul>
                        </el-popover>
                        <el-tag :type="scope.row.status == 0 ? 'success' : 'danger' " v-popover:criticalPopover>
                            {{scope.row.status == 0 ? 'Normal' : 'Critical' }}
                        </el-tag>
                    </template>
                </el-table-column>
                <el-table-column label="Location">
                    <template slot-scope="scope">
                        {{ scope.row.latitude + ' , ' + scope.row.longitude }}
                    </template>
                </el-table-column>
                <el-table-column prop="date" label="Date">
                </el-table-column>
            </el-table>
            <el-pagination background layout="prev, pager, next" :total="totalItems" :page-size="pageSize" @current-change="currentChange">
            </el-pagination>
        </div>
    </div>
</template>
<script>
export default {

    name: 'DeviceDataSearch',

    data() {
        return {
            searchCriteria: {
                device: '',
                property: ''
            },
            deviceDataList: [],
            totalItems: 20,
            pageSize: 10,
            tableLoading: true

        }

    },
    mounted: function() {
        this.getDeviceData(1);
    },
    methods: {
        getDeviceData: function(page) {
            var vm = this;
            vm.tableLoading = true;
            axios.get('/deviceData?page=' + page).then(function(response) {
                vm.deviceDataList = vm.criticalCheck(response.data.data);

                vm.totalItems = response.data.total;

                vm.pageSize = response.data.per_page;
                vm.tableLoading = false;
            });
        },
        currentChange: function(val) {
            this.getDeviceData(val);
        },
        criticalCheck: function(datas) {
            var list = datas;
            _.each(list, function(data) {
                var criticalValues = data.property.critical_value,
                    value = data.value,
                    criticalMessages = [];

                _.each(criticalValues, function(criticalValue) {

                    switch (criticalValue.condition) {
                        case 'Exact':
                            if (criticalValue.min_value == value) {
                                criticalMessages.push(criticalValue.description);
                            }
                            break;
                        case 'Range':
                            if (criticalValue.min_value <= value && criticalValue.max_value >= value) {
                                criticalMessages.push(criticalValue.description);
                            }
                            break;

                        case 'Above':
                            if (criticalValue.min_value <= value) {
                                criticalMessages.push(criticalValue.description);
                            }
                            break;
                        case 'Below':
                            if (criticalValue.min_value >= value) {
                                criticalMessages.push(criticalValue.description);
                            }
                            break;
                    }

                });

                data.criticalMessages = criticalMessages;
                data.status = 0;
                if (!_.isEmpty(criticalMessages)) {
                    data.status = 1;
                }
            });

            return list;
        }

    }
}
</script>
<style lang="css" scoped>
</style>
