<template>
  <div class="col-sm-12">
    <div class="">
      <div class="row">
        <div class="col-md-6">
          <h5>Mis vacantes solicitadas</h5>
        </div>
      </div>
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
                <th />
              </tr>
            </thead>
            <tbody>
              <tr v-for="vacante in vacantes.data" :key="vacante.id">
                <td style="white-space: nowrap;">
                  <!-- <h6><a href="post-a-job.html">Manager</a></h6> -->
                  <h6>{{ vacante.puesto }}</h6>
                </td>
                <td>
                  {{ vacante.empresa }}
                </td>
                <td>
                  <router-link :to="{ name: 'empleos.ver', params: { id: vacante.id }}" class="btn btn-primary">
                    Ver vacante
                  </router-link>
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
    <el-dialog title="Lista de interesados" :visible.sync="dialogVisible">
      <el-table
        :data="interesados"
        style="width: 100%"
      >
        <el-table-column
          label="Nombre"
          style="white-space: nowrap;"
        >
          <template slot-scope="scope">
            {{ `${scope.row.first_name} ${scope.row.last_name}` }}
          </template>
        </el-table-column>
        <el-table-column
          prop="email"
          label="Email"
        />
        <el-table-column
          label="Teléfono"
          style="white-space: nowrap;"
        >
          <template slot-scope="scope">
            {{ scope.row.perfil_aspirante && scope.row.perfil_aspirante.telefono ? scope.row.perfil_aspirante.telefono : '-' }}
          </template>
        </el-table-column>
        <el-table-column
          fixed="right"
          label=""
        >
          <template slot-scope="scope">
            <router-link :to="{ name: 'aspirantes.ver', params: { id: scope.row.id }}" class="btn btn-primary">
              Ver perfil
            </router-link>
          </template>
        </el-table-column>
      </el-table>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false; interesados = []">Cancelar</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import Swal from 'sweetalert2'

export default {
  middleware: 'auth',
  data: () => ({
    fileList: [],
    disabled: false,
    edit: false,
    dialogImageUrl: '',
    dialogVisible: false,
    interesados: [],
    imageUrl: '',
    perfil: {
      first_name: null,
      last_name: null
    }
  }),
  computed: mapGetters({
    user: 'auth/user',
    role: 'auth/role',
    vacantes: 'empleo/aspirante_vacantes'
  }),
  mounted () {
    this.setTitle('Mis vacantes publicadas')
    this.fetchAspiranteVacantes()
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle',
      fetchAspiranteVacantes: 'empleo/fetchAspiranteVacantes',
      deleteVacante: 'empleo/deleteVacante'
    }),
    borrarVacante (id) {
      Swal.fire({
        type: 'warning',
        title: '¿Estás seguro?',
        showCancelButton: true,
        text: 'La vacante se eliminará por completo y no podrás recuperarla',
        reverseButtons: true,
        confirmButtonText: 'Ok',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
          this.deleteVacante(id).then(() => {
            Swal.fire({
              type: 'success',
              title: 'Se ha eliminado exitosamente',
              showConfirmButton: true,
              timer: 1500
            })
            this.fetchEmpresaVacantes()
          })
        }
      })
    }
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
