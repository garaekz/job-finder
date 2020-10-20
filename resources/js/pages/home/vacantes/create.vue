<template>
  <div class="col-sm-12">
    <div class="">
      <div class="row">
        <div class="col-md-6">
          <h5>Crear nueva vacante</h5>
        </div>
      </div>
    </div>
    <div class="section-divider" />
    <div class="row">
      <div class="col-md-12">
        <div class="big_form_group">
          <div class="row" style="margin-top: 2em;">
            <div class="col-md-6">
              <div class="form-group ">
                <label>Nombre de la empresa</label>
                <input v-model="vacante.empresa" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Estado</label>
                <el-select v-model="vacante.estado_id" placeholder="Seleccionar">
                  <el-option
                    v-for="item in estados"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id"
                  />
                </el-select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Nombre del puesto</label>
                <input v-model="vacante.puesto" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Jornada</label>
                <input v-model="vacante.jornada" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group " style="height: 250px;">
                <label>Descripción del puesto</label>
                <!-- <textarea v-model="vacante.descripcion" rows="5" style="width:100%;" /> -->
                <quill-editor
                  ref="myQuillEditor"
                  v-model="vacante.descripcion"
                  style="height: 180px;color: #000;"
                  :options="editorOptions"
                />
              </div>
            </div>
          </div>
          <div class="row" style="margin-top: 2em;">
            <div class="col-md-4">
              <div class="form-group ">
                <label>Edad</label>
                <input v-model="vacante.edad" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group ">
                <label>Sexo</label>
                <el-select v-model="vacante.sexo" placeholder="Seleccionar">
                  <el-option
                    v-for="item in sexos"
                    :key="item"
                    :label="item"
                    :value="item"
                  />
                </el-select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group ">
                <label>Años de experiencia</label>
                <input v-model="vacante.experiencia" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Qué ofrecemos</label>
                <el-select v-model="vacante.prestaciones" multiple placeholder="Select" style="width: 100%;">
                  <el-option
                    v-for="item in prestaciones"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id"
                  />
                </el-select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Otros (no en la lista)</label>
                <input v-model="vacante.otras_prestaciones" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Sueldo base</label>
                <input v-model="vacante.sueldo" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Actividades</label>
                <input v-model="vacante.actividades" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Teléfono</label>
                <input v-model="vacante.telefono" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label>Email</label>
                <input v-model="vacante.email" type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group " style="height: 250px;">
                <label>Comentarios</label>
                <quill-editor
                  ref="myQuillEditor"
                  v-model="vacante.comentario"
                  style="height: 180px;color: #000;"
                  :options="editorOptions"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8" />
      <div class="col-md-4 text-right">
        <button class="btn btn-success" @click="onSaveVacante">
          Guardar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import { quillEditor } from 'vue-quill-editor'
import Swal from 'sweetalert2'

export default {
  middleware: 'auth',
  components: {
    quillEditor
  },
  data: () => ({
    fileList: [],
    disabled: false,
    edit: false,
    dialogImageUrl: '',
    dialogVisible: false,
    imageUrl: '',
    vacante: {},
    sexos: ['Femenino', 'Masculino', 'Indistinto'],
    editorOptions: {
      modules: {
        toolbar: [
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
            { 'list': 'ordered' },
            { 'list': 'bullet' }
          ],
          [{ 'align': [] }]
        ]
      }
    }
  }),
  computed: mapGetters({
    user: 'auth/user',
    role: 'auth/role',
    estados: 'resources/estados',
    prestaciones: 'resources/prestaciones',
    vacantes: 'empleo/empresa_vacantes'
  }),
  mounted () {
    this.setTitle('Crear nueva vacante')
    this.fetchEmpresaVacantes()
    this.fetchEstados()
    this.fetchPrestaciones()
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle',
      fetchEmpresaVacantes: 'empleo/fetchEmpresaVacantes',
      fetchEstados: 'resources/fetchEstados',
      fetchPrestaciones: 'resources/fetchPrestaciones',
      saveVacante: 'empleo/saveVacante'
    }),
    onSaveVacante () {
      this.saveVacante(this.vacante).then(res => {
        if (res.error) {
          Swal.fire({
            type: 'error',
            title: 'No se ha podido guardar el registro, verifica tu formulario',
            showConfirmButton: true
          })
        } else {
          this.$router.push({ name: 'home.vacantes' })
        }
        console.log(res)
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
