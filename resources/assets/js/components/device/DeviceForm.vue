<template>
    <el-container>
        <el-header>
            <h1>Device Form</h1>
        </el-header>
        <el-main>
            <el-form :model="device" :rules="deviceRules" ref="device" label-width="120px">
                <el-form-item label="Name" prop="name">
                    <el-input v-model="device.name"></el-input>
                </el-form-item>
                <el-form-item label="Username" prop="username">
                    <el-input v-model="device.username"></el-input>
                </el-form-item>
                <el-form-item label="Mac Address" prop="mac_address">
                    <el-input v-model="device.mac_address"></el-input>
                </el-form-item>
                <el-form-item label="Description" prop="description">
                    <el-input v-model="device.description"></el-input>
                </el-form-item>
                <el-tree :data="device.tree" show-checkbox node-key="id" default-expand-all :expand-on-click-node="false">
                    <span class="custom-tree-node" slot-scope="{ node, data }">
                        <span><b>{{ node.label}}</b></span>
                    <span>
                          
                          <el-button
                            type="text"
                            size="mini"
                            @click="append(node,data,'MODIFY_TYPE')" v-if="node.level === 1" >
                            Modify Type
                          </el-button>
                          <el-button
                            type="text"
                            size="mini"
                            @click="append(node,data,'ADD_PROPERTY')" v-if="node.level === 1" >
                            Add Property
                          </el-button>
                          <el-button
                            type="text"
                            size="mini"
                            @click="append(node,data,'MODIFY_PROPERTY')" v-if="node.level === 2" >
                            Modify Property
                          </el-button>
                          <el-button
                            type="text"
                            size="mini"
                            @click="append(node,data,'ADD_CRITICAL_VALUE')" v-if="node.level === 2" >
                            Add Critical Value
                          </el-button>
                          <el-button
                            type="text"
                            size="mini"
                            @click="append(node,data,'MODIFY_CRITICAL_VALUE')" v-if="node.level !== 1 && node.level !==2" >
                            Modify Value
                          </el-button>
                          <el-button
                            type="text"
                            size="mini"
                            @click=""
                            v-if="node.level !== 1">
                            Delete
                          </el-button>
                        </span>
                    </span>
                </el-tree>
                <el-form-item>
                    <el-button type="primary" @click="submitForm('device')">Create</el-button>
                    <el-button @click="resetForm('device')">Cancel</el-button>
                </el-form-item>
            </el-form>
        </el-main>
        <el-dialog title='Type Form' :visible.sync="typeFormDialog">
            <type-form></type-form>
        </el-dialog>
        <el-dialog title='Property Form' :visible.sync="propertyFormDialog">
            <property-form></property-form>
        </el-dialog>
        <el-dialog title='Critical Value Form' :visible.sync="criticalValueFormDialog" width="75%">
            <critical-value-form></critical-value-form>
        </el-dialog>
    </el-container>
</template>
<script>
import TypeForm from './TypeForm.vue'
import PropertyForm from './PropertyForm.vue'
import CriticalValueForm from './CriticalValueForm.vue'
let id = 1000;
export default {

    name: 'DeviceForm',

    data() {
        // const initialData = [{
        //     id: 1,
        //     label: 'Type: Water',
        //     children: [{
        //         id: 4,
        //         label: 'Property: PH Level',
        //         children: [{
        //             id: 9,
        //             label: 'Critical Value : 10'
        //         }, {
        //             id: 10,
        //             label: 'Critical Value : 20'
        //         }]
        //     }]
        // }];

        return {
            typeFormDialog: false,
            propertyFormDialog: false,
            criticalValueFormDialog: false,
            // treeData: initialData,
            device: {
                id: 0,
                name: '',
                mac_address: '',
                password: '',
                description: '',
                owner: {},
                user_id: '',
                latitude: '',
                tree: [],
                type: {}
            },
            deviceRules: {
                name: [{
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
            this.getDevice(this.$route);
        }



    },
    methods: {

        append(node, data, type) {
           
            switch (type) {
                case 'MODIFY_TYPE':
                    this.typeFormDialog = true;
                    break;
                case 'ADD_PROPERTY':
                    this.propertyFormDialog = true;
                    break;
                case 'MODIFY_PROPERTY':
                    this.propertyFormDialog = true;
                    break;
                case 'ADD_CRITICAL_VALUE':
                    this.criticalValueFormDialog = true;
                    break;
                case 'MODIFY_CRITICAL_VALUE':
                    this.criticalValueFormDialog = true;
                    break;
            }

        },

        remove(node, data) {
            const parent = node.parent;
            const children = parent.data.children || parent.data;
            const index = children.findIndex(d => d.id === data.id);
            children.splice(index, 1);
        },
        getDevice: function(route) {
            var vm = this;
            var id = route.params.id

            axios.get('/device/' + id).then(function(response) {

                vm.device = vm.addTreeAttribute(response.data);

                console.log(vm.device);
            });
        },
        addTreeAttribute: function(responseData) {
            var tree = [_.cloneDeep(responseData.type)];

            tree[0]['children'] = _.cloneDeep(tree[0].property);
            tree[0]['label'] = 'Type: ' + tree[0]['name']

            _.each(tree[0]['children'], function(data) {
                data['children'] = _.cloneDeep(data.critical_value);
                data['label'] = 'Property: ' + data['name'];

                _.each(data['children'], function(childrenData) {
                    childrenData['label'] = 'Crtical Description: ' + childrenData['description'] + ' Critical Value: ' + childrenData['condition'] + ' ' + childrenData['min_value'];

                    childrenData['label'] += (childrenData['max_value']) ? ' to ' + childrenData['max_value'] : '';
                });

            });

            responseData.tree = tree;
            this.treeData = tree;
            return responseData;
        },
        submitForm(device) {
            this.$refs[device].validate((valid) => {
                if (valid) {
                    var vm = this;
                    if (vm.device.id) {
                        //update
                        console.log('Update');
                        axios.put('/device/' + vm.device.id, vm.device).then(function(response) {
                            alert('Updated Successfully');
                        });
                    } else {
                        //create
                        console.log('Create');
                        axios.post('/device', vm.device).then(function(response) {
                            vm.$router.push({
                                name: 'device.edit',
                                params: {
                                    id: response.data.id
                                }
                            });
                        });

                    }


                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        resetForm(device) {
            this.$refs[device].resetFields();
        }
    },
    components: {
        'type-form': TypeForm,
        'property-form': PropertyForm,
        'critical-value-form': CriticalValueForm
    }

}
</script>
<style lang="css" scoped>
.custom-tree-node {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 14px;
    padding-right: 8px;
}
</style>
