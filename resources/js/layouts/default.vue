<template>
  <div class="main-layout">
    <navbar />

    <main>
      <child />
    </main>
    <Footer />
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'
import Footer from '~/components/Footer'

export default {
  name: 'MainLayout',

  components: {
    Navbar,
    Footer
  }
}
</script>
