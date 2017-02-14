/**
 * The entry point for Vue and the SPA router
 */

// first bootstrap Vue and its AJAX library
import './bootstrap.js';

import App from './components/App';

// create the Vue instance
new Vue({
  el: '#app',
  components: { App }
});
