<template>
  <header class="header_01">
    <div class="header_main">
      <div class="header_menu fixed-top">
        <div class="container">
          <div class="header_top">
            <div class="logo">
              <router-link :to="{ name: 'welcome' }">
                <img alt="JoDice" class="img-fluid" src="/images/dice-logo.png">
              </router-link>
            </div>
            <div class="navigation">
              <nav>
                <div class="hamburger hamburger--spring js-hamburger ">
                  <div class="hamburger-box">
                    <div class="hamburger-inner" />
                  </div>
                </div>
                <ul>
                  <li class="has-sub-menu current_page">
                    <a href="index.html">Home</a>
                    <ul class="sub-menu">
                      <li class="current_page">
                        <a href="index.html">Homepage 1</a>
                      </li>
                      <li>
                        <a href="home-page-2.html">Homepage 2</a>
                      </li>
                      <li>
                        <a href="home-page-3.html">Homepage 3</a>
                      </li>
                      <li>
                        <a href="home-page-4.html">Homepage 4</a>
                      </li>
                    </ul>
                  </li>
                  <li class="has-sub-menu">
                    <a href="index.html">Job Seekers</a>
                    <ul class="sub-menu">
                      <li>
                        <a href="job-seeker-dashboard.html">Job dashboard</a>
                      </li>
                      <li>
                        <a href="browse-jobs.html">Browse jobs</a>
                      </li>

                      <li>
                        <a href="job-single.html">Job single</a>
                      </li>

                      <li>
                        <a href="my-stared-jobs.html">My stared jobs</a>
                      </li>
                      <li>
                        <a href="staff-profile-single.html">Job seeker profile</a>
                      </li>
                      <li>
                        <a href="edit-profile.html">Update my profile</a>
                      </li>

                      <li>
                        <a href="edit-password.html">Change password</a>
                      </li>
                      <li>
                        <a href="registration.html">Registration</a>
                      </li>
                      <li>
                        <a href="browse-companies.html">Browse companies</a>
                      </li>
                    </ul>
                  </li>

                  <li class="has-sub-menu">
                    <a href="index.html#">For employers</a>
                    <ul class="sub-menu">
                      <li>
                        <a href="job-dashboard.html">Job dashboard</a>
                      </li>
                      <li>
                        <a href="post-a-job.html">Post a job</a>
                      </li>
                      <li>
                        <a href="my-job-listing.html">My Jobs listing</a>
                      </li>
                      <li>
                        <a href="find-staff.html">Find staff</a>
                      </li>
                      <li>
                        <a href="compnay-profile-single.html">Company profile</a>
                      </li>

                      <li>
                        <a href="emp-edit-profile.html">Update profile</a>
                      </li>
                      <li>
                        <a href="emp-edit-password.html">Change password</a>
                      </li>
                      <li>
                        <a href="emp-registration.html">Employer registration</a>
                      </li>
                    </ul>
                  </li>

                  <li class="has-sub-menu">
                    <a href="index.html#">Pages</a>
                    <ul class="sub-menu">
                      <li>
                        <a href="blog.html">blog</a>
                      </li>
                      <li>
                        <a href="blog-single.html">Blog single</a>
                      </li>
                      <li>
                        <a href="contact-us.html">Contact us</a>
                      </li>
                      <li>
                        <a href="plan-page.html">Membership Plans</a>
                      </li>
                      <li>
                        <a href="login.html">Login</a>
                      </li>
                      <li>
                        <a href="lost-password.html">Lost password</a>
                      </li>
                      <li>
                        <a href="user-interface-elements.html">User interface elements</a>
                      </li>
                      <li>
                        <a href="404.html">404</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
              <div v-if="user" class="ac_nav after_login_ac_nav">
                <div class="login_pop after_login">
                  <button class="btn btn-primary withdp">
                    <img alt="" src="/images/profile-5.png"> Hola {{ user.first_name }} {{ user.last_name }} <i class="fas fa-caret-down" />
                  </button>
                  <div class="login_pop_box login_pop_box_menu">
                    <div class="login_pop_box_head">
                      <div class=" ">
                        <img alt="" src="/images/profile-5.png">
                        <span v-if="role == 'empresa'">{{ user.perfil.nombre_comercial }}</span>
                        <h5>{{ user.first_name }} {{ user.last_name }}</h5>
                        <h6>{{ user.nombre_comercial }}</h6>
                      </div>
                    </div>
                    <ul>
                      <li>
                        <a href="browse-jobs.html"><i class="fas fa-search" /> Browse Jobs </a>
                      </li>
                      <li>
                        <a href="my-stared-jobs.html"><i class="fas fa-star" /> View My Stared Jobs</a>
                      </li>
                      <li>
                        <router-link :to="{ name: 'home' }">
                          <i class="fas fa-user" /> Ver mi perfil
                        </router-link>
                      </li>
                      <li>
                        <a href="edit-password.html"><i class="fas fa-key" />Change Password</a>
                      </li>
                      <li>
                        <a href="#" @click="logout">
                          <i class="fas fa-power-off" /> Logout
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="login_pop after_login">
                  <button class="btn btn-msg">
                    <i class="fas fa-envelope" />
                    <span class="msg-count">2</span>
                  </button>
                  <div class="login_pop_box job_seekernotifi ">
                    <h6>Inbox</h6>
                    <ul>
                      <li><img alt="" src="assets/images/c-logo-02.webp"><a href="staff-profile-single.html#"> Thanks for applying this job, our HR team will contact you soon</a> </li>
                      <li><img alt="" src="assets/images/profile-5.png"><a href="staff-profile-single.html#">You updated your profile picture .</a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div v-else class="ac_nav">
                <!--Not logedin-->
                <div class="login_pop">
                  <button class="btn btn-primary">Login / Sign up <i class="fas fa-caret-down" /></button>
                  <div class="login_pop_box">
                    <span class="twobtn_cont">
                      <router-link :to="{ name: 'register' }" class="signjs_btn">
                        <span>Aspirante</span> Registro
                        <i class="far fa-user" />
                      </router-link>
                      <router-link :to="{ name: 'register', params: {type: 'empresa' } }" class="signjs_btn">
                        <span>Empresa</span> Registro
                        <i class="far fa-landmark" />
                      </router-link>
                    </span>
                    <div>
                      <span class="member_btn">¿Ya eres miembro?</span>
                      <router-link :to="{ name: 'login' }" class="nav-link" active-class="active">
                        {{ $t('login') }}
                      </router-link>
                    </div>
                  </div>
                </div>
                <!--end logedin-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Aqui deber ir el header -->
      <div v-if="$route.name == 'welcome'" class="header_btm">
        <!-- <div class="bg-v" >
          <div class="bg-v-2 bg-b-r">
          </div>
        </div> -->
        <div class="container">
          <div class="banner_slider ">
            <div class="">
              <div class="row align-items-center">
                <div class="col-lg-4" data-aos="fade-down" data-aos-delay="200">
                  <h2>Find the most exciting<br> starup jobs</h2>
                  <p>Most complete 2020 template for Job board sites.</p>
                  <a class="btn btn-primary" href="browse-jobs.html">Know more
                    <i class="material-icons">arrow_right_alt</i>
                  </a>
                </div>
                <div class="col-lg-8">
                  <div class="banner_form_cont">
                    <form action="browse-jobs.html">
                      <div class="banerSearch" data-aos="fade-up" data-aos-delay="200">
                        <div class="fild-wrap fw-job-title">
                          <i class="fas fa-briefcase" />
                          <select class="js-example-basic-multiple" name="state">
                            <option value="AL">JOB TITLE, SKILL, INDUSTRY</option>
                            <option value="1">Concierge</option>
                            <option value="2">Event Planner</option>
                            <option value="3">Executive Chef</option>
                            <option value="4">General Manager</option>
                          </select>
                        </div>
                        <div class="fild-wrap fw-job-location">
                          <i class="fas fa-map-marker-alt" />
                          <select class="js-example-basic-single" name="state">
                            <option value="AL">ALABAMA</option>
                            <option value="WY">WYOMING</option>
                          </select>
                        </div>
                        <div class="fild-wrap fw-submit">
                          <button type="submit" class="btn btn-primary" value="">
                            <i class="material-icons">search</i> SEARCH JOBS
                          </button>
                        </div>
                      </div>
                    </form>
                    <div class="user_type">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="user_type_inner  user_type_seeker">
                            <a href="browse-jobs.html">
                              <div class="usertype_img">
                                <img alt="" src="/images/usertype-2.png">
                                <img alt="" class="usertype-addon" src="/images/usertype-2-addon.png">
                              </div>
                              <div>
                                <h3>I'm looking for a job</h3>
                                <p>Post CV and apply job you love</p>
                                <i class="fas fa-long-arrow-alt-right" />
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="user_type_inner user_type_post">
                            <a href="post-a-job.html">
                              <div class="usertype_img">
                                <img alt="" src="/images/usertype-1.png">
                                <img alt="" class="usertype-addon" src="/images/usertype-1-addon.png">
                              </div>
                              <div>
                                <h3>I want to post job</h3>
                                <p>Post jobs & hire porfessionls</p>
                                <i class="fas fa-long-arrow-alt-right" />
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="header_inner">
        <div class="header_btm">
          <h2>{{ header }}</h2>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  components: {
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user',
    role: 'auth/role',
    header: 'page/title'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
