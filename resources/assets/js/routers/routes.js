import Vue from 'vue';
import VueRouter from 'vue-router';

import user_routes from './user/user-routes';
import device_routes from './device/device-routes';
import report_routes from './report/report-routes';
import auth_routes from './auth/auth-routes';

Vue.use(VueRouter)
let routes = [];

routes = routes.concat(user_routes);
routes = routes.concat(device_routes);
routes = routes.concat(report_routes);
routes = routes.concat(auth_routes);

const router = new VueRouter({
	hashbang: false,
	history: true,
	mode: 'history',
	routes
})


 export default router;