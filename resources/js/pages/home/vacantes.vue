<template>
  <div class="col-sm-12">
    <div class="jm_headings">
      <h5>Mis vacantes publicadas</h5>
    </div>
    <div class="section-divider" />
    <div class="row">
      <div class="col-md-12">
        <div v-if="vacantes" class="table-cont">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre del puesto</th>
                <th>Empresa</th>
                <th>Status</th>
                <th>Fecha de publicación</th>
                <th>Fecha de finalización</th>
                <th>Interesados</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="vacante in vacantes.data" :key="vacante.id">
                <td style="white-space: nowrap;">
                  <!-- <h6><a href="post-a-job.html">Manager</a></h6> -->
                  <h6>{{ vacante.puesto }}</h6>
                  <ul class="job-dashboard-actions">
                    <li>
                      <a href="#" class="job-dashboard-action-edit">
                        Editar
                      </a>
                    </li>
                    <li>
                      <a href="#" class="job-dashboard-action-mark_filled">
                        Desactivar</a>
                    </li>
                    <li>
                      <a href="#" class="job-dashboard-action-delete">
                        Borrar
                      </a>
                    </li>
                  </ul>
                </td>
                <td>
                  {{ vacante.empresa }}
                </td>
                <td>
                  2
                </td>
                <td>
                  {{ $moment(vacante.created_at).format('DD/MM/YYYY') }}
                </td>
                <td>
                  2020/10/01
                </td>
                <td>
                  1
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div v-if="vacantes" class="col-sm-12" style="margin-top: 2em;">
        <pagination class="justify-content-center" :data="vacantes" @pagination-change-page="fetchEmpresaVacantes">
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
    fileList: [],
    disabled: false,
    edit: false,
    dialogImageUrl: '',
    dialogVisible: false,
    imageUrl: '',
    perfil: {
      first_name: null,
      last_name: null
    }
  }),
  computed: mapGetters({
    user: 'auth/user',
    role: 'auth/role',
    vacantes: 'empleo/empresa_vacantes'
  }),
  mounted () {
    this.setTitle('Mis vacantes publicadas')
    this.fetchEmpresaVacantes()
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle',
      fetchEmpresaVacantes: 'empleo/fetchEmpresaVacantes'
    })
  }
}
</script>
<style lang="scss" scoped>
  .skeleton-staff {
      background: #fff;
      width: 130px;
      padding: 0;
      margin-right: 15px;
      margin-right: 30px;
      height: 100%;
      overflow: hidden;
      & img {
        width: 100%;
        height: 130px;
        background: #ddd;
        animation: pulse-bg 1s infinite;
      }
  }
  .skeleton-details h2 {
    content: ' ';
    width: 350px;
    height: 1.3em;
    background-color: #ddd;
    margin: 10px 0;
    animation: pulse-bg 1s infinite;
  }
  .skeleton-details h5 {
    content: ' ';
    width: 300px;
    height: 24px;
    background-color: #ddd;
    margin: 15px 0;
    animation: pulse-bg 1s infinite;
  }
  @keyframes pulse-bg {
    0% { background-color: #ddd; }
    50% { background-color: #d0d0d0; }
    100% { background-color: #ddd; }
  }
  .boton-editar {
    align-self: flex-start;
  }
    .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
  .avatar {
    width: 178px;
    height: 178px;
    display: block;
  }
</style>
