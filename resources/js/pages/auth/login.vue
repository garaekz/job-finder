<template>
  <div class="only-form-pages">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="only-form-box">
            <form @submit.prevent="login" @keydown="form.onKeydown($event)">
              <div class="com_class_form">
                <div class="form-group">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" autocomplete="email" autofocus size="40" class="form-control" type="email" name="email" placeholder=" Correo electrónico * ">
                  <has-error :form="form" field="email" />
                </div>
                <div class="form-group">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password" placeholder=" Contraseña * ">
                  <has-error :form="form" field="password" />
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" value="Ingresar">
                </div>
                <div class="form-group form-check">
                  <checkbox v-model="form.remember" name="remember">
                    {{ $t('remember_me') }}
                  </checkbox>
                </div>
                <div>
                  <router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
                    {{ $t('forgot_password') }}
                  </router-link>
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

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),
  mounted () {
    this.setTitle('Ingresar')
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle'
    }),
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.$router.push({ name: 'home' })
    }
  }
}
</script>
