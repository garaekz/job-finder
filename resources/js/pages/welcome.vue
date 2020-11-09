<template>
  <main>
    <div class="section category-section ">
      <div class="bg-v">
        <div class="bg-v-1 bg-t-l" data-aos="zoom-in" />
        <div class="bg-v-2 bg-b-r" data-aos="zoom-in" />
        <!-- <div class="bg-v-4">
        </div>
        <div class="bg-v-5">
        </div>
        <div class="bg-v-6">
        </div>
        <div class="bg-v-7">
        </div>
        <div class="bg-v-8">
        </div>
        <div class="bg-v-9">
        </div>
        <div class="bg-v-10">
        </div>
        <div class="bg-v-11">
        </div> -->
      </div>
      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">
          Categorías de trabajo populares
        </h2>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="category_box">
              <div class="cb_header">
                <img alt="" src="/images/i-pan.png">
                <!-- <span class="job_count">363</span> -->
              </div>
              <div class="cb_bottom">
                <h3>Floristería en general</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit & More</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category_box">
              <div class="cb_header">
                <img alt="" src="/images/i-pan.png">
                <!-- <span class="job_count">363</span> -->
              </div>
              <div class="cb_bottom">
                <h3>Ramos de Novia, XV`S años</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit & More</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category_box">
              <div class="cb_header">
                <img alt="" src="/images/i-pan.png">
                <!-- <span class="job_count">363</span> -->
              </div>
              <div class="cb_bottom">
                <h3>Arreglos Florales</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit & More</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category_box">
              <div class="cb_header">
                <img alt="" src="/images/i-pan.png">
                <!-- <span class="job_count">363</span> -->
              </div>
              <div class="cb_bottom">
                <h3>Eventos Sociales y empresariales</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit & More</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category_box">
              <div class="cb_header">
                <img alt="" src="/images/i-pan.png">
                <!-- <span class="job_count">363</span> -->
              </div>
              <div class="cb_bottom">
                <h3>Arreglos Fúnebres</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit & More</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category_box">
              <div class="cb_header">
                <img alt="" src="/images/i-pan.png">
                <!-- <span class="job_count">363</span> -->
              </div>
              <div class="cb_bottom">
                <h3>Ikebana</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit & More</p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category_box">
              <div class="cb_header">
                <img alt="" src="/images/i-pan.png">
                <!-- <span class="job_count">363</span> -->
              </div>
              <div class="cb_bottom">
                <h3>Decoración de Templos/Iglesias</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit & More</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section dark-section featured_section">
      <div class="bg-v">
        <div class="bg-v-3 bg-t-r" />
        <div class="bg-v-3 bg-b-l" />
      </div>
      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">
          Nuevos Empleos
        </h2>
        <div class="row two_col featured_box_outer">
          <div v-for="vacante in vacantes" :key="vacante.id" class="col-sm-6">
            <div class="featured_box ">
              <div class="fb_image">
                <a href="compnay-profile-single.html">
                  <img alt="brand logo" :src="vacante.user.perfil.logo">
                </a>
              </div>
              <div class="fb_content">
                <h4>
                  <a href="job-single.html"> {{ vacante.puesto }}</a>
                </h4>
                <ul>
                  <li>
                    <a href="index.html#">
                      <i class="fas fa-landmark" />
                      {{ vacante.empresa }}
                    </a>
                  </li>
                  <li>
                    <a href="index.html#">
                      <i class="fas fa-map-marker-alt" />
                      {{ vacante.estado.name }}
                    </a>
                  </li>
                  <li>
                    <a href="index.html#">
                      <i class="far fa-clock" />
                      {{ $moment(vacante.created_at).fromNow() }}
                    </a>
                  </li>
                </ul>
              </div>
              <div class="fb_action">
                <!-- <a title="add to favourite" href="index.html#"><i class="far fa-heart" /></a> -->
                <router-link :to="{ name: 'empleos.ver', params: { id: vacante.id }}" class="btn btn-third">
                  Ver vacante
                </router-link>
                <ul class="tags">
                  <!-- <li>copywriting</li>
                  <li>translating</li>
                  <li>editing</li> -->
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <a data-aos="fade-down" data-aos-delay="400" class="btn btn-primary" href="/empleos">Ver todos los empleos <i class="fas fa-long-arrow-alt-right" /></a>
          </div>
        </div>
      </div>
    </div>

    <div id="planes" class="section paln_section">
      <div class="bg-v">
        <div class="bg-v-1 bg-t-l" /><div class="bg-v-2 bg-b-l" />
      </div>
      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">
          Planes de Membresía
        </h2>
        <div class="planduration" data-aos="fade-in" data-aos-delay="400">
          <div class="custom-control custom-switch text-center">
            <label class="before-custom-control-label" for="customSwitch1"> <span>Plan Mensual</span></label>
            <input id="customSwitch1" v-model="plan" type="checkbox" class="custom-control-input">
            <label class="custom-control-label" for="customSwitch1"> <span>Plan Anual</span> </label>
            <div class="small-alert alert-success">
              Ahorra hasta un 20%
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4" data-aos="fade-left" data-aos-delay="600">
            <div class="plan_box">
              <h3>Plan Gratuito</h3>
              <p>Consigue tu talento con nuestros productos especializados de floristeria</p>
              <div v-if="plan" class="plan_price pl-yearly">
                <h4><strong>$0</strong>/ al año</h4>
              </div>
              <div v-else class="plan_price pl-monthly">
                <h4><strong>$0</strong>/ al mes</h4>
              </div>
              <h5>Características del Plan Básico</h5>
              <ul>
                <li><i class="fas fa-check" />1 publicación gratis x 30 días</li>
                <li><i class="fas fa-check" />Acceso a la plataforma</li>
                <li><i class="fas fa-check" />Gestion de perfil</li>
              </ul>
              <router-link :to="{ name: 'register', params: {type: 'empresa' } }" class="btn btn-third">
                Unirse Ahora
              </router-link>
            </div>
          </div>
          <div class="col-md-4">
            <div class="plan_box plan_box_hoverd">
              <div class="populer_plan">
                Más Popular
              </div>
              <h3>Plan Destacado</h3>
              <p>Consigue tu talento con nuestros productos especializados de floristeria</p>
              <div v-if="plan" class="plan_price pl-yearly">
                <h4><strong>$2,300</strong>/ al año</h4>
              </div>
              <div v-else class="plan_price">
                <h4><strong>$240</strong>/ al mes</h4>
              </div>
              <h5>Características del Plan Destacado</h5>
              <ul>
                <li><i class="fas fa-check" />30 visualizaciones Gratis x Mes</li>
                <li><i class="fas fa-check" />4 publicaciones x 30 días</li>
                <li><i class="fas fa-check" />Acceso a la plataforma</li>
                <li><i class="fas fa-check" />Gestion de perfil</li>
              </ul>
              <a v-if="authenticated" class="btn btn-third" :href="`/paypal/pay?user_id=${user.id}&plan_id=${plan ? 4 : 2}`" target="_blank">Mejorar a Plan Destacado</a>
              <router-link v-else :to="{ name: 'register', params: {type: 'empresa' } }" class="btn btn-third">
                Mejorar a Plan Destacado
              </router-link>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-right" data-aos-delay="600">
            <div class="plan_box">
              <h3>Plan Plus</h3>
              <p>Consigue tu talento con nuestros productos especializados de floristeria</p>
              <div v-if="plan" class="plan_price pl-yearly">
                <h4><strong>$3,696</strong>/ al año</h4>
              </div>
              <div v-else class="plan_price">
                <h4><strong>$350</strong>/ al mes</h4>
              </div>
              <h5>Características del Plan Plus</h5>
              <ul>
                <li><i class="fas fa-check" />Visualizaciones ilimitadas</li>
                <li><i class="fas fa-check" />4 publicaciones x 30 días</li>
                <li><i class="fas fa-check" />Filtros Avanzados</li>
                <li><i class="fas fa-check" />2 Publicaciones Urgentes x 30 días</li>
                <li><i class="fas fa-check" />Acceso a la plataforma</li>
                <li><i class="fas fa-check" />Gestion de perfil</li>
              </ul>
              <a v-if="authenticated" class="btn btn-third" :href="`/paypal/pay?user_id=${user.id}&plan_id=${plan ? 5 : 3}`" target="_blank">Mejorar a Plan Plus</a>
              <router-link v-else :to="{ name: 'register', params: {type: 'empresa' } }" class="btn btn-third">
                Mejorar a Plan Plus
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section status_section">
      <div class="bg-v">
        <div class="bg-v-1 bg-t-r" />
        <div class="bg-v-2 bg-b-l" />
      </div>
      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">
          Comunidad Calinextia
        </h2>

        <div class="row justify-content-center">
          <div class="col-auto">
            <div class="status_box" data-aos="fade-in" data-aos-delay="600">
              <img alt="" data-aos="fade-up" data-aos-delay="1000" src="/images/i-paper-plane.png">

              <h3>83</h3>
              <p>Trabajos Publicados</p>
            </div>
          </div>
          <div class="col-auto">
            <div class="status_box" data-aos="fade-in" data-aos-delay="800">
              <img alt="" data-aos="fade-up" data-aos-delay="1200" src="/images/i-doctor.png">

              <h3>16</h3>
              <p>Trabajos Cubiertos</p>
            </div>
          </div>
          <div class="col-auto">
            <div class="status_box" data-aos="fade-in" data-aos-delay="1000">
              <img alt="" data-aos="fade-up" data-aos-delay="1400" src="/images/i-company.png">
              <h3>36</h3>
              <p>Empleadores</p>
            </div>
          </div>
          <div class="col-auto">
            <div class="status_box" data-aos="fade-in" data-aos-delay="1200">
              <img alt="" data-aos="fade-up" data-aos-delay="1600" src="/images/i-mamber.png">
              <h3>175</h3>
              <p>Miembros</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="section gray  partner_section">
      <div class="bg-v">
        <div class="bg-v-1 bg-t-l" />
        <div class="bg-v-3 bg-b-r" />
      </div>
      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">
          Afiliados
        </h2>
        <carousel class="partner_carousel" :dots="false" :loop="true" :autoplay="true" :nav="false" :responsive="{0:{items:2},600:{items:4},1000:{items:5}}">
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-1.svg"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-2.svg"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-3.svg"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-4.png"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-5.png"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-1.svg"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-2.svg"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-3.svg"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-4.png"></a>
          <a href="index.html#"><img alt="brand logo" src="/images/company-logo-5.png"></a>
        </carousel>
      </div>
    </div> -->
  </main>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import carousel from 'vue-owl-carousel'

export default {
  components: { carousel },

  metaInfo () {
    return { title: this.$t('home') }
  },
  data: () => ({
    title: window.config.appName,
    plan: false,
    vacantes: []
  }),
  computed: mapGetters({
    authenticated: 'auth/check',
    user: 'auth/user'
  }),
  mounted () {
    this.fetchNuevasVacantes().then((res) => {
      console.log(res)
      this.vacantes = res
    })
  },
  methods: {
    ...mapActions({
      fetchNuevasVacantes: 'empleo/fetchNuevasVacantes'
    })
  }
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
.owl-theme .owl-dots .owl-dot span {
  display: none !important;
}
</style>
