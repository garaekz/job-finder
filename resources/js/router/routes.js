function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },
  {
    path: '/empleos',
    component: page('home/index.vue'),
    children: [
      { path: '', name: 'empleos', component: page('empleos.vue') }
    ]
  },
  { path: '/empleos/:id', name: 'empleos.ver', component: page('vacantes/show.vue'), props: true },

  {
    path: '/aspirantes',
    component: page('home/index.vue'),
    children: [
      { path: '', name: 'aspirantes', component: page('aspirantes.vue') }
    ]
  },
  { path: '/aspirantes/:id', name: 'aspirantes.ver', component: page('aspirantes/show.vue'), props: true },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue'), props: true },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  {
    path: '/home',
    component: page('home/index.vue'),
    children: [
      { path: '', name: 'home', component: page('home/profile.vue') },
      { path: 'vacantes', name: 'home.vacantes', component: page('home/vacantes/index.vue') },
      { path: 'vacantes/new', name: 'home.vacantes.new', component: page('home/vacantes/create.vue'), props: true },
      { path: 'vacantes/:id/edit', name: 'home.vacantes.edit', component: page('home/vacantes/edit.vue'), props: true },
    ]
  },
  { path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ] },
  { path: '/aviso-privacidad', name: 'privacidad',  component: page('privacidad.vue') },
  { path: '/sobre-nosotros', name: 'nosotros',  component: page('about.vue') },
  { path: '*', component: page('errors/404.vue') }
]
