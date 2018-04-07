import LoginForm from '../../components/auth/LoginForm.vue'
import AuthorizedClients from '../../components/passport/AuthorizedClients.vue'
import Clients from '../../components/passport/Clients.vue'
import PersonalAccessTokens from '../../components/passport/PersonalAccessTokens.vue'


export default [
  {
      path:'/login',
      name: 'login',
      component: LoginForm
  },
  {
      path:'/authorizeClients',
      name: 'AuthorizedClients',
      component: AuthorizedClients
  },
  {
      path:'/clients',
      name: 'Clients',
      component: Clients
  },
  {
      path:'/personalAccessTokens',
      name: 'PersonalAccessTokens',
      component: PersonalAccessTokens
  }

 
];