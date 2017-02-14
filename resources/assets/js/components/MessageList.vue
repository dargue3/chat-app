<template>
  <div class="threads">
  
    <button v-for="thread in threads" class="button is-warning" @click="viewThread(thread)">
      {{ thread.name }}
    </button>

  </div>
</template>

<script>

import Bus from '../helpers/EventBus.js'

export default  {
  
name: 'MesssageList',

props: {
  threads: Array,
},

data()
{
  return {

  }
},

methods:
{
  viewThread(thread)
  {
    Bus.fire('recipient', thread)
  },
},
};

</script>

<style lang="sass">
@import '~_variables' 

.threads
  .button
    margin: 10px

</style>