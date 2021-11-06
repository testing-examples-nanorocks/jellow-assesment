import Vue from 'vue'
import VueRouter from 'vue-router'
import UsersPage from "../views/UsersPage";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'UsersPage',
    component: UsersPage
  },
  {
    path: '/users/:id',
    name: 'Details',
    component: () => import(/* webpackChunkName: "about" */ '../views/UserDetails.vue')
  },
  {
    path: '/users/:id/todoes',
    name: 'Todoes',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/Todoes.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
