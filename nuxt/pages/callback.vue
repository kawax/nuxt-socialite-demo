<template>
  <div>
    <p v-if="attempting">Twitterでログインしています。{{ user }}</p>
  </div>
</template>

<script>
  export default {
    // middleware: 'guest',

    data () {
      return {
        user: null,
        failedMessage: null,
      }
    },

    computed: {
      attempting () {
        return !this.failedMessage
      },
    },

    async mounted () {
      try {
        const callbackData = await this.$axios.$get('/callback', {params: this.$route.query})

        this.user = callbackData.user
        console.log(this.user)
      }
      catch (error) {
        this.failedMessage = error.message
      }
    },
  }
</script>
