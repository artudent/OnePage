import Vue from 'vue';
import VueRouter from 'vue-router';
import MainView from '../views/MainView.vue'

Vue.use(VueRouter);

export const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'main',
      component: MainView
    }
  ]
})