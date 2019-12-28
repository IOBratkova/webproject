import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/dreamcatchers',
    name: 'dreamcatchers',
    component: () => import('../views/DreamCatchers')
  },
  {
    path: '/photolessons/:id',
    name: 'photolesson',
    component: () => import('../views/PhotoLesson.vue')
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/signUp',
    name: 'signUp',
    component: () => import(/* webpackChunkName: "about" */ '../views/SignUp.vue'),
    meta: {
      layout: 'signup'
    }
  }
]

const router = new VueRouter({
  routes
})

export default router
