<template>
  <div class="only-form-pages">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="only-form-box">
            <div class="welcome-text text-center mb-5">
              <h5 class="mb-0">
                ¡Crea una cuenta!
              </h5>
              <span>¿Ya estas registrado?
                <router-link :to="{ name: 'login' }">
                  ¡Inicia sesión!
                </router-link>
              </span>
            </div>
            <div class="form-group user_type_cont">
              <label class="user_type" for="usertype-1">
                <input id="usertype-1" v-model="form.userType" type="radio" name="usertype" value="aspirante">
                <span><i class="far fa-user" /> Aspirante</span>
              </label>
              <label class="user_type" for="usertype-2">
                <input id="usertype-2" v-model="form.userType" type="radio" name="usertype" value="empresa">
                <span><i class="fas fa-landmark" /> Empresa</span>
              </label>
            </div>
            <form @submit.prevent="register" @keydown="form.onKeydown($event)">
              <div v-if="form.userType == 'empresa'" class="com_class_form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.first_name" :class="{ 'is-invalid': form.errors.has('first_name') }" class="form-control" type="text" name="first_name" autocomplete="first_name" placeholder="Nombre(s) * ">
                      <has-error :form="form" field="first_name" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.last_name" :class="{ 'is-invalid': form.errors.has('last_name') }" class="form-control" type="text" name="last_name" autocomplete="last_name" placeholder="Apellido(s) * ">
                      <has-error :form="form" field="last_name" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email" autocomplete="email" placeholder=" Correo electrónico * ">
                  <has-error :form="form" field="email" />
                </div>
                <div class="form-group">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password" autocomplete="new-password" placeholder=" Contraseña * ">
                  <has-error :form="form" field="password" />
                </div>
                <div class="form-group">
                  <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirmar contraseña * ">
                  <has-error :form="form" field="password_confirmation" />
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.telefono" :class="{ 'is-invalid': form.errors.has('telefono') }" class="form-control" type="text" name="telefono" autocomplete="telefono" placeholder="Teléfono * ">
                      <has-error :form="form" field="telefono" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.nombre_comercial" :class="{ 'is-invalid': form.errors.has('nombre_comercial') }" class="form-control" type="text" name="nombre_comercial" autocomplete="nombre_comercial" placeholder="Nombre comercial * ">
                      <has-error :form="form" field="nombre_comercial" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.rfc" :class="{ 'is-invalid': form.errors.has('rfc') }" class="form-control" type="text" name="rfc" autocomplete="rfc" placeholder="RFC * ">
                      <has-error :form="form" field="rfc" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.razon_social" :class="{ 'is-invalid': form.errors.has('razon_social') }" class="form-control" type="text" name="razon_social" autocomplete="razon_social" placeholder="Razon Social * ">
                      <has-error :form="form" field="razon_social" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <v-button :loading="form.busy" class="w100">
                    Registrarse
                  </v-button>
                </div>
              </div>
              <div v-else class="com_class_form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.first_name" :class="{ 'is-invalid': form.errors.has('first_name') }" class="form-control" type="text" name="first_name" autocomplete="first_name" placeholder="Nombre(s) * ">
                      <has-error :form="form" field="first_name" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input v-model="form.last_name" :class="{ 'is-invalid': form.errors.has('last_name') }" class="form-control" type="text" name="last_name" autocomplete="last_name" placeholder="Apellido(s) * ">
                      <has-error :form="form" field="last_name" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email" autocomplete="email" placeholder=" Correo electrónico * ">
                  <has-error :form="form" field="email" />
                </div>
                <div class="form-group">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password" autocomplete="new-password" placeholder=" Contraseña * ">
                  <has-error :form="form" field="password" />
                </div>
                <div class="form-group">
                  <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirmar contraseña * ">
                  <has-error :form="form" field="password_confirmation" />
                </div>
                <div class="form-group">
                  <v-button :loading="form.busy" class="w100">
                    Registrarse
                  </v-button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import { mapActions } from 'vuex'

export default {
  middleware: 'guest',

  components: {

  },
  props: {
    type: {
      type: String,
      default: 'aspirante'
    }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      userType: false
    }),
    mustVerifyEmail: false
  }),
  computed: {
  },
  metaInfo () {
    return { title: this.$t('register') }
  },
  mounted () {
    this.setTitle('Registro')
    this.form.userType = this.type
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle'
    }),
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>
<style lang="scss" scoped>
  .w100 {
    width: 100%;
    max-width: 100%;
  }
</style>
