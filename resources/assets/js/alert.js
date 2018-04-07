window.Vue = require('vue');

var Alert = {};

Alert.install = function(Vue, options) {
	Vue.prototype.alertInfo = function(message) {
  	this.$message({
      type : 'info',
      message : message,
      showClose : true
    });
  },

	Vue.prototype.alertSuccess = function(message) {
    this.$message({
      type : 'success',
      message : message,
      showClose : true
    });
  },

  Vue.prototype.alertWarning = function(message) {
  	this.$message({
      type : 'warning',
      message : message,
      showClose : true
    });
  },

  Vue.prototype.alertError = function(message) {
    this.$message({
      type : 'error',
      message : message,
      showClose : true
    });
  }
};

export default Alert;