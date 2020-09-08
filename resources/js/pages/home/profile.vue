<template>
  <div class="col-sm-12">
    <div class="jm_headings">
      <h5>Mi perfil</h5>
    </div>
    <div class="section-divider" />
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
          <div class="header_job_single_inner container">
            <div class="poster_staff">
              <img v-if="user.perfil && user.perfil.logo" alt="brand logo" :src="user.perfil.logo">
              <img v-else alt="brand logo" src="/images/avatar-placeholder.png">
            </div>
            <div class="profile_details">
              <h2>{{ user.first_name }} {{ user.last_name }}</h2>
              <h5>{{ user.email }}</h5>
              <h5>{{ user.perfil.nombre_comercial }}</h5>
            </div>
            <a v-if="!edit" class="btn btn-primary mypbtn boton-editar" href="#" @click="edit = true">Editar</a>
          </div>
        </div>
        <div v-else-if="role == 'empresa' && edit" class="col-md-12">
          <div class="header_job_single_inner container">
            <div class="poster_staff">
              <el-upload
                action="https://jsonplaceholder.typicode.com/posts/"
                list-type="picture-card"
                :on-preview="handlePictureCardPreview"
                :on-remove="handleRemove">
                <i class="el-icon-plus" />
              </el-upload>
              <el-dialog :visible.sync="dialogVisible">
                <img width="100%" :src="dialogImageUrl" alt="">
              </el-dialog>
              <img v-if="user.perfil && user.perfil.logo" alt="brand logo" :src="user.perfil.logo">
              <img v-else alt="brand logo" src="/images/avatar-placeholder.png">
            </div>
            <div class="profile_details">
              <h2>{{ user.first_name }} {{ user.last_name }}</h2>
              <h5>{{ user.email }}</h5>
              <h5>{{ user.perfil.nombre_comercial }}</h5>
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
            <a v-if="!edit" class="btn btn-primary mypbtn boton-editar" href="#" @click="edit = true">Editar</a>
          </div>
        </div>
        <div v-else-if="role == 'aspirante' && edit" class="col-md-12">
          <div class="header_job_single_inner container">
            <div class="poster_staff">
              <el-upload
                action="https://jsonplaceholder.typicode.com/posts/"
                list-type="picture-card"
                :on-preview="handlePictureCardPreview"
                :on-remove="handleRemove">
                <i class="el-icon-plus" />
              </el-upload>
              <el-dialog :visible.sync="dialogVisible">
                <img width="100%" :src="dialogImageUrl" alt="">
              </el-dialog>
              <img v-if="user.perfil && user.perfil.foto" alt="brand logo" :src="user.perfil.foto">
              <img v-else alt="brand logo" src="/images/avatar-placeholder.png">
            </div>
            <div class="profile_details">
              <h2>{{ user.first_name }} {{ user.last_name }}</h2>
              <h5>{{ user.email }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="edit" class="form-group row">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary" @click="edit = false">Guardar</button>
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
    dialogImageUrl: '',
    dialogVisible: false,
    imageUrl: ''
  }),
  computed: mapGetters({
    user: 'auth/user',
    role: 'auth/role'
  }),
  mounted () {
    this.setTitle('Perfil')
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle'
    }),
    handleAvatarSuccess (res, file) {
      this.imageUrl = URL.createObjectURL(file.raw)
    },
    beforeAvatarUpload (file) {
      const isJPG = file.type === 'image/jpeg'
      const isLt2M = file.size / 1024 / 1024 < 2

      if (!isJPG) {
        this.$message.error('La imagen debe estar en formato JPG!')
      }
      if (!isLt2M) {
        this.$message.error('La imagen excede los 2MB!')
      }
      return isJPG && isLt2M
    },
    handleRemove (file, fileList) {
      console.log(file, fileList)
    },
    handlePictureCardPreview (file) {
      this.dialogImageUrl = file.url
      this.dialogVisible = true
    },
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
