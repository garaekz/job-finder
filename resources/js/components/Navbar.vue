<template>
  <header class="header_01" :class="$route.name !== 'welcome' ? 'header_inner':''">
    <div class="header_main">
      <div class="header_menu fixed-top">
        <div class="container">
          <div class="header_top">
            <div class="logo">
              <router-link :to="{ name: 'welcome' }">
                <img alt="JoDice" class="img-fluid" src="/images/dice-logo.png">
              </router-link>
            </div>
            <div class="navigation">
              <nav>
                <div class="hamburger hamburger--spring js-hamburger " :class="isActive ? 'is-active':''" @click="toggleMenu">
                  <div class="hamburger-box">
                    <div class="hamburger-inner" />
                  </div>
                </div>
                <ul :style="`display:${isActive ? 'block':'none'}`">
                  <li :class="currentPageClass('welcome')">
                    <router-link :to="{ name: 'welcome' }">
                      Inicio
                    </router-link>
                  </li>
                  <li :class="currentPageClass('empleos')">
                    <router-link :to="{ name: 'empleos' }">
                      Lista de empleos
                    </router-link>
                  </li>
                  <li :class="currentPageClass('nosotros')">
                    <router-link :to="{ name: 'nosotros' }">
                      Quines somos
                    </router-link>
                  </li>

                  <!-- <li class="has-sub-menu">
                    <a href="index.html#">Pages</a>
                    <ul class="sub-menu">
                      <li>
                        <a href="blog.html">blog</a>
                      </li>
                      <li>
                        <a href="blog-single.html">Blog single</a>
                      </li>
                      <li>
                        <a href="contact-us.html">Contact us</a>
                      </li>
                      <li>
                        <a href="plan-page.html">Membership Plans</a>
                      </li>
                      <li>
                        <a href="login.html">Login</a>
                      </li>
                      <li>
                        <a href="lost-password.html">Lost password</a>
                      </li>
                      <li>
                        <a href="user-interface-elements.html">User interface elements</a>
                      </li>
                      <li>
                        <a href="404.html">404</a>
                      </li>
                    </ul>
                  </li> -->
                </ul>
              </nav>
              <div v-if="user" class="ac_nav after_login_ac_nav">
                <div class="login_pop after_login">
                  <button class="btn btn-primary withdp" @click="loginPopActive = !loginPopActive">
                    <img v-if="role == 'empresa'" alt="" :src="user.perfil && user.perfil.logo ? user.perfil.logo : '/images/avatar-placeholder.png'">
                    <img v-if="role == 'aspirante'" alt="" :src="user.perfil && user.perfil.foto ? user.perfil.foto : '/images/avatar-placeholder.png'">
                    Hola {{ user.first_name }} {{ user.last_name }} <i class="fas fa-caret-down" />
                  </button>
                  <div v-if="role == 'empresa'" class="login_pop_box login_pop_box_menu" :style="loginPopActive ? 'display: block;':''">
                    <div class="login_pop_box_head">
                      <div class=" ">
                        <img alt="" :src="user.perfil && user.perfil.logo ? user.perfil.logo : '/images/avatar-placeholder.png'">
                        <span>{{ user.perfil.nombre_comercial }}</span>
                        <h5>{{ user.first_name }} {{ user.last_name }}</h5>
                      </div>
                    </div>
                    <ul>
                      <!-- <li>
                        <a href="browse-jobs.html"><i class="fas fa-search" /> Browse Jobs </a>
                      </li>
                      <li>
                        <a href="my-stared-jobs.html"><i class="fas fa-star" /> View My Stared Jobs</a>
                      </li> -->
                      <li>
                        <router-link :to="{ name: 'home' }">
                          <i class="fas fa-user" /> Ver mi perfil
                        </router-link>
                      </li>
                      <li>
                        <a href="#" @click="logout">
                          <i class="fas fa-power-off" /> Logout
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div v-else class="login_pop_box login_pop_box_menu">
                    <div class="login_pop_box_head">
                      <div class=" ">
                        <img alt="" :src="user.perfil && user.perfil.foto ? user.perfil.foto : '/images/avatar-placeholder.png'">
                        <h5>{{ user.first_name }} {{ user.last_name }}</h5>
                      </div>
                    </div>
                    <ul>
                      <!-- <li>
                        <a href="browse-jobs.html"><i class="fas fa-search" /> Browse Jobs </a>
                      </li>
                      <li>
                        <a href="my-stared-jobs.html"><i class="fas fa-star" /> View My Stared Jobs</a>
                      </li> -->
                      <li>
                        <router-link :to="{ name: 'home' }">
                          <i class="fas fa-user" /> Ver mi perfil
                        </router-link>
                      </li>
                      <li>
                        <a href="#" @click="logout">
                          <i class="fas fa-power-off" /> Logout
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div v-else class="ac_nav">
                <!--Not logedin-->
                <div class="login_pop">
                  <button class="btn btn-primary" @click="loginPopActive = !loginPopActive">
                    Ingresar / Registrarse <i class="fas fa-caret-down" />
                  </button>
                  <div class="login_pop_box" :style="loginPopActive ? 'display:block;':''">
                    <span class="twobtn_cont">
                      <router-link :to="{ name: 'register' }" class="signjs_btn">
                        <span>Aspirante</span> Registro
                        <i class="far fa-user" />
                      </router-link>
                      <router-link :to="{ name: 'register', params: {type: 'empresa' } }" class="signjs_btn">
                        <span>Empresa</span> Registro
                        <i class="far fa-landmark" />
                      </router-link>
                    </span>
                    <div>
                      <span class="member_btn">¿Ya eres miembro?</span>
                      <router-link :to="{ name: 'login' }" class="lgin_btn btn btn-primary" active-class="active">
                        {{ $t('login') }}
                      </router-link>
                    </div>
                  </div>
                </div>
                <!--end logedin-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Aqui deber ir el header -->
      <div v-if="$route.name == 'welcome'" class="header_btm">
        <!-- <div class="bg-v" >
          <div class="bg-v-2 bg-b-r">
          </div>
        </div> -->
        <div class="container">
          <div class="banner_slider ">
            <div class="">
              <div class="row align-items-center">
                <div class="col-lg-4" data-aos="fade-down" data-aos-delay="200">
                  <h2>Encuentra la oferta de <br> trabajo correcta para ti</h2>
                  <p style="color: #fff;">
                    Para floristas, weeding planners y diseñadores florales
                  </p>
                  <a class="btn btn-primary" href="#planes">Conoce más
                    <i class="material-icons">arrow_right_alt</i>
                  </a>
                </div>
                <div class="col-lg-8">
                  <div class="banner_form_cont">
                    <form action="browse-jobs.html">
                      <div class="banerSearch" data-aos="fade-up" data-aos-delay="200">
                        <div class="fild-wrap fw-job-title">
                          <i class="fas fa-briefcase" />
                          <Select2 v-model="empleo" class="js-example-basic-multiple" :options="empleos" :settings="{ placeholder: 'EMPLEO, HABILIDAD, INDUSTRIA'}" />
                        </div>
                        <div class="fild-wrap fw-job-location">
                          <i class="fas fa-map-marker-alt" />
                          <!-- <Select2 v-model="state" class="js-example-basic-single" :options="states" :settings="{ settingOption: value, settingOption: value }" @change="myChangeEvent($event)" @select="mySelectEvent($event)" /> -->
                          <Select2 v-model="estado" class="js-example-basic-single" :options="estados" :settings="{ placeholder: 'SELECCIONA UN ESTADO'}" />

                          <!-- <select class="js-example-basic-single" name="state">
                            <option value="AL">
                              ALABAMA
                            </option>
                            <option value="WY">
                              WYOMING
                            </option>
                          </select> -->
                        </div>
                        <div class="fild-wrap fw-submit">
                          <router-link :to="{ name: 'empleos' }" class="btn btn-primary">
                            <i class="material-icons">search</i> BUSCAR
                          </router-link>
                        </div>
                      </div>
                    </form>
                    <div class="user_type">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="user_type_inner  user_type_seeker">
                            <router-link :to="{ name: 'register' }" class="signjs_btn">
                              <div class="usertype_img">
                                <img alt="" src="/images/usertype-2.png">
                                <img alt="" class="usertype-addon" src="/images/usertype-2-addon.png">
                              </div>
                              <div>
                                <h3>Estoy buscando un trabajo</h3>
                                <p>Sube tu CV y aplica para un trabajo</p>
                                <i class="fas fa-long-arrow-alt-right" />
                              </div>
                            </router-link>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="user_type_inner user_type_post">
                            <router-link :to="{ name: 'register', params: {type: 'empresa' } }" class="signjs_btn">
                              <div class="usertype_img">
                                <img alt="" src="/images/usertype-1.png">
                                <img alt="" class="usertype-addon" src="/images/usertype-1-addon.png">
                              </div>
                              <div>
                                <h3>Quiero ofertar un empleo</h3>
                                <p>Oferta trabajos y contrata profesionales</p>
                                <i class="fas fa-long-arrow-alt-right" />
                              </div>
                            </router-link>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else-if="$route.name == 'empleos.ver'" class="header_btm header_job_single">
        <div v-if="vacante" class="header_job_single_inner container">
          <div class="poster_company">
            <img alt="brand logo" :src="vacante.user.perfil.logo">
          </div>
          <div class="poster_details">
            <h2>{{ vacante.puesto }} <!-- <span class="varified"><i class="fas fa-check" />Verified</span> --></h2>
            <h5>Sobre el empleador</h5>
            <ul>
              <li>
                <a href="#">
                  <i class="fas fa-landmark" />
                  {{ vacante.empresa }}
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fas fa-map-marker-alt" />
                  {{ vacante.estado.name }}
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="far fa-clock" />
                  {{ $moment(vacante.created_at).fromNow() }}
                </a>
              </li>
            </ul>
          </div>
          <div class="poster_action">
            <a class="btn btn-third" href="#">Aplicar a la vacante</a>
          </div>
        </div>
      </div>
      <div v-else>
        <div class="header_btm">
          <h2>{{ header }}</h2>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapGetters } from 'vuex'
import Select2 from 'v-select2-component'

export default {
  components: {
    Select2
  },

  data: () => ({
    appName: window.config.appName,
    empleo: null,
    estado: null,
    isActive: false,
    loginPopActive: false,
    active: false,
    empleos: [
      { id: 1, text: 'FLORISTERÍA' },
      { id: 2, text: 'RAMOS DE BODA' },
      { id: 3, text: 'ARREGLOS FLORALES' }
    ],
    estados: [
      { id: 1, text: 'BAJA CALIFORNIA' },
      { id: 2, text: 'CHIAPAS' }
    ]
  }),

  computed: mapGetters({
    user: 'auth/user',
    role: 'auth/role',
    header: 'page/title',
    vacante: 'empleo/vacante'
  }),
  watch: {
    '$route' () {
      this.isActive = false
      this.loginPopActive = false
      this.active = false
    }
  },
  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    currentPageClass (page) {
      return this.$route.name === page ? 'current_page' : ''
    },
    toggleMenu () {
      this.isActive = !this.isActive
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
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #888;
}
</style>
