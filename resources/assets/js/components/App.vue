<template>

  <!-- insert dynamic component here according to routes.js -->
  <router-view></router-view>


</template>

<script>

/**
 * Root component of the site
 *
 * Here you can put global functions, mixins, etc. 
 */

export default  {
  
  name: 'App',

  data()
  {
    return {

    }
  },

  methods:
  {
    
  },
};

</script>

<style lang="sass">
@import '~_variables'

</style>