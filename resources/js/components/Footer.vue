<template>
  <footer id="colophon" class="site-footer custom_footer dark_footer">
    <div class="container">
      <div class="row footer_widget">
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2 data-aos="fade-up" data-aos-delay="400">Job seekers</h2>
            <ul data-aos="fade-in" data-aos-delay="200">
              <li>
                <a href="browse-jobs.html">Browse jobs</a>
              </li>
              <li>
                <a href="job-single.html">Job single</a>
              </li>
              <li>
                <a href="my-stared-jobs.html">My stared jobs</a>
              </li>
              <li>
                <a href="edit-profile.html">Update my profile</a>
              </li>
              <li>
                <a href="edit-password.html">Change password</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2 data-aos="fade-up" data-aos-delay="400">Employers</h2>
            <ul data-aos="fade-in" data-aos-delay="200">
              <li>
                <a href="emp-registration.html">Get a FREE Employer Account</a>
              </li>
              <li>
                <a href="post-a-job.html">Post a job</a>
              </li>
              <li>
                <a href="find-staff.html">Find staff</a>
              </li>
              <li>
                <a href="job-dashboard.html">Job dashboard</a>
              </li>
              <li>
                <a href="emp-edit-profile.html">Update profile</a>
              </li>
              <li>
                <a href="emp-edit-password.html">Change password</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2 data-aos="fade-up" data-aos-delay="400">Comunidad</h2>
            <ul data-aos="fade-in" data-aos-delay="200">
              <li>
                <a href="contact-us.html">Contacto</a>
              </li>
              <li>
                <a href="content-page.html">Lineamientos</a>
              </li>
              <li>
                <a href="content-page.html">Terminos de Uso</a>
              </li>
              <li>
                <a href="content-page.html">Privacidad &amp; Cookies </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2 data-aos="fade-up" data-aos-delay="400">Contáctanos</h2>
            <ul data-aos="fade-in" data-aos-delay="200" class="social_list">
              <li>
                <a href="index.html#"><i class="fab fa-twitter" /></a>
              </li>
              <li>
                <a href="index.html#"><i class="fab fa-facebook" /></a>
              </li>
              <li>
                <a href="index.html#"><i class="fab fa-linkedin" /></a>
              </li>
              <li>
                <a href="index.html#"><i class="fab fa-youtube" /></a>
              </li>
            </ul>
          </div>

          <div class="footer_widget_box">
            <form class="newsletter">
              <h2 data-aos="fade-up" data-aos-delay="400">Newsletter</h2>
              <div data-aos="fade-in" data-aos-delay="200" class="d-flex">
                <input class="form-control" type="email" placeholder="Enter your email ">
                <button class="btn btn-primary"><i class="fa fa-paper-plane" /></button>
              </div>
            </form>
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
