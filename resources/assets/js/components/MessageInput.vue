<template>
  <div class="message-input">
    <p class="control has-addons">
      <button class="button left" :class="inputButtonClasses"></button>
      <input id="message" class="input" @focus="blur = true" @blur="blur = false"
        @keyup.enter="send()" v-model="message"></input>
      <button class="button right" :class="inputButtonClasses" @click="send()">
        <span class="icon" :class="message.length ? 'is-primary' : 'is-light'">
          <i class="fa fa-arrow-circle-up"></i>
        </span>
      </button>
    </p>
  </div>
</template>

<script>

export default  {
  
name: 'MessageInput',

props: {
  username: {
    type: String,
  },
},

data()
{
  return {
    message: "",
    blur: false,
    hover: false,
  }
},

computed:
{
  inputButtonClasses()
  {
    return { 
      'hover' : this.hover && ! this.blur,
      'blur' : this.blur,
    }
  },
},

mounted()
{
  document.querySelector('#message').addEventListener('mouseenter', () => this.hover = true)
  document.querySelector('#message').addEventListener('mouseleave', () => this.hover = false)
},


methods:
{
  send()
  {
    if (! this.username) {
      Bus.fire('showModal');
      return;
    }

    Bus.fire('send', this.message);
    this.message = '';
  },
},

};

</script>

<style lang="sass">
@import '~_variables'  

.message-input
  margin-top: 1rem
  .control.has-addons
    margin-bottom: 5rem
    justify-content: center
    .input
      width: 500px
      border-right: 0
      border-left: 0
      box-shadow: none
      padding-left: 0
    .button
      border-color: $grey-lighter
      &.right
        border-top-right-radius: 50%
        border-bottom-right-radius: 50%
        border-left: 0
      &.left
        border-top-left-radius: 50%
        border-bottom-left-radius: 50%
        width: 35px
      &.blur
        border-color: $primary
      &.hover
        border-color: $grey-light
      .icon.is-light
        color: $grey-light
        &:hover
          cursor: default
      .icon.is-primary
        color: $primary

</style>