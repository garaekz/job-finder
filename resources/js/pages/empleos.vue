<template>
  <div class="col-sm-12">
    <div class="jm_headings">
      <h5>Lista de empleos</h5>
    </div>
    <div class="section-divider" />
    <div v-if="vacantes" class="row full_width featured_box_outer">
      <div v-for="vacante in vacantes.data" :key="vacante.id" class="col-sm-12">
        <transition name="fade">
          <div class="featured_box ">
            <div class="fb_image">
              <img alt="brand logo" :src="vacante.user.perfil.logo">
            </div>
            <div class="fb_content">
              <h4>Empleo de {{ vacante.puesto }}</h4>
              <ul>
                <li>
                  <a>
                    <i class="fas fa-landmark" />
                    {{ vacante.empresa }}
                  </a>
                </li>
                <li>
                  <a>
                    <i class="fas fa-map-marker-alt" />
                    {{ vacante.estado.name }}
                  </a>
                </li>
                <li>
                  <a>
                    <i class="far fa-clock" />
                    {{ $moment(vacante.created_at).fromNow() }}
                  </a>
                </li>
              </ul>
            </div>
            <div class="fb_action">
              <router-link :to="{ name: 'empleos.ver', params: { id: vacante.id }}" class="btn btn-primary">
                Ver vacante
              </router-link>
            </div>
          </div>
        </transition>
      </div>
      <div class="col-sm-12" style="margin-top: 2em;">
        <pagination class="justify-content-center" :data="vacantes" @pagination-change-page="fetchVacantes">
          <span slot="prev-nav">&lt; Anterior</span>
          <span slot="next-nav">Siguiente &gt;</span>
        </pagination>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  middleware: 'guest',
  data: () => ({
    edit: false,
    imageUrl: ''
  }),
  computed: mapGetters({
    vacantes: 'empleo/vacantes'
  }),
  mounted () {
    this.setTitle('Búsqueda de empleos')
    this.fetchVacantes()
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle',
      fetchVacantes: 'empleo/fetchVacantes'
    })
  }
}
</script>
<style lang="scss" scoped>

</style>
