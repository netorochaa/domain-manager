import { createRouter, createWebHistory } from 'vue-router'
import DomainIndex from '../views/Domain/Index.vue'
import DomainCreate from '../views/Domain/Create.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: DomainIndex
    },
    {
      path: '/create',
      name: 'create',
      component: DomainCreate
    },
    {
      path: '/edit/:id',
      name: 'edit',
      component: DomainCreate
    },
  ]
})

export default router
