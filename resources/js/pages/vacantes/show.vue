<template>
  <main>
    <div class="single_job">
      <div v-if="vacante" class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row ">
              <div class="col-md-12 single_job_main">
                <h2>Descripción del puesto</h2>
                <!-- eslint-disable-next-line vue/no-v-html -->
                <div v-html="sanitizar(vacante.descripcion)" />
              </div>
              <div class="section-divider" />
              <div class="col-md-12 single_job_main">
                <div class="row two_col featured_box_outer">
                  <div class="col-md-12 text-center">
                    <router-link :to="{ name: 'empleos' }" class="btn btn-primary">
                      Ver todos los empleos <i class="fas fa-long-arrow-alt-right" />
                    </router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="single-job-sidebar">
              <div class="sjs_box">
                <h3>Resumen de la vacante</h3>
                <ul class="single-job-sidebar-features">
                  <li>
                    <i class="fas fa-map-marker-alt" />
                    <h6>Lugar</h6>
                    <p>{{ vacante.estado.name }}</p>
                  </li>
                  <li>
                    <i class="fas fa-briefcase" />
                    <h6>Jornada</h6>
                    <p>{{ vacante.jornada }}</p>
                  </li>
                  <li>
                    <i class="fas fa-money-bill-alt" />
                    <h6>Salario</h6>
                    <p>{{ vacante.sueldo | currency }}</p>
                  </li>
                  <li>
                    <i class="far fa-clock" />
                    <h6>Experiencia</h6>
                    <p>{{ vacante.experiencia }}</p>
                  </li>
                  <li>
                    <i class="fas fa-phone" />
                    <h6>Teléfono</h6>
                    <p>{{ vacante.telefono }}</p>
                  </li>
                  <li>
                    <i class="far fa-envelope" />
                    <h6>email</h6>
                    <p>{{ vacante.email }}</p>
                  </li>
                  <li>
                    <i class="fas fa-pencil-alt" />
                    <h6>Información adicional</h6>
                    <p>{{ vacante.comentario }}</p>
                  </li>
                </ul>
              </div>
              <div class="sjs_box">
                <h3>Qué ofrecemos:</h3>
                <ul class="tags">
                  <li v-for="p in vacante.prestaciones" :key="p.id">
                    {{ p.name }}
                  </li>
                </ul>
              </div>
            </div>
            <div class=" sjs_box_action">
              <a class="btn btn-third" href="#">Contactar al empleador</a>
              <p>- o -</p>
              <a class="btn btn-primary" href="#">Aplicar a la vacante</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  props: {
    id: { type: String, default: '' }
  },
  data: () => ({
    edit: false,
    imageUrl: ''
  }),
  computed: mapGetters({
    vacante: 'empleo/vacante'
  }),
  mounted () {
    this.fetchVacante(this.id)
  },
  methods: {
    ...mapActions({
      fetchVacante: 'empleo/fetchSingleVacante'
    }),
    sanitizar (html) {
      return this.$sanitize(html)
    }
  }
}
</script>
<style lang="scss" scoped>

</style>
