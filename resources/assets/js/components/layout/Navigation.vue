<template>
    <el-container>
        <el-menu mode="horizontal" router>
            <el-menu-item index="/home">Home</el-menu-item>
            <el-menu-item index="/user/maintenance/search">Account</el-menu-item>
            <el-menu-item index="/device/maintenance/search">Device</el-menu-item>
            <el-submenu index="3">
                <template slot="title">Report</template>
                <el-menu-item index="/device/maintenance/data">Data</el-menu-item>
                <el-menu-item index="/report/maintenance/graph">Graph</el-menu-item>
                <el-menu-item index="/report/maintenance/map">Map</el-menu-item>
            </el-submenu>
            <el-menu-item index="4">About Us</el-menu-item>
            <el-menu-item index="5">Support</el-menu-item>
        </el-menu>
        <div class="line"></div>
    </el-container>
</template>
<script>
export default {

    name: 'navigation',

    data() {
        return {

        };
    }
}
</script>
<style lang="css" scoped>
</style>
