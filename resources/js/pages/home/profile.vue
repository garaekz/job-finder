<template>
  <div>
    algo
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  middleware: 'auth',
  mounted () {
    this.setTitle('Perfil')
  },
  metaInfo () {
    return { title: this.$t('home') }
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle'
    })
  }
}
</script>
