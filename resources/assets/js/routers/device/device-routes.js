import DeviceSearch from '../../components/device/DeviceSearch.vue'
import DeviceForm from '../../components/device/DeviceForm.vue'
import DeviceDataSearch from '../../components/device/DeviceDataSearch.vue'

export default [
  {
      path:'/device/maintenance/search',
      name: 'device.search',
      component: DeviceSearch
  },
  {
      path:'/device/maintenance/create',
      name: 'device.create',
      component: DeviceForm
  },
  {
      path:'/device/maintenance/:id/edit',
      name: 'device.edit',
      component: DeviceForm
      
  },
  {
      path:'/device/maintenance/data',
      name: 'device.data',
      component: DeviceDataSearch
      
  }

 
];