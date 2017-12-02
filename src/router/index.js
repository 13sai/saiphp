import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/pages/Index'
import Page from '@/pages/page'

Vue.use(Router)

export default new Router({
    routes: [
    {
      path: '/',
      name: 'index',
      component: Index
  },
  {
      path: '/page/:id',
      name: 'page',
      component: Page
  }
  ]
})
