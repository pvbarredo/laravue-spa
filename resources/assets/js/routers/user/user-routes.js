import UserSearch from '../../components/user/UserSearch.vue'
import UserForm from '../../components/user/UserForm.vue'
import EditProfileForm from '../../components/user/EditProfileForm.vue'

export default [
  {
      path:'/user/maintenance/search',
      name: 'user.search',
      component: UserSearch
  },
  {
      path:'/user/maintenance/create',
      name: 'user.create',
      component: UserForm
  },
  {
      path:'/user/maintenance/:id/edit',
      name: 'user.edit',
      component: UserForm
      
  },
  {
      path:'/user/maintenance/editProfile',
      name: 'user.editProfile',
      component: EditProfileForm
  }
 
];