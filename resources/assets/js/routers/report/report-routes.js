import Graph from '../../components/report/Graph.vue'
import Map from '../../components/report/Map.vue'

export default [
  {
      path:'/report/maintenance/map',
      name: 'report.map',
      component: Map
  },
  {
      path:'/report/maintenance/graph',
      name: 'report.graph',
      component: Graph
  }
 
];