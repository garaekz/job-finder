<template>
  <div class="col-sm-12">
    <div class="jm_headings">
      <h5>Mi perfil</h5>
    </div>
    <div class="section-divider" />
    <div class="row">
      <div class="col-md-12">
        <div class="big_form_group">
          <div v-if="!user" class="row">
            <div class="col-md-12 header_job_single_inner container">
              <div class="skeleton-staff">
                <img>
              </div>
              <div class="skeleton-details">
                <h2 />
                <h5 />
                <h5 />
              </div>
            </div>
          </div>
          <div v-else class="row">
            <div v-if="role == 'empresa' && !edit" class="col-md-12">
              <div class="header_job_single_inner container row">
                <div class="poster_staff col-md-3">
                  <img v-if="user.perfil && user.perfil.logo" alt="brand logo" :src="user.perfil.logo">
                  <img v-else alt="brand logo" src="/images/avatar-placeholder.png">
                </div>
                <div class="profile_details col-md-8">
                  <h2>{{ user.first_name }} {{ user.last_name }}</h2>
                  <h5>{{ user.email }}</h5>
                  <h5>{{ user.perfil.nombre_comercial }}</h5>
                </div>
                <a v-if="!edit" class="btn btn-primary mypbtn boton-editar" href="#" @click="edit = true">Editar</a>
              </div>
            </div>
            <!-- Empresa EDIT -->
            <div v-else-if="role == 'empresa' && edit" class="col-md-12">
              <div class="header_job_single_inner container row">
                <div class="poster_staff col-md-12 text-center">
                  <el-upload
                    action="/api/perfil/update-image"
                    list-type="picture-card"
                    :on-preview="handlePictureCardPreview"
                    :on-remove="handleRemove"
                    :before-upload="beforeAvatarUpload"
                    :on-success="handleAvatarSuccess"
                    :file-list="fileList"
                    :disabled="fileList.length > 0"
                  >
                    <i class="el-icon-plus" />
                    <div slot="file" slot-scope="{file}">
                      <img
                        class="el-upload-list__item-thumbnail"
                        :src="file.url" alt=""
                      >
                      <span class="el-upload-list__item-actions">
                        <span
                          class="el-upload-list__item-preview"
                          @click="handlePictureCardPreview(file)"
                        >
                          <i class="el-icon-zoom-in" />
                        </span>
                        <span
                          v-if="!disabled"
                          class="el-upload-list__item-delete"
                          @click="handleRemove(file)"
                        >
                          <i class="el-icon-delete" />
                        </span>
                      </span>
                    </div>
                  </el-upload>
                  <el-dialog :visible.sync="dialogVisible">
                    <img width="100%" :src="dialogImageUrl" alt="">
                  </el-dialog>
                </div>
              </div>
              <div class="row" style="margin-top: 2em;">
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Nombre(s)</label>
                    <input v-model="perfil.first_name" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Apellido(s)</label>
                    <input v-model="perfil.last_name" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Email</label>
                    <input v-model="perfil.email" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Nombre comercial</label>
                    <input v-model="perfil.nombre_comercial" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>RFC</label>
                    <input v-model="perfil.rfc" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Razón Social</label>
                    <input v-model="perfil.razon_social" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Nueva contraseña</label>
                    <input v-model="perfil.password" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Confirmar contraseña</label>
                    <input v-model="perfil.password_confirmation" type="text" class="form-control" placeholder="">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 1em;">
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Estado</label>
                    <el-select v-model="perfil.estado_id" placeholder="Select" @change="perfil.municipio_id=null;fetchMunicipios($event)">
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
                    <label>Municipio</label>
                    <el-select v-model="perfil.municipio_id" :disabled="municipios.length < 1" placeholder="Select">
                      <el-option
                        v-for="item in municipios"
                        :key="item.id"
                        :label="item.name"
                        :value="item.id"
                      />
                    </el-select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Código postal</label>
                    <input v-model="perfil.cp" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Teléfono</label>
                    <input v-model="perfil.telefono" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Página Web</label>
                    <input v-model="perfil.web" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Cantidad de empleados</label>
                    <input v-model="perfil.empleados" type="number" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group ">
                    <label>Descripción</label>
                    <textarea v-model="perfil.descripcion" rows="5" style="width:100%;" />
                  </div>
                </div>
              </div>
            </div>
            <div v-if="role == 'aspirante' && !edit" class="col-md-12">
              <div class="header_job_single_inner container">
                <div class="poster_staff">
                  <img v-if="user.perfil && user.perfil.foto" alt="brand logo" :src="user.perfil.foto">
                  <img v-else alt="brand logo" src="/images/avatar-placeholder.png">
                </div>
                <div class="profile_details">
                  <h2>{{ user.first_name }} {{ user.last_name }}</h2>
                  <h5>{{ user.email }}</h5>
                </div>
                <a v-if="!edit" class="btn btn-primary mypbtn boton-editar" href="#" @click="prepareEdit('aspirante')">Editar</a>
              </div>
            </div>
            <!-- Aspirante EDIT -->
            <div v-else-if="role == 'aspirante' && edit" class="col-md-12">
              <div class="header_job_single_inner container row">
                <div class="poster_staff col-md-12 text-center">
                  <el-upload
                    action="/api/perfil/update-image"
                    list-type="picture-card"
                    :on-preview="handlePictureCardPreview"
                    :on-remove="handleRemove"
                    :before-upload="beforeAvatarUpload"
                    :on-success="handleAvatarSuccess"
                    :file-list="fileList"
                    :disabled="fileList.length > 0"
                  >
                    <i class="el-icon-plus" />
                    <div slot="file" slot-scope="{file}">
                      <img
                        class="el-upload-list__item-thumbnail"
                        :src="file.url" alt=""
                      >
                      <span class="el-upload-list__item-actions">
                        <span
                          class="el-upload-list__item-preview"
                          @click="handlePictureCardPreview(file)"
                        >
                          <i class="el-icon-zoom-in" />
                        </span>
                        <span
                          v-if="!disabled"
                          class="el-upload-list__item-delete"
                          @click="handleRemove(file)"
                        >
                          <i class="el-icon-delete" />
                        </span>
                      </span>
                    </div>
                  </el-upload>
                  <el-dialog :visible.sync="dialogVisible">
                    <img width="100%" :src="dialogImageUrl" alt="">
                  </el-dialog>
                </div>
              </div>
              <div class="row" style="margin-top: 2em;">
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Nombre(s)</label>
                    <input v-model="perfil.first_name" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Apellido(s)</label>
                    <input v-model="perfil.last_name" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Email</label>
                    <input v-model="perfil.email" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Fecha de nacimiento</label>
                    <el-date-picker
                      v-model="perfil.fecha_nacimiento"
                      type="date"
                      value-format="yyyy-MM-dd"
                      placeholder="Elige la fecha"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Nueva contraseña</label>
                    <input v-model="perfil.password" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Confirmar contraseña</label>
                    <input v-model="perfil.password_confirmation" type="text" class="form-control" placeholder="">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 1em;">
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Estado</label>
                    <el-select v-model="perfil.estado_id" placeholder="Select" @change="perfil.municipio_id=null;fetchMunicipios($event)">
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
                    <label>Municipio</label>
                    <el-select v-model="perfil.municipio_id" :disabled="municipios.length < 1" placeholder="Select">
                      <el-option
                        v-for="item in municipios"
                        :key="item.id"
                        :label="item.name"
                        :value="item.id"
                      />
                    </el-select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Código postal</label>
                    <input v-model="perfil.cp" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Teléfono</label>
                    <input v-model="perfil.telefono" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Nacionalidad</label>
                    <input v-model="perfil.nacionalidad" type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Estado civil</label>
                    <el-select v-model="perfil.civil_status_id" placeholder="Select">
                      <el-option
                        v-for="item in estados_civiles"
                        :key="item.id"
                        :label="item.name"
                        :value="item.id"
                      />
                    </el-select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label>Área de Especialidad </label>
                    <el-select v-model="perfil.especialidad_id" placeholder="Select">
                      <el-option
                        v-for="item in areas_especialidad"
                        :key="item.id"
                        :label="item.name"
                        :value="item.id"
                      />
                    </el-select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group ">
                    <label>Descripción</label>
                    <textarea v-model="perfil.descripcion" rows="5" style="width:100%;" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-if="role === 'aspirante'" class="col-md-6">
        <div class="big_form_group">
          <h4>
            Formación <button type="button" class="btn btn-success btn-sm">
              Agregar
            </button>
          </h4>
        </div>
      </div>
      <div v-if="role === 'aspirante'" class="col-md-6">
        <div class="big_form_group">
          <h4>Experiencia laboral <button type="button" class="btn btn-success btn-sm">
              Agregar
            </button>
          </h4>
        </div>
      </div>
    </div>
    <div v-if="edit" class="form-group row">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary" @click="onSavePerfil(perfil)">
          Guardar
        </button>
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
    estados: 'resources/estados',
    estados_civiles: 'resources/estados_civiles',
    municipios: 'resources/municipios',
    areas_especialidad: 'resources/areas_especialidad'
  }),
  mounted () {
    this.setTitle('Perfil')
    if (this.user) {
      this.perfil = this.user.perfil
      this.perfil.first_name = this.user.first_name
      this.perfil.last_name = this.user.last_name
      this.perfil.email = this.user.email

      let url
      if (this.role === 'empresa') {
        url = this.user.perfil.logo ?? '/images/avatar-placeholder.png'
      } else {
        url = this.user.perfil.foto ?? '/images/avatar-placeholder.png'
      }
      this.fileList.push({ url: url })
    }
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle',
      fetchEstados: 'resources/fetchEstados',
      fetchMunicipios: 'resources/fetchMunicipios',
      fetchEstadosCiviles: 'resources/fetchEstadosCiviles',
      fetchAreasEspecialidad: 'resources/fetchAreasEspecialidad',
      savePerfil: 'auth/savePerfil'
    }),
    prepareEdit (role = null) {
      this.fetchEstados()
      this.fetchAreasEspecialidad()
      if (role === 'aspirante') {
        this.fetchEstadosCiviles().then(() => {
          this.edit = true
        })
      } else {
        this.edit = true
      }
    },
    onSavePerfil (perfil) {
      this.savePerfil(perfil).then(() => {
        this.edit = false
      })
    },
    handleAvatarSuccess (res, file) {
      if (res) {
        this.fileList = [{ url: res.path }]
        let user = this.user
        if (this.role === 'empresa') {
          user.perfil.logo = res.path
        } else {
          user.perfil.foto = res.path
        }
      }
    },
    beforeAvatarUpload (file) {
      const isValidMime = file.type === 'image/jpeg' || file.type === 'image/png'
      const isLt2M = file.size / 1024 / 1024 < 2

      if (!isValidMime) {
        this.$message.error('La imagen debe estar en formato JPG o PNG!')
      }
      if (!isLt2M) {
        this.$message.error('La imagen excede los 2MB!')
      }
      return isValidMime && isLt2M
    },
    handleRemove (file, fileList) {
      console.log(file, fileList)
      this.fileList = []
    },
    handlePictureCardPreview (file) {
      this.dialogImageUrl = file.url
      this.dialogVisible = true
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
