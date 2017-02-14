<template>
  <div class="modal" :class="{ 'is-active' : show }">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Pick a username for yourself</p>
        <button class="delete" @click="cancel"></button>
      </header>
      <section class="modal-card-body">
        <form @submit.prevent="attempt">
          <p class="control">
            <input type="text" class="input" :class="{ 'is-danger' : error }" placeholder="name" v-model="username" />
            <span v-if="error" class="help is-danger">Greater than one character please!</span>
          </p>
        </form>
      </section>
      <footer class="modal-card-foot">
        <a class="button is-success" :class="{ 'is-loading' : loading }" @click="attempt">Login</a>
        <a class="button" @click="cancel">Cancel</a>
      </footer>
    </div>
  </div>
</template>

<script>

export default  {
  
name: 'ChangeUserModal',

props: {
  show: {
    type: Boolean,
    default: false
  },
  loading: {
    type: Boolean,
    default: false,
  }
},

data()
{
  return {
    username: '',
    error: false,
  }
},

methods:
{
  attempt() {
    if (! this.username.length) {
      this.error = true;
      return
    }
    this.error = false;
    Bus.fire('login', this.username);
  },

  cancel() {
    this.error = false;
    this.username = '';
    Bus.fire('hideModal')
  },
},
};

</script>

<style lang="sass">
@import '~_variables'  

</style>