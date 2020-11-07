<template>
  <div class="col-sm-12">
    <div class="jm_headings">
      <h5>Lista de empleados potenciales</h5>
    </div>
    <div class="section-divider" />
    <div v-if="aspirantes" class="row full_width featured_box_outer">
      <div v-for="aspirante in aspirantes.data" :key="aspirante.id" class="col-sm-12">
        <transition name="fade">
          <div class="featured_box">
            <div class="fb_image">
              <img alt="brand logo" :src="aspirante.perfil.foto ? aspirante.perfil.foto : '/images/avatar-placeholder.png'">
            </div>
            <div class="fb_content">
              <h4>{{ aspirante.first_name }} {{ aspirante.last_name }}</h4>
              <ul>
                <li>
                  <a v-if="aspirante.perfil.cv" :href="aspirante.perfil.cv" target="_blank">
                    <i class="fas fa-file" />
                    Descargar CV
                  </a>
                  <a v-else>
                    <i class="fas fa-file" />
                    No ha subido su CV
                  </a>
                </li>
                <li>
                  <a v-if="aspirante.perfil.especialidad_id">
                    <i class="fas fa-glasses" />
                    {{ aspirante.perfil.especialidad.name }}
                  </a>
                  <a v-else>
                    <i class="fas fa-glasses" />
                    No especifica su especialidad
                  </a>
                </li>
                <!-- <li>
                  <a>
                    <i class="fas fa-map-marker-alt" />
                    {{ aspirante.estado.name }}
                  </a>
                </li>
                <li>
                  <a>
                    <i class="far fa-clock" />
                    {{ $moment(aspirante.created_at).fromNow() }}
                  </a>
                </li> -->
              </ul>
            </div>
            <div class="fb_action">
              <router-link :to="{ name: 'aspirantes.ver', params: { id: aspirante.id }}" class="btn btn-primary">
                Ver perfil
              </router-link>
            </div>
          </div>
        </transition>
      </div>
      <div class="col-sm-12" style="margin-top: 2em;">
        <pagination class="justify-content-center" :data="aspirantes" @pagination-change-page="fetchAspirantes">
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
  middleware: 'auth',
  data: () => ({
    edit: false,
    imageUrl: ''
  }),
  computed: mapGetters({
    aspirantes: 'empleo/aspirantes'
  }),
  mounted () {
    this.setTitle('Búsqueda de aspirantes')
    this.fetchAspirantes()
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle',
      fetchAspirantes: 'empleo/fetchAspirantes'
    })
  }
}
</script>
<style lang="scss" scoped>

</style>
