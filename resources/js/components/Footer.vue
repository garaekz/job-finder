<template>
  <footer id="colophon" class="site-footer custom_footer dark_footer">
    <div class="container">
      <div class="row footer_widget">
        <div class="col-md-3">
          <div class="footer_widget_box">
            <ul data-aos="fade-in" data-aos-delay="200">
              <li>
                <router-link :to="{ name: 'privacidad' }">
                  Aviso de privacidad
                </router-link>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="footer_widget_box">
            <ul data-aos="fade-in" data-aos-delay="200">
              <li>
                <router-link :to="{ name: 'nosotros' }">
                  Quienes somos
                </router-link>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3" />
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2 data-aos="fade-up" data-aos-delay="400">
              Contáctanos
            </h2>
            <ul data-aos="fade-in" data-aos-delay="200" class="social_list">
              <li>
                <a href="https://www.facebook.com/calinextia"><i class="fab fa-facebook" /></a>
              </li>
              <li>
                <a href="http://www.instagram.Com/calinextia/"><i class="fab fa-instagram" /></a>
              </li>
              <li>
                <a href="http://www.Youtube.com/channel/UCXyea0JwdrM4aOe-xvjy6Vg/featured?view_as=subscribe"><i class="fab fa-youtube" /></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer_widget_box">
            <p class="copyright-text">
              Calinextia es un desarrollo en colaboración de Perro Negro Studio, Peekaboo Creativos & Daga Coding © Copyright 2020 Calinextia. Todos los derechos reservados.
            </p>
          </div>
        </div>
      </div>
      <!-- .site-info -->
    </div>
  </footer>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  components: {
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
