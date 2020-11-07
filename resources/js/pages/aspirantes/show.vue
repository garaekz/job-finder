<template>
  <main>
    <div class="single_job">
      <div v-if="aspirante" class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row ">
              <div class="col-md-12 single_job_main">
                <h2>Descripción personal</h2>
                <!-- eslint-disable-next-line vue/no-v-html -->
                <div v-if="aspirante.descripcion" v-html="sanitizar(aspirante.descripcion)" />
                <div>
                  No hay descripción
                </div>
                <br>
              </div>
              <div class="col-md-12 single_job_main">
                <h2>Experiencia laboral</h2>
                <!-- eslint-disable-next-line vue/no-v-html -->
                <div v-if="aspirante.experiencias">
                  <el-table
                    :data="aspirante.experiencias"
                    style="width: 100%"
                  >
                    <el-table-column
                      fixed
                      prop="empresa"
                      label="Empresa"
                      style="white-space: nowrap;"
                    />
                    <el-table-column
                      fixed
                      prop="puesto"
                      label="Puesto"
                    />
                    <el-table-column
                      prop="inicio"
                      label="Inicio"
                    />
                    <el-table-column
                      prop="termino"
                      label="Fin"
                    />
                  </el-table>
                </div>
                <div v-else>
                  No ha proporcionado experiencia laboral
                </div>
              </div>
              <div class="col-md-12 single_job_main">
                <h2>Formación académica</h2>
                <!-- eslint-disable-next-line vue/no-v-html -->
                <div v-if="aspirante.formaciones">
                  <el-table
                    :data="aspirante.formaciones"
                    style="width: 100%"
                  >
                    <el-table-column
                      fixed
                      prop="lugar"
                      label="Lugar"
                      style="white-space: nowrap;"
                    />
                    <el-table-column
                      prop="inicio"
                      label="Inicio"
                    />
                    <el-table-column
                      prop="termino"
                      label="Fin"
                    />
                  </el-table>
                </div>
                <div v-else>
                  No ha proporcionado formación académica
                </div>
              </div>
              <div class="section-divider" />
              <div class="col-md-12 single_job_main">
                <div class="row two_col featured_box_outer">
                  <div class="col-md-12 text-center">
                    <router-link :to="{ name: 'aspirantes' }" class="btn btn-primary">
                      Ver todos los aspirantes <i class="fas fa-long-arrow-alt-right" />
                    </router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="single-job-sidebar">
              <div class="sjs_box">
                <h3>Datos personales</h3>
                <ul class="single-job-sidebar-features">
                  <li>
                    <i class="fas fa-map-marker-alt" />
                    <h6>Lugar</h6>
                    <p v-if="aspirante.perfil_aspirante.estado && aspirante.perfil_aspirante.municipio">
                      {{ aspirante.perfil_aspirante.municipio.name }}, {{ aspirante.perfil_aspirante.estado.name }}
                    </p>
                    <p v-else>
                      No proporcionado
                    </p>
                  </li>
                  <li>
                    <i class="fas fa-phone" />
                    <h6>Teléfono</h6>
                    <p v-if="aspirante.telefono">
                      {{ aspirante.telefono }}
                    </p>
                    <p v-else>
                      No proporcionado
                    </p>
                  </li>
                  <li>
                    <i class="far fa-envelope" />
                    <h6>email</h6>
                    <a :href="`mailto:${aspirante.email}`">{{ aspirante.email }}</a>
                  </li>
                  <li>
                    <i class="fas fa-calendar-alt" />
                    <h6>Edad</h6>
                    <p v-if="aspirante.perfil.fecha_nacimiento">
                      {{ calcularEdad(aspirante.perfil.fecha_nacimiento) }}
                    </p>
                    <p v-else>
                      No proporcionado
                    </p>
                  </li>
                </ul>
              </div>
            </div>
            <div class=" sjs_box_action">
              <a v-if="aspirante.perfil.cv" class="btn btn-third" :href="aspirante.perfil.cv" target="_blank"><i class="fas fa-cloud-download-alt" /> Descargar Curriculum</a>
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
    aspirante: 'empleo/aspirante'
  }),
  mounted () {
    this.fetchAspirante(this.id)
  },
  methods: {
    ...mapActions({
      fetchAspirante: 'empleo/fetchSingleAspirante'
    }),
    calcularEdad (fecha) {
      return `${this.$moment().diff(fecha, 'years')} años`
    },
    sanitizar (html) {
      return this.$sanitize(html)
    }
  }
}
</script>
<style lang="scss" scoped>

</style>
