import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import Type from '@/components/Type'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/type',
      name: 'type',
      component: Type
    }
  ]
})
