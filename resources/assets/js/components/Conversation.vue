<template>
  <div class="conversation">
    <span v-for="message in messages" :class="messageClasses(message)">
        {{ message.message }}
    </span>
  </div>
</template>

<script>

export default  {
    
  name: 'Conversation',

  props: {
    messages: Array,
    username: String,
  },

  data() {
    return {

    }
  },

  methods: {
    messageClasses(message) {
      return {
        'tag is-medium': true,
        'sender is-primary': message.from === this.username,
        'recipient is-warning': message.from !== this.username,
      }
    },

    destroy(message) {
      Bus.fire('destroy', message);
    },
  },
};

</script>

<style lang="sass">
@import '~_variables' 

.conversation
  max-height: 500px
  min-height: 500px
  display: flex
  width: auto
  flex-flow: column
  margin: 0 auto
  overflow-y: scroll
  border: 2px dashed $grey-lighter
  border-radius: 10px
  padding: 0px 5px
  .tag
    display: inline-block
    max-width: 350px
    height: 100%
    white-space: normal
    border-radius: 15px
    text-align: left
    padding: 5px 10px
    margin: 0.20em 0
    line-height: 1.3
    @media screen and (max-width: 500px)
      max-width: 315px
    @media screen and (max-width: 450px)
      max-width: 275px
  .sender
    align-self: flex-end
  .recipient
    align-self: flex-start



</style>