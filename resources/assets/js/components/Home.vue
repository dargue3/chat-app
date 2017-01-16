<template>
  <section class="hero is-fullheight">
    <div class="hero-head">
      <header class="nav">
        <div class="container">
          <div class="nav-left">
            <a class="nav-item">
              Brand
            </a>
          </div>
          <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
          </span>
          <div class="nav-right nav-menu">
            <a class="nav-item is-active">
              Link
            </a>
            <a class="nav-item">
              Link
            </a>
            <a class="nav-item">
              Link
            </a>
            <span class="nav-item">
              <a class="button is-success">
                <span class="icon">
                  <i class="fa fa-github"></i>
                </span>
                <span>Button</span>
              </a>
            </span>
          </div>
        </div>
      </header>
    </div>

    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title is-1">
          Hello World!
        </h1>
        <h1 class="subtitle">
          <a class="link laravel" href="http://laravel.com">Laravel</a>, 
          <a class="link vuejs" href="http://vuejs.org">Vue.js</a>, &amp;  
          <a class="link bulma" href="http://bulma.io">Bulma</a>
        </h1>
      </div>
    </div>

    <div class="hero-foot">
      <div class="container has-text-centered">
        <span class="title is-4">
          A single-page app complete with Webpack + Hot Module Reloading, <i>just hit save</i>
        </span>
      </div>
    </div>
  </section>
</template>

<script>

export default  {

  name: 'Home',

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

.hero-body .link
  &:hover
    text-decoration: underline
  &.laravel
    color: $laravel
  &.vuejs
    color: $vuejs
  &.bulma
    color: $primary

</style>