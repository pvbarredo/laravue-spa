<template>
    <line-chart :data="datacollection" :options="{responsive: false, maintainAspectRatio: false}" :width="400" :height="200">
    </line-chart>
    
</template>
<script>
import LineChart from './LineChart.vue'
export default {

    name: 'Graph',

    data() {
        return {
            datacollection: {
                labels: ['January', 'February'],
                datasets: [{
                    label: 'Data One',
                    backgroundColor: '#f87979',
                    data: [40, 20]
                }]
            }
        }
    },
    components: {
        'line-chart': LineChart

    }
}
</script>
<style lang="css" scoped>
</style>
