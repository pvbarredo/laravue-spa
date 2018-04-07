
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import router from './routers/routes';
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import * as VueGoogleMaps from 'vue2-google-maps'
import Alert from './alert';
import App from './components/layout/App'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

Vue.use(VueGoogleMaps, {
	load: {
	  key: 'AIzaSyAYpntWkKP8IcxJJgQNrGXsMvHtEH5Z5oc',
	  v: '3.26',
	  libraries: 'places'
	}
});
Vue.use(ElementUI);
Vue.use(Alert);

//error notifs
Vue.config.errorHandler = function (err, vm, info) {
  console.error(err);
  Vue.prototype.alertError(err.toString());
};

Vue.config.warnHandler = function (msg, vm, trace) {
  console.error(msg);
  Vue.prototype.alertError(msg);
  
};

axios.interceptors.request.use(function(request){
  return request;
}, function (error) {
  console.error(error);
  return Promise.reject(error);
});

axios.interceptors.response.use(function(response){
  return response;
}, function (error) {
  console.error(error);
  Vue.prototype.alertError(error.response.request.responseURL + ' ' + error.message);
  return Promise.reject(error);
});

const app = new Vue({
    el: '#app',
    router,
    render: app => app(App)
});
