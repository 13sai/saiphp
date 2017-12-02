// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import Resource from 'vue-resource'
import Header from './components/header'
import Footer from './components/footer'
import List from './components/list'


Vue.use(Resource);

Vue.config.productionTip = false;

Vue.component('sai-header', Header);
Vue.component('sai-footer', Footer);
Vue.component('items', List);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})