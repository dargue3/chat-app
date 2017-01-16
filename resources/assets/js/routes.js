/**
 * The SPA's routes file
 */

import Router from 'vue-router'
import Home from './components/Home'

let routes = 
[
  {
    path: '/*', // any path will show homepage
    component: Home,
  },
];

export default new Router({
  routes: routes,
  mode: 'history', // disable the /#/ in the URL
});