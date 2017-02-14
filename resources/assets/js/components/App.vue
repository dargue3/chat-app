<template>
  <section class="hero is-fullheight">
    <div class="hero-head">
      <header class="nav">
        <div class="container">
          <div class="nav-left">
            <a class="nav-item">
              <span class="username" v-if="username">Hello, {{ username }}</span>
            </a>
          </div>
          <div class="nav-right">
            <span class="nav-item">
              <button class="button is-danger" @click="showLogin = true">
                <span class="icon">
                  <i class="fa fa-sign-out"></i>
                </span>
                <span>Change Username</span>
              </button>
            </span>
          </div>
        </div>
      </header>
    </div>

    <div class="hero-body">
      <div class="container has-text-centered">

        <conversation :messages="messages" :username="username"></conversation>

        <message-input :username="username"></message-input>

      </div>
    </div>

    <div class="hero-foot"></div>

    <change-user-modal :show="showLogin" :loading="loading"></change-user-modal>

  </section>
</template>

<script>

import MessageInput from './MessageInput'
import Conversation from './Conversation'
import ChangeUserModal from './ChangeUserModal'

export default  {

  name: 'App',

  components: { MessageInput, ChangeUserModal, Conversation },

  data() {
    return {
      showLogin: false,
      loading: false,
      username: '',
      messages: [],
    }
  },

  mounted() {
    this.listen();
    this.fetch();
    if (! this.username) {
      Bus.fire('showModal');
    }
  },


  methods: {
    login(username) {
      this.loading = true;
      axios.post('/api/auth', { username }).then((response) => this.loggedIn(response) );
    },

    loggedIn(response) {
      this.username = response.data.username;
      Bus.fire('hideModal');
    },

    fetch() {
      NProgress.start();
      axios.get('/api/messages').then((response) => this.initMessages(response) );
    },

    initMessages(response) {
      NProgress.done();
      this.messages = response.data;
      this.showMostRecentMessages() 
    },

    send(message) {
      NProgress.start();
      axios.post('/api/messages', { message: message, sender: this.username });
    },

    loadNewMessage(message) {
      this.messages.push(message);
      this.showMostRecentMessages();
      NProgress.done();
    },

    showMostRecentMessages() {
      if (this.messages.length) {
        setTimeout(() => { Helpers.scrollTo('.conversation .tag:last-child')}, 100);
      }
    },

    listen()
    {
      Bus.listen('hideModal', () => { this.showLogin = false; this.loading = false; });
      Bus.listen('showModal', () => this.showLogin = true );
      Bus.listen('login', (username) => this.login(username) );
      Bus.listen('send', (message) => this.send(message) );

      Echo.channel('chatroom').listen('MessageWasSent', ({message}) => { 
        this.loadNewMessage(message)
      })
    },
  },
};

</script>

<style lang="sass">
@import '~_variables'

.hero
  background-color: whitesmoke
  .nav
    background-color: #404040
  .username
    color: white
    font-weight: bold

.hero-body .container
  max-width: 550px
  width: 100%
  margin: 0 auto


</style>